<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->communities = \App\Community::take(24)->get();
	}

	public function showHome(Request $request = null)
	{
		$properties = $this->getProperties();

		return view('pages.home')->with([
			'properties' => $properties,
			'communities' => $this->communities
		]);
	}

	public function clearSession(Request $request) {
		$request->session()->flush();

		return;
	}

	public function showAgents() {
		return view('pages.listAgents');
	}

	public function showContact() {
		return view('pages.contact');
	}

	public function showProperties() {
		return view('pages.listProperties');
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

	public function showBuyingServices() {
		dd('showBuyingServices');
	}

	public function showLisingServices() {
		dd('showLisingServices');
	}

	public function showUsefulLinks() {
		dd('showUsefulLinks');
	}

	public function getProperties()
	{
		$propertyModel = new \App\Property;

		$properties['all'] = $propertyModel->with('propertyImages')->orderBy('entryDate', 'DESC');
		$properties['lasVegas'] = $propertyModel->where('city', '=', 'Las Vegas')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();
		$properties['henderson'] = $propertyModel->where('city', '=', 'Henderson')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();
		$properties['northLasVegas'] = $propertyModel->where('city', '=', 'North Las Vegas')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();
		$properties['boulderCity'] = $propertyModel->where('city', '=', 'Boulder City')->where('listingStatus', '!=', 'Closed')->with('propertyImages')->orderBy('entryDate', 'DESC')->get();

		return $properties;
	}
}
