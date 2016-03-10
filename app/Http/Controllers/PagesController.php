<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function showHome(Request $request = null)
	{
		$config = new \PHRETS\Configuration;

		$config->setLoginUrl('http://glvar.apps.retsiq.com/rets/login')
			->setUsername('jet')
			->setPassword('glv06')
			->setRetsVersion('1.7.2');

		$this->rets = new \PHRETS\Session($config);

		$connect = $this->rets->Login();

		$properties = $this->getProperties();

		foreach ($properties as $propertyKey => $propertyOption) {
			if ($propertyKey == 'all') {
				continue;
			}

			foreach ($propertyOption as $optionKey => $option) {
				$photos = $this->getPropertyImages($option->sysId);

				$properties[$propertyKey][$optionKey]->mainImage = $photos[0];
			}
		}
// dd($properties['lasVegas']);
		return view('pages.home')->with([
			'properties' => $properties
		]);
	}

	public function getPropertyImages($listingId)
	{
		$photos = $this->rets->GetObject('Property', 'Photo', $listingId, '*', 0);

		foreach ($photos as $photo) {
			$baseIt = base64_encode($photo->getContent());
			// dd($baseIt);
			$hashIt = \Hash::make($baseIt);
			// Minimize baseit
			// save the image
			// get the image
			// unminimize baseit
			// display baseit

			$photosArray[] = 'data:' . $photo->getContentType() . ';base64,' . $baseIt;
			// dd($photosArray);
		}

		return $photosArray;
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
		dd($listingId);
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

		$properties['all'] = $propertyModel->with('propertyImages');
		$properties['lasVegas'] = $propertyModel->where('city', '=', 'Las Vegas')->with('propertyImages')->get();
		$properties['henderson'] = $propertyModel->where('city', '=', 'Henderson')->with('propertyImages')->get();
		$properties['northLasVegas'] = $propertyModel->where('city', '=', 'North Las Vegas')->with('propertyImages')->get();
		$properties['boulderCity'] = $propertyModel->where('city', '=', 'Boulder City')->with('propertyImages')->get();

		return $properties;
	}
}
