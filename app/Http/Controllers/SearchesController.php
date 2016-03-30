<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchesController extends Controller
{
	public function __construct()
	{
		$this->communities = \App\Community::take(24)->get();

		$this->communitySelect = $this->communitiesSelect($this->communities);

		$this->recent = \App\Property::take(5)->orderBy('id', 'DESC')->with('propertyImages')->get();
	}

	public function communitiesSelect($communities)
	{
		foreach ($communities as $communityKey => $communityValue) {
			$communitySelect[$communityValue->community] = $communityValue->community;
		}

		$communitySelect[0] = 'Community';

		$communitySelect = array_reverse($communitySelect);

		return $communitySelect;
	}

	public function search(Request $request)
	{
		$queryFilter = array_filter($request->all());

		$client = \Elasticsearch\ClientBuilder::create()->build();

		foreach ($queryFilter as $requestKey => $requestValue) {
			$fields[] = $requestKey;
		}

		for ($matchCount=0; $matchCount < count($fields); $matchCount++) {
			$query[$matchCount]['match'][$fields[$matchCount]] = $request->{$fields[$matchCount]};
		}

		$params = [
			'index' => 'properties',
			'type' => 'property',
			'body' => [
				'query' => [
					'filtered' => [
						'query' => [
							'bool' => [
								'must' => [
									$query,
								]
							],
						],
						'filter' => [
							'bool' => [
								'must_not' => [
									'term' => [
										'listingStatus' => 'closed'
									]
								],
							]
						],
					]
				]
			]
		];

		$response = $client->search($params);

		$properties = $response['hits']['hits'];

		return view('pages.search')->with([
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function searchProperties($whereData)
	{
		$client = \Elasticsearch\ClientBuilder::create()->build();

		$params = [
			'index' => 'properties',
			'type' => 'property',
			'body' => [
				'query' => [
					'match' => [
						'listingId' => isset($whereData['listingId']['value']) ? $whereData['listingId']['value'] : null
					],
					'match' => [
						'city' => isset($whereData['city']['value']) ? $whereData['city']['value'] : null
					]
				]
			]
		];

		$response = $client->search($params);

		return $response;
	}

	public function chooseOperator($where)
	{
		foreach ($where as $whereKey => $whereValue) {
			$where[$whereKey] = [
				'operator' => \Config::get('search.operators')[$whereKey]['operator'],
				'value' => $whereValue
			];
		}

		return $where;
	}
}
