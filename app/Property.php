<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'listingID',
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
        'photoInstructions',
        'sysId',
        'entryDate',
        'customPropertyDescription',
    ];

    public function propertyImages()
    {
        return $this->belongsToMany('App\Image');
    }

    public function community()
    {
        return $this->belongsToMany('App\Community');
    }
}
