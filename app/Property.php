<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'listingId',
        'propertyType',
        'streetNumber',
        'streetName',
        'state',
        'city',
        'postalCode',
        'approximateAcreage',
        'value',
        'yearBuilt',
        'listPrice',
        'listingStatus',
        'originalListPrice',
         'propertyDescription',
        'totalBaths',
        'lotSqft',
        'bedrooms',
        'waterHeaterDescription',
        'garageDescription',
        'roofDescription',
        'lotDescription',
        'spaDescription',
        'poolDescription',
        'interiorDescription',
        'otherApplianceDescription',
        'constructionDescription',
        'flooringDescription',
        'fireplaceDescription',
        'builtDescription',
        'carportDescription',
        'parkingDescription',
        '5thBedroomDescription',
        'heatingDescription',
        'greatRoomDescription',
        'bathDownstairsDescription',
        'coolingFuelDescription',
        'diningRoomDescription',
        'familyRoomDescription',
        'kitchenDescription',
        'livingRoomDescription',
        'masterBedroomDescription',
        '2ndBedroomDescription',
        '3rdBedroomDescription',
        '4thBedroomDescription',
        'possessionDescription',
        'ovenDescription',
        'equestrianDescription',
        'miscellaneousDescription',
        'exteriorDescription',
        'landscapeDescription',
        'heatingFuelDescription',
        'energyDescription',
        'furnishingsDescription',
        'loftDescription',
        'unitDescription',
        'saleType',
        'idx',
        'images',
        'photoExcluded',
        'sysId',
        'entryDate',
        'customPropertyDescription',
        'virtualTourLink',
        'solarElectric',
        'ageRestricted',
        'associationFee1',
        'garage',
        'internet',
        '2ndBedroomDimensions',
        '3rdBedroomDimensions',
        '4thBedroomDimensions',
        'diningRoomDimensions',
        'familyRoomDimensions',
        '5thBedroomDimensions',
        'livingRoomDimensions',
        'masterBedroomDimensions',
        'model',
        'pvPool',
        'sewer',
        'closePrice',
        'closeDate',
    ];

    public function propertyImages()
    {
        return $this->belongsToMany('App\Image');
    }

    public function community()
    {
        return $this->belongsToMany('App\Community');
    }

    public function listingAgents()
    {
        return $this->belongsToMany('App\ListingAgent');
    }
}
