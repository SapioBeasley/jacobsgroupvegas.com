<?php

namespace App\Http\Controllers;

use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Sapioweb\Geocode\Geocode;
use App\Http\Requests;

class PagesController extends Controller
{
	protected $views = 0;

	public function __construct()
	{
		$this->communities = \App\Community::take(24)->get();

		$this->communitySelect = $this->communitiesSelect($this->communities);

		$this->recent = \App\Property::take(5)->orderBy('id', 'DESC')->with('propertyImages')->get();
	}

	public function showHome(Request $request = null)
	{
		$properties['lasVegas'] = $this->getProperties('las vegas', 6);
		$properties['henderson'] = $this->getProperties('henderson', 6);
		$properties['northLasVegas'] = $this->getProperties('north las vegas', 6);
		$properties['boulderCity'] = $this->getProperties('boulder city', 6);

		return view('pages.home')->with([
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
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

	public function clearSession(Request $request)
	{
		$request->session()->flush();

		return;
	}

	public function getCommunity($community)
	{

		$community = \App\Community::where('community', '=', $community)->with('properties')->first();

		if (is_null($community)) {
			abort(404);
		}

		$properties = \App\Property::whereHas('community', function ($q) use ($community) {
			$q->where('community', '=', $community['community']);
			$q->where('listingStatus', '!=', 'closed');
		})->paginate(15);

		return view('pages.communityDetail')->with([
			'community' => $community,
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function showCommunities()
	{
		return view('pages.listCommunities')->with([
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function showAgents()
	{
		return view('pages.listAgents')->with([
			'communities' => $this->communities
		]);
	}

	public function showContact()
	{
		return view('pages.contact')->with([
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function showProperties()
	{
		$client = \Elasticsearch\ClientBuilder::create()->build();

		$params = [
			'index' => 'properties',
			'type' => 'property',
			'body' => [
				'size' => '40',
				'query' => [
					'filtered' => [
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

		$properties = $client->search($params);

		$properties = $properties['hits']['hits'];

		return view('pages.listProperties')->with([
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function showSingleProperties(Request $request, $listingId)
	{
		$property = \App\Property::where('listingId', '=', $listingId)->with('propertyImages')->first();

		if (is_null($property)) {
			abort(404);
		}

		$geocode = new Geocode;

		$address = $property['streetNumber']
			. ' ' . $property['streetName']
			. ' ' . $property['city']
			. ' ' . $property['state']
			. ' ' . $property['postalCode'];

		$geoLocation = $geocode->getCoordinates($address);

		switch (true) {
			case ! is_null($request->cookie('propertyViews')):

				if (! \Auth::check()) {

					$this->views = $this->views + (integer) $request->cookie('propertyViews');

					if ($this->views > 0) {
						$response = new \Illuminate\Http\Response(view('pages.propertyDetailSubscribe')->with([
							'property' => $property,
							'communities' => $this->communities,
							'geoLocation' => $geoLocation
						]));
					}

					$response->withCookie(cookie()->forever('propertyViews', $this->views + 1));
				} else {

					$response = new \Illuminate\Http\Response(view('pages.propertyDetail')->with([
						'property' => $property,
						'communities' => $this->communities,
						'geoLocation' => $geoLocation,
						'recent' => $this->recent
					]));

					$response->withCookie(cookie()->forget('propertyViews'));
				}
				break;

			default:
				$response = new \Illuminate\Http\Response(view('pages.propertyDetail')->with([
					'property' => $property,
					'communities' => $this->communities,
					'geoLocation' => $geoLocation,
					'recent' => $this->recent
				]));

				$response->withCookie(cookie()->forever('propertyViews', $this->views + 1));
				break;
		}

		return $response;
	}

	public function showBuyingServices()
	{
		$communitySelect = $this->communitiesSelect($this->communities);

		return view('pages.buyingServices')->with([
			'communities' => $this->communities,
			'communitySelect' => $communitySelect
		]);
	}

	public function showLisingServices()
	{
		return view('pages.listingServices')->with([
			'communities' => $this->communities
		]);
	}

	public function showUsefulLinks()
	{
		return view('pages.usefulLinks')->with([
			'communities' => $this->communities
		]);
	}

	public function getProperties($city = null, $size = null)
	{
		$client = \Elasticsearch\ClientBuilder::create()->build();

		$params = [
			'index' => 'properties',
			'type' => 'property',
			'body' => [
				'size' => $size,
				'query' => [
					'filtered' => [
						'query' => [
							'bool' => [
								'must' => [
									'match' => [
										'city' => $city
									]
								]
							]
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

		$properties = $client->search($params);

		$properties = $properties['hits']['hits'];

		return $properties;
	}
}
