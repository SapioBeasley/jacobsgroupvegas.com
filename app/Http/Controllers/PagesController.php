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

	public function showSingleAgents(Request $request, $agent)
	{
		$agent = \App\Agent::where('name', '=', $agent)->first();

		if (is_null($agent)) {
			abort(404);
		}

		return view('pages.agentDetails')->with([
			'agent' => $agent,
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
			$q->where('Status', '!=', 'closed');
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
		$communities = \App\Community::with('properties')->get();

		return view('pages.listCommunities')->with([
			'communities' => $communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function showAgents()
	{
		$agents = \App\Agent::all();

		return view('pages.listAgents')->with([
			'agents' => $agents,
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

		$params['index'] = 'properties';
		$params['type'] = 'property';
		$params['body']['sort'] = [
			'OriginalEntryTimestamp' => [
				'order' => 'DESC',
				'ignore_unmapped' => true
			]
		];
		$params['body']['size'] = '100';
		$params['body']['query'] = [
			'filtered' => [
				'filter' => [
					'bool' => [
						'must_not' => [
							'term' => [
								'Status' => 'closed'
							]
						]
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

	public function getAmentities($property)
	{
		$amentities = array_filter($property->toArray());

  		unset($amentities['id']);
  		unset($amentities['created_at']);
  		unset($amentities['updated_at']);
  		unset($amentities['property_images']);
  		unset($amentities['VirtualTourLink']);
  		unset($amentities['City']);
  		unset($amentities['CurrentPrice']);
  		unset($amentities['ExistingRent']);
  		unset($amentities['AnnualPropertyTaxes']);
  		unset($amentities['LastChangeTimestamp']);
  		unset($amentities['OriginalEntryTimestamp']);
  		unset($amentities['StatusChangeTimestamp']);
  		unset($amentities['PhotoModificationTimestamp']);
  		unset($amentities['StatusContractualSearchDate']);
  		unset($amentities['FinancingConsidered']);
  		unset($amentities['IDX']);
  		unset($amentities['ListingContractDate']);
  		unset($amentities['PriceChgDate']);
	 	unset($amentities['IDXOptInYN']);
		unset($amentities['ListAgent_MUI']);
		unset($amentities['ListAgentDirectWorkPhone']);
		unset($amentities['ListAgentFullName']);
		unset($amentities['ListAgentMLSID']);
		unset($amentities['ListingAgreementType']);
		unset($amentities['ListOffice_MUI']);
		unset($amentities['ListOfficeMLSID']);
		unset($amentities['ListOfficeName']);
		unset($amentities['ListOfficePhone']);
		unset($amentities['Matrix_Unique_ID']);
		unset($amentities['MatrixModifiedDT']);
		unset($amentities['StateOrProvince']);
		unset($amentities['Status']);
		unset($amentities['StreetDirPrefix']);
		unset($amentities['StreetName']);
		unset($amentities['StreetNumber']);
		unset($amentities['StreetNumberNumeric']);
		unset($amentities['MetroMapPageXP']);
		unset($amentities['MLS']);
		unset($amentities['MLSNumber']);
		unset($amentities['PhotoCount']);
		unset($amentities['PhotoInstructions']);
		unset($amentities['PostalCode']);
		unset($amentities['ParcelNumber']);
		unset($amentities['OriginalListPrice']);
		unset($amentities['LastChangeType']);
		unset($amentities['LastListPrice']);
		unset($amentities['LastStatus']);
		unset($amentities['LeedCertified']);
		unset($amentities['LegalDescription']);
		unset($amentities['ListPrice']);
		unset($amentities['Area']);
		unset($amentities['BuiltDescription']);
		unset($amentities['EarnestDeposit']);
		unset($amentities['PublicAddress']);
		unset($amentities['PublicAddressYN']);
		unset($amentities['RATIO_CurrentPrice_By_SQFT']);
		unset($amentities['RealtorYN']);

		return $amentities;
	}

	public function showSingleProperties(Request $request, $listingId)
	{
		$property = \App\Property::where('MLSNumber', '=', $listingId)->with('propertyImages')->first();

		if (is_null($property)) {
			return redirect()->route('properties')->with('error_message', 'Property is no longer available');
		}

		$amentities = $this->getAmentities($property);

		$geocode = new Geocode;

		$address = $property['StreetNumber']
			. ' ' . $property['StreetName']
			. ' ' . $property['City']
			. ' ' . $property['StateOrProvince']
			. ' ' . $property['PostalCode'];

		$geoLocation = $geocode->getCoordinates($address);

		switch (true) {
			case ! is_null($request->cookie('propertyViews')):

				if (! \Auth::check()) {

					$this->views = $this->views + (integer) $request->cookie('propertyViews');

					if ($this->views > 0) {
						$response = new \Illuminate\Http\Response(view('pages.propertyDetailSubscribe')->with([
							'property' => $property,
							'communities' => $this->communities,
							'amentities' => $amentities,
							'geoLocation' => isset($geoLocation['geometry']) ? $geoLocation['geometry']['location'] : [],
						]));
					}

					$response->withCookie(cookie()->forever('propertyViews', $this->views + 1));
				} else {

					$response = new \Illuminate\Http\Response(view('pages.propertyDetail')->with([
						'property' => $property,
						'communities' => $this->communities,
						'amentities' => $amentities,
						'geoLocation' => isset($geoLocation['geometry']) ? $geoLocation['geometry']['location'] : [],
						'recent' => $this->recent
					]));

					$response->withCookie(cookie()->forget('propertyViews'));
				}
				break;

			default:
				$response = new \Illuminate\Http\Response(view('pages.propertyDetail')->with([
					'property' => $property,
					'communities' => $this->communities,
					'amentities' => $amentities,
					'geoLocation' => isset($geoLocation['geometry']) ? $geoLocation['geometry']['location'] : [],
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

		$params['index'] = 'properties';
		$params['type'] = 'property';
		$params['body']['size'] = $size;
		$params['body']['sort'] = [
			'OriginalEntryTimestamp' => [
				'order' => 'desc',
				'ignore_unmapped' => true
			]
		];
		$params['body']['query']['filtered']['query'] = [
			'bool' => [
				'must' => [
					'match_phrase' => [
						'city' => $city,
					]
				]
			]
		];
		$params['body']['query']['filtered']['filter'] = [
			'bool' => [
				'must_not' => [
					'term' => [
						'Status' => 'closed'
					]
				],
			]
		];

		$properties = $client->search($params);

		$properties = $properties['hits']['hits'];

		return $properties;
	}
}
