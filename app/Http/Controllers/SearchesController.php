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

			switch ($requestKey ) {
				case 'max_price':
					$fields['filter'][] = $requestKey;
					break;

				case 'min_sqft':
					$fields['filter'][] = $requestKey;
					break;

				case 'max_sqft':
					$fields['filter'][] = $requestKey;
					break;

				case 'MLSNumber':
					$fields['match'][] = $requestKey;
					break;

				case 'address':
					$fields['match'][] = $requestKey;
					break;

				case 'city':
					$fields['match'][] = $requestKey;
					break;

				case 'postalCode':
					$fields['match'][] = $requestKey;
					break;

				case 'bedrooms':
					if ($requestValue > 4) {
						$fields['filter'][] = $requestKey;
					} else {
						$fields['match'][] = $requestKey;
					}
					break;

				case 'totalBaths':
					if ($requestValue > 4) {
						$fields['filter'][] = $requestKey;
					} else {
						$fields['match'][] = $requestKey;
					}
					break;

				case 'min_price':
					$fields['filter'][] = $requestKey;
					break;

				default:
					# code...
					break;
			}
		}

		if (isset($fields['match'])) {
			for ($matchCount=0; $matchCount < count($fields['match']); $matchCount++) {

				$query['match']['bool']['must'][$matchCount]['match'][$fields['match'][$matchCount]] = $request->{$fields['match'][$matchCount]};
			}
		}

		$defaultFilter = ['bool' => ['must_not' => ['term' => ['listingStatus' => 'closed']]]];

		if (isset($fields['filter'])) {
			for ($matchCount=0; $matchCount < count($fields['filter']); $matchCount++) {

				switch ($fields['filter'][$matchCount]) {
					case 'min_price':
						$originalName = 'listPrice';
						break;

					case 'max_price':
						$originalName = 'listPrice';
						break;

					case 'max_sqft':
						$originalName = 'lotSqft';
						break;

					case 'min_sqft':
						$originalName = 'lotSqft';
						break;

					default:
						$originalName = $fields['filter'][$matchCount];
						break;
				}

				if ((strpos($fields['filter'][$matchCount], 'min') !== false) || ($fields['filter'][$matchCount] === 'bedrooms') || ($fields['filter'][$matchCount] === 'totalBaths')) {
					$query['filter']['bool']['must'][$matchCount]['range'][$originalName]['gte'] = $request->{$fields['filter'][$matchCount]};
				} else {
					$query['filter']['bool']['must'][$matchCount]['range'][$originalName]['lte'] = $request->{$fields['filter'][$matchCount]};
				}
			}

			foreach ($query['filter'] as $queryFilterKey => $queryFilterValue) {
				$bool2 = $defaultFilter[$queryFilterKey];
				$filter[$queryFilterKey] = $queryFilterValue + $bool2;
			}
		}

		$query = isset($query['match']) ? $query['match'] : ['match_all' => []];

		$params['index'] = 'properties';
		$params['type'] = 'property';
		$params['body']['size'] = '100';
		$params['body']['query']['filtered'] = [
			'query' => $query,
			'filter' => isset($filter) ? $filter : $defaultFilter,
		];

		$response = $client->search($params);

		$properties = $response['hits']['hits'];

		return view('pages.search')->with([
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
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
