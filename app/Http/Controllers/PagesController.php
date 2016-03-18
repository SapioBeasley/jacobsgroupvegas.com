<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->communities = \App\Community::take(24)->get();

		$this->communitySelect = $this->communitiesSelect($this->communities);
	}

	public function showHome(Request $request = null)
	{
		$properties = $this->getProperties();

		return view('pages.home')->with([
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $this->communitySelect
		]);
	}

	public function showSearch(Request $request)
	{
		$request->session()->reflash();

		$properties = $request->session()->get('properties');

		return view('pages.search')->with([
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
			abort('404');
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
			'communitySelect' => $communitySelect
		]);
	}

	public function showProperties()
	{
		$properties = $this->getProperties();

		return view('pages.listProperties')->with([
			'properties' => $properties,
			'communities' => $this->communities,
			'communitySelect' => $communitySelect
		]);
	}

	public function showSingleProperties($listingId)
	{
		$property = \App\Property::where('listingID', '=', $listingId)->with('propertyImages')->first();

		if (is_null($property)) {
			abort(404);
		}

		return view('pages.propertyDetail')->with([
			'property' => $property,
			'communities' => $this->communities
		]);
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

	public function getProperties()
	{
		$propertyModel = new \App\Property;

		$properties['all'] = $propertyModel->with('propertyImages')->orderBy('entryDate', 'DESC')->paginate(15);
		$properties['lasVegas'] = $propertyModel->where('city', '=', 'Las Vegas')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();
		$properties['henderson'] = $propertyModel->where('city', '=', 'Henderson')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();
		$properties['northLasVegas'] = $propertyModel->where('city', '=', 'North Las Vegas')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();
		$properties['boulderCity'] = $propertyModel->where('city', '=', 'Boulder City')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();

		return $properties;
	}
}
