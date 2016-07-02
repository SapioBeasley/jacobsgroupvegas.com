<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IndexProperty extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $property;

    protected $createdAt;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($property, $createdAt)
    {
        $this->property = $property;

        $this->createdAt = $createdAt;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = \Elasticsearch\ClientBuilder::create()->build();

        $mainImage = $this->setMainImage($this->property['Matrix_Unique_ID']);

        $params['index'] = 'properties';
        $params['type'] = 'property';
        $params['id'] = $this->property['MLSNumber'];
        $params['body'] = [
            'address' => $this->property['StreetNumber'] . ' ' . $this->property['StreetName'] . ' ' . $this->property['City'] . ' ' . $this->property['StateOrProvince'] . ' ' . $this->property['PostalCode'],
            'propertyType' => $this->property['Zoning'],
            'postalCode' => $this->property['PostalCode'],
            'streetName' => $this->property['StreetName'],
            'streetNumber' => $this->property['StreetNumber'],
            'city' => $this->property['City'],
            'state' => $this->property['StateOrProvince'],
            'CurrentPrice' => (integer) $this->property['CurrentPrice'],
            'Status' => $this->property['Status'],
            'MLSNumber' => $this->property['MLSNumber'],
            'BathsTotal' => $this->property['BathsTotal'],
            'LotSqft' => $this->property['LotSqft'],
            'BedsTotal' => $this->property['BedsTotal'],
            'CommunityName' => $this->property['CommunityName'],
            'description' => $this->property['customPropertyDescription'],
            'mainImage' => $mainImage,
            'entryDate' => $this->createdAt,
            'OriginalEntryTimestamp' => $this->property['OriginalEntryTimestamp']
        ];

        $response = $client->index($params);
    }

    public function setMainImage($mls)
	{
		$property = \App\Property::with('propertyImages')->where('Matrix_Unique_ID', '=', $mls)->first();

		$mainImage = isset($property->propertyImages[0]->dataUri) ? $property->propertyImages[0]->dataUri : null;

		return $mainImage;
	}
}
