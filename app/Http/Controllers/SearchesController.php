<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchesController extends Controller
{
	public function postSearch(Request $request)
	{
		$whereData = $request->all();

		unset($whereData['_token']);

		$whereData = $this->chooseOperator($whereData);

		$properties = $this->searchProperties($whereData);

		return redirect()->route('search')->with([
			'properties' => $properties
		]);
	}

	public function searchProperties($whereData)
	{
		$properties =\App\Property::with('propertyImages')->orderBy('created_at', 'DESC');

		foreach ($whereData as $whereKey => $whereValue) {
			if ($whereValue['value'] == '0' || empty($whereValue['value'])) {
				unset($whereData[$whereKey]);
			}
		}

		switch (true) {
			case ! empty($whereData):

				foreach ($whereData as $searchKey => $searchValue) {
					if ($searchKey == 'listingId') {
						$searchKey = 'listingID';
					}

					// dd($searchKey . ', ' . $searchValue['operator'] . ', ' . $searchValue['value']);
					$properties->where($searchKey, $searchValue['operator'], $searchValue['value']);
				}

				$properties = $properties->paginate(15);
				break;

			default:
				$properties = $propertiesSearch->paginate(15);
				break;
		}

		return $properties;
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
