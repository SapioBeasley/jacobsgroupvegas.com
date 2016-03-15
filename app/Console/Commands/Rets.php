<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Rets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rets:properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull residential properties from rets and import into DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $config = new \PHRETS\Configuration;

        $config->setLoginUrl('http://glvar.apps.retsiq.com/rets/login')
              ->setUsername('jet')
              ->setPassword('glv06')
              ->setRetsVersion('1.8');

        $this->rets = new \PHRETS\Session($config);

        $connect = $this->rets->Login();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $results = $this->rets->Search('Property', '1', '*', [
              'Limit' => 500,
              'StandardNames' => 0, // give system names
        ]);

        $results = $this->fieldRename($results);

        foreach ($results as $property) {

            $createdProperty = \App\Property::where('listingID', '=', $property['listingID'])->with('propertyImages')->first();

            switch (true) {
                case ! is_null($createdProperty):

                    $createProperty = $createdProperty->update($property);

                    if ($createdProperty->listingStatus == 'Closed') {

                        if (! empty($createdProperty->propertyImages->toArray())) {
                            $closedImages = $createdProperty->propertyImages;

                            $this->removeClosedImages($closedImages);
                            $this->info('Closed listing images removed');
                        }

                    }

                    $this->info('Property found and updated');
                    break;

                default:
                    $createProperty = \App\Property::create($property);
                    $this->info('New Property Created');

                    $community = $property['communityName'];

                    if ($community !== 'None') {
                        $createdCommunity = \App\Community::where('community', '=', $community)->first();

                        if (is_null($createdCommunity)) {
                            $createProperty->community()->create([
                                'community' => $community
                            ]);
                            $this->info('New Community Created');
                        } else {
                            $createProperty->community()->sync([$createdCommunity->id]);
                        }
                    }

                    if ($createProperty->listingStatus !== 'Closed') {
                        $images = $this->getPropertyImages($property['sysId']);

                        foreach ($images as $image) {
                            $createProperty->propertyImages()->create([
                                'dataUri' => $image
                            ]);
                        }
                        $this->info('Property Images added');
                    }
                    break;
            }
        }
    }

    public function removeClosedImages($closedImages)
    {
        foreach ($closedImages as $image) {

            $propertyImage = \App\Image::find($image->id);

            $propertyImage->delete();
            $this->info($image->dataUri . ' has been deleted from DB');

            if (file_exists(public_path($image->dataUri))) {
                unlink(public_path($image->dataUri));
                $this->info(public_path($image->dataUri) . ' has been deleted');
            }
        }

        return;
    }

    public function getPropertyImages($listingId)
    {
        $photos = $this->rets->GetObject('Property', 'Photo', $listingId);

        foreach ($photos as $photo) {

            file_put_contents(public_path('images/uploads/properties/') . 'property-' . $listingId . '-image-' . $photo->getObjectId() . '.jpg', $photo->getContent());
            $images[] = 'images/uploads/properties/' . 'property-' . $listingId . '-image-' . $photo->getObjectId() . '.jpg';

        }

        return $images;
    }

    public function fieldRename($oldArray)
    {
        foreach ($oldArray as $arrayData) {
            $newArray[] = [
                'sysId' => $arrayData['sysid'],
                'propertyType' => $arrayData['1'],
                'approximateAcreage' => $arrayData['2'],
                'postalCode' => $arrayData['10'],
                'streetName' => $arrayData['243'],
                'streetNumber' => $arrayData['244'],
                'yearBuilt' => $arrayData['264'],
                'city' => $arrayData['2909'],
                'state' => $arrayData['2963'],
                'listPrice' => $arrayData['144'],
                'listingStatus' => $arrayData['242'],
                'originalListPrice' => $arrayData['173'],
                'listingID' => $arrayData['163'],
                'propertyDescription' => $arrayData['268'],
                'totalBaths' => $arrayData['63'],
                'lotSqft' => $arrayData['154'],
                'bedrooms' => $arrayData['68'],
                'waterHeaterDescription' => $arrayData['2932'],
                'garageDescription' => $arrayData['269'],
                'roofDescription' => $arrayData['270'],
                'lotDescription' => $arrayData['271'],
                'spaDescription' => $arrayData['272'],
                'poolDescription' => $arrayData['273'],
                'interiorDescription' => $arrayData['292'],
                'otherApplianceDescription' => $arrayData['290'],
                'constructionDescription' => $arrayData['291'],
                'flooringDescription' => $arrayData['293'],
                'fireplaceDescription' => $arrayData['294'],
                'builtDescription' => $arrayData['72'],
                'carportDescription' => $arrayData['73'],
                'parkingDescription' => $arrayData['2438'],
                '5thBedroomDescription' => $arrayData['97'],
                'heatingDescription' => $arrayData['301'],
                'greatRoomDescription' => $arrayData['2432'],
                'bathDownstairsDescription' => $arrayData['64'],
                'coolingFuelDescription' => $arrayData['86'],
                'diningRoomDescription' => $arrayData['276'],
                'familyRoomDescription' => $arrayData['277'],
                'kitchenDescription' => $arrayData['278'],
                'livingRoomDescription' => $arrayData['279'],
                'masterBedroomDescription' => $arrayData['281'],
                '2ndBedroomDescription' => $arrayData['282'],
                '3rdBedroomDescription' => $arrayData['283'],
                '4thBedroomDescription' => $arrayData['284'],
                'possessionDescription' => $arrayData['285'],
                'ovenDescription' => $arrayData['289'],
                'equestrianDescription' => $arrayData['296'],
                'miscellaneousDescription' => $arrayData['298'],
                'exteriorDescription' => $arrayData['299'],
                'landscapeDescription' => $arrayData['300'],
                'heatingFuelDescription' => $arrayData['302'],
                'energyDescription' => $arrayData['305'],
                'furnishingsDescription' => $arrayData['2426'],
                'loftDescription' => $arrayData['2539'],
                'unitDescription' => $arrayData['2543'],
                'saleType' => $arrayData['2941'],
                'idx' => $arrayData['1809'],
                'images' => $arrayData['129'],
                'photoExcluded' => $arrayData['2883'],
                'photoInstructions' => $arrayData['182'],
                'communityName' => $arrayData['155'],
                'entryDate' => $arrayData['104'],
                'daysOnMarket' => $arrayData['101'],

                // 'closePriceSale Price' => $arrayData['210'],
                // 'closeDate' => $arrayData['25'],
//
                // TODO: Unset until column is in db
                //  'legalLctnTownship' => $arrayData['3'],
                //  'leaseEnd' => $arrayData['2977'],
                // 'greenCertificationRating' => $arrayData['2931'],
                // 'activeDom' => $arrayData['2940'],
                // 'gated' => $arrayData['2946'],
                // 'approxTotalLivAreaInt' => $arrayData['2953'],
                // 'subdivisionName' => $arrayData['247'],
                // 'masterPlanFeeAmount' => $arrayData['249'],
                // 'email' => $arrayData['2385'],
                // 'unitNumber' => $arrayData['2386'],
                // 'width' => $arrayData['2448'],
                // 'litigation' => $arrayData['2454'],
                // 'ownership' => $arrayData['2505'],
                // 'type' => $arrayData['2507'],
                // 'assessmentYN' => $arrayData['109'],
                // 'fence' => $arrayData['112'],
                // 'fireplaces' => $arrayData['113'],
                // 'convertedGarage' => $arrayData['120'],
                // 'manufactured' => $arrayData['2630'],
                // 'contractDateAcceptance' => $arrayData['85'],
                // 'solarElectric' => $arrayData['2978'],
                // 'ageRestricted' => $arrayData['2983'],
                // 'associationFee1' => $arrayData['39'],
                // 'garage' => $arrayData['122'],
                // 'internet' => $arrayData['130'],
                // 'model' => $arrayData['164'],
                // 'pvPool' => $arrayData['203'],
                // 'sewer' => $arrayData['219'],
                // 'legalLctnRange' => $arrayData['4'],
                // 'legalLctnSection' => $arrayData['5'],
                // 'additionalAUSoldTerms' => $arrayData['2890'],
                // 'saleOfficeBonus' => $arrayData['70'],
                // 'builder' => $arrayData['71'],
                // 'carport' => $arrayData['74'],
                // 'contingencyDesc' => $arrayData['84'],
                // 'washerIncluded' => $arrayData['2440'],
                // 'publicAddressYN' => $arrayData['2858'],
                // 'commentaryYN' => $arrayData['2859'],
                // 'publicAddress' => $arrayData['2861'],
                // 'priceChgDate' => $arrayData['2908'],
                // 'countyName' => $arrayData['87'],
                // 'compassPoint' => $arrayData['100'],
                // 'earnestDeposit' => $arrayData['103'],
                // 'auctionType' => $arrayData['2879'],
                // 'documentFolderID' => $arrayData['2903'],
                // 'documentFolderCount' => $arrayData['2904'],
                // 'accessibilityFeatures' => $arrayData['2925'],
                // 'greenFeatures' => $arrayData['2927'],
                // 'pvSpa' => $arrayData['236'],
                // 'water' => $arrayData['261'],
                // 'tempOffMrktStatusDesc' => $arrayData['2892'],
                // 'tStatusDate' => $arrayData['2893'],
                // 'landUse' => $arrayData['132'],
                // 'area' => $arrayData['37'],
                // 'assessmentAmount' => $arrayData['38'],
                // 'associationFee' => $arrayData['58'],
                // 'threeQuarterBaths' => $arrayData['60'],
                // 'fullBaths' => $arrayData['61'],
                // 'halfBaths' => $arrayData['62'],
                // 'modificationTimestamp' => $arrayData['135'],
                // 'listDate' => $arrayData['138'],
                // 'metroMapMapCoor' => $arrayData['158'],
                // 'virtualTourLink' => $arrayData['2139'],
                // 'LPSqFt' => $arrayData['2341'],
                // 'associationFee2' => $arrayData['32'],
                // 'refrigeratorIncluded' => $arrayData['33'],
                // 'dryerUtilities' => $arrayData['34'],
                // 'associationName' => $arrayData['35'],
                // 'associationPhone' => $arrayData['36'],
                // 'metroMapMapPage' => $arrayData['159'],
                // 'LOName' => $arrayData['171'],
                // 'listAgentAgentID' => $arrayData['143'],
                // 'SIDLIDAnnualAmount' => $arrayData['54'],
                // 'associationFee2' => $arrayData['56'],
                // 'greenBuildingCertification' => $arrayData['2928'],
                // 'greenYearCertified' => $arrayData['2929'],
                // 'zoning' => $arrayData['266'],
                // 'bedroomsTotalPossible' => $arrayData['2379'],
                // 'greatRoomDimensions' => $arrayData['2430'],
                // 'length' => $arrayData['2434'],
                // 'greenCertifyingBody' => $arrayData['2930'],
                // 'groundMountedYN' => $arrayData['125'],
                // 'associationFee1' => $arrayData['127'],
                // 'zUnused' => $arrayData['2852'],
                // 'AVMYN' => $arrayData['2860'],
                // 'SPLP' => $arrayData['2864'],
                // 'auctionDate' => $arrayData['2878'],
                // 'lastTransactionCode' => $arrayData['134'],
                // 'listOfficeOfficeID' => $arrayData['137'],
                // 'statusChangeDate' => $arrayData['18'],
                // 'listAgentFirstName' => $arrayData['26'],
                // 'listAgentPhone' => $arrayData['27'],
                // 'annualPropertyTaxes' => $arrayData['28'],
                // 'dishwasherInc' => $arrayData['30'],
                // 'disposalIncluded' => $arrayData['31'],
                // 'coolingSystem' => $arrayData['303'],
                // 'utilityInformation' => $arrayData['304'],
                // 'subdivisionNumber' => $arrayData['1734'],
                // 'LPSqFtWithCents' => $arrayData['1738'],
                // 'LOPhone' => $arrayData['172'],
                // 'ownerLicensee' => $arrayData['175'],
                // '2ndBedroomDimensions' => $arrayData['89'],
                // '3rdBedroomDimensions' => $arrayData['90'],
                // '4thBedroomDimensions' => $arrayData['91'],
                // 'diningRoomDimensions' => $arrayData['92'],
                // 'familyRoomDimensions' => $arrayData['93'],
                // '5thBedroomDimensions' => $arrayData['94'],
                // 'livingRoomDimensions' => $arrayData['95'],
                // 'masterBedroomDimensions' => $arrayData['96'],
//
                // TODO: Properly Name
                // 'TaxID  Parcel #' => $arrayData['176'],
                // 'Tax District' => $arrayData['177'],
                // 'Den/Other' => $arrayData['184'],
                // 'Pool Length' => $arrayData['186'],
                // 'Pool Width' => $arrayData['187'],
                // 'Power On or Off' => $arrayData['188'],
                // 'Previous Price' => $arrayData['199'],
                // 'Property Condition' => $arrayData['202'],
                // 'Legal Location Range' => $arrayData['204'],
                // 'Record Delete Date DateTime    10' => $arrayData['205'],
                // 'Realtor? Y/N' => $arrayData['206'],
                // 'Record Delete Flag' => $arrayData['207'],
                // 'Existing Rent' => $arrayData['208'],
                // 'SaleOfficeOfficeID Buyer Broker' => $arrayData['211'],
                // 'Elementary School 3-5' => $arrayData['213'],
                // 'High School' => $arrayData['214'],
                // 'Jr High School' => $arrayData['215'],
                // 'Year Round School' => $arrayData['216'],
                // 'Legal Location Section' => $arrayData['217'],
                // 'SaleAgentAgentID   Buyer Agent Public ID' => $arrayData['218'],
                // 'SID/LID Balance' => $arrayData['221'],
                // 'Amt Owner Will Carry' => $arrayData['228'],
                // 'Loft' => $arrayData['231'],
                // 'Sellers Contribution $' => $arrayData['232'],
                // 'soldTerm' => $arrayData['233'],
                // 'Sort Price' => $arrayData['235'],
                // LivingArea  Approx Liv Area'' => $arrayData['237'],
                // 'Master Plan Fee - M,Q,Y,N' => $arrayData['250'],
                // 'Legal Location Township' => $arrayData['253'],
                // 'Washer Dryer Location' => $arrayData['260'],
                // Directions  Directions'' => $arrayData['274'],
                // 'Master Bath Desc' => $arrayData['280'],
                // 'Financing Considered' => $arrayData['287'],
                // 'Show (Additional)' => $arrayData['288'],
                // 'Fence Type' => $arrayData['295'],
                // 'House Faces' => $arrayData['297'],
                // 'Est Clo/Lse dt DateTime    10' => $arrayData['1736'],
                // 'Open House Flag' => $arrayData['2237'],
                // 'Last Image Trans Date  DateTime    10' => $arrayData['2238'],
                // 'Metro Map Coor XP' => $arrayData['2343'],
                // 'Metro Map Page XP' => $arrayData['2345'],
                // 'Subdivision Name XP' => $arrayData['2353'],
                // 'SP/SqFt [w/cents]' => $arrayData['2359'],
                // 'Approx Liv Area' => $arrayData['2361'],
                // 'Subdivision #' => $arrayData['2367'],
                // 'Short Sale' => $arrayData['2369'],
                // 'Elementary School K-2' => $arrayData['2377'],
                // 'Days from Listing to Close' => $arrayData['2381'],
                // 'Fax #' => $arrayData['2383'],
                // 'Assoc/Comm Features Desc' => $arrayData['2388'],
                // 'Association Fee Includes' => $arrayData['2390'],
                // 'Bath Downstairs? Y/N' => $arrayData['2392'],
                // 'Bedroom Downstairs? Y/N' => $arrayData['2394'],
                // 'Bldg Desc' => $arrayData['2414'],
                // 'Building Number' => $arrayData['2416'],
                // 'convertedto Real Property' => $arrayData['2418'],
                // 'courtApproval' => $arrayData['2420'],
                // 'Fireplace Location' => $arrayData['2422'],
                // 'Foreclosure Commenced Y/N' => $arrayData['2424'],
                // 'Great Room Y/N' => $arrayData['2428'],
                // 'Dryer Included?' => $arrayData['2442'],
                // 'House Views' => $arrayData['2450'],
                // 'Property Subtype' => $arrayData['2452'],
                // 'SID/LID Y/N' => $arrayData['2463'],
                // 'Assessment Amount Type' => $arrayData['2465'],
                // 'Litigation Type' => $arrayData['2467'],
                // 'MHYrBlt' => $arrayData['2509'],
                // 'DEN Dim' => $arrayData['2511'],
                // 'LOFT Dim' => $arrayData['2513'],
                // 'Loft Dimensions 1stFloor' => $arrayData['2535'],
                // 'Loft Dimensions 2ndFloor' => $arrayData['2537'],
                // 'Studio Y/N' => $arrayData['2547'],
                // 'Condo Conversion Y/N' => $arrayData['2549'],
                // 'Approx Addl Liv Area' => $arrayData['2576'],
                // 'Repo/Reo Y/N' => $arrayData['2660'],
                // 'NOD Date   DateTime    10' => $arrayData['2661'],
            ];
        }

        foreach ($newArray as $propertyArrayKey => $property) {
            foreach ($property as $propertyKey => $propertyValue) {
                switch (true) {
                    case $propertyValue == 'Single Family Res':
                        $property[$propertyKey] = 'single family';
                        break;

                    default:
                        # code...
                        break;
                }
            }

            $newArray[$propertyArrayKey]['customPropertyDescription'] = $property['customPropertyDescription'] = 'Property has been listed with the Jacobs Group for '
                . $property['daysOnMarket'] . ' days. This ' . $property['propertyType'] . ' home is located at ' . $property['streetNumber'] . ' '
                . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state'] . ' home has ' . $property['totalBaths'] . ' baths, ' . ' '
                . $property['lotSqft'] . ' sqft, ' . ' and ' . $property['bedrooms'] . ' bedrooms.';
  // "waterHeaterDescription" => ""
  // "garageDescription" => ""
  // "roofDescription" => ""Composition Shingle""
  // "lotDescription" => ""1/4 to 1 Acre""
  // "spaDescription" => ""
  // "poolDescription" => ""
  // "interiorDescription" => ""Blinds","Ceiling Fan(s)""
  // "otherApplianceDescription" => ""Microwave""
  // "constructionDescription" => ""Frame & Siding""
  // "flooringDescription" => ""Carpet","Linoleum/Vinyl""
  // "fireplaceDescription" => ""Wood Burning""
  // "builtDescription" => "Resale"
  // "carportDescription" => ""
  // "parkingDescription" => ""
  // "5thBedroomDescription" => ""
  // "heatingDescription" => ""Central""
  // "greatRoomDescription" => ""
  // "bathDownstairsDescription" => "Full Bath Downstairs"
  // "coolingFuelDescription" => "Electric"
  // "diningRoomDescription" => ""Dining Area""
  // "familyRoomDescription" => ""Separate Family Room""
  // "kitchenDescription" => ""Breakfast Bar/Counter","Solid Surface Countertops","Linoleum/Vinyl Flooring""
  // "livingRoomDescription" => ""Front""
  // "masterBedroomDescription" => ""Mbr Walk-In Closet""
  // "2ndBedroomDescription" => ""
  // "3rdBedroomDescription" => ""
  // "4thBedroomDescription" => ""
  // "possessionDescription" => "Close of Escrow"
  // "ovenDescription" => ""Cooktop (E)""
  // "equestrianDescription" => ""None""
  // "miscellaneousDescription" => ""None""
  // "exteriorDescription" => ""None""
  // "landscapeDescription" => ""No Landscaping Front","No Landscaping Rear""
  // "heatingFuelDescription" => ""Electric""
  // "energyDescription" => ""None""
  // "furnishingsDescription" => "No Furniture"
  // "loftDescription" => ""
  // "unitDescription" => ""

        }

        return $newArray;
    }

    public function buildPropertyDescription($propertyArray)
    {

    }
}
