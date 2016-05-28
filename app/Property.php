<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'AccessibilityFeatures',
        'AdditionalAUSoldTerms',
        'AdditionalPetRentYN',
        'AdministrationFeeYN',
        'AdministrationRefund',
        'AgeRestrictedCommunityYN',
        'AnnualPropertyTaxes',
        'ApplicationFeeYN',
        'ApproxAddlLivArea',
        'ApproxTotalLivArea',
        'AppxSubfeeAmount',
        'Area',
        'AssociationFeaturesAvailable',
        'AssociationFee1',
        'AssociationFee1MQYN',
        'AssociationFeeIncludes',
        'AssociationFeeMQYN',
        'AssociationFeeYN',
        'AssociationName',
        'AssociationPhone',
        'BathDownstairsDescription',
        'BathDownYN',
        'BathsFull',
        'BathsHalf',
        'BathsTotal',
        'BedandBathDownYN',
        'BedroomDownstairsYN',
        'BedroomsTotalPossibleNum',
        'BedsTotal',
        'BlockNumber',
        'BrandedVirtualTour',
        'Builder',
        'BuildingDescription',
        'BuildingNumber',
        'BuiltDescription',
        'CarportDescription',
        'Carports',
        'CensusTract',
        'City',
        'CleaningDeposit',
        'CleaningRefund',
        'CloseDate',
        'ClosePrice',
        'CompactorYN',
        'ConditionalDate',
        'CondoConversionYN',
        'ConstructionDescription',
        'ContingencyDesc',
        'ConvertedGarageYN',
        'ConvertedtoRealProperty',
        'CoolingDescription',
        'CoolingFuel',
        'CostperUnit',
        'CountyOrParish',
        'CourtApproval',
        'CrossStreet',
        'CurrentLoanAssumable',
        'CurrentPrice',
        'DateAvailable',
        'Deposit',
        'Directions',
        'DishwasherDescription',
        'DishwasherYN',
        'DisposalYN',
        'DOM',
        'DomModifier_',
        'DomModifier_Initial',
        'DomModifier_StatusRValue',
        'DownPayment',
        'DryerIncluded',
        'DryerUtilities',
        'EarnestDeposit',
        'Electricity',
        'ElementarySchool35',
        'ElementarySchoolK2',
        'ElevatorFloorNum',
        'EnergyDescription',
        'EnvironmentSurvey',
        'EquestrianDescription',
        'EstCloLsedt',
        'ExistingRent',
        'ExpenseSource',
        'ExteriorDescription',
        'Fence',
        'FenceType',
        'FinancingConsidered',
        'Fireplace',
        'FireplaceDescription',
        'FireplaceLocation',
        'Fireplaces',
        'FirstEncumbranceAssumable',
        'FirstEncumbranceBalance',
        'FirstEncumbrancePayment',
        'FirstEncumbrancePmtDesc',
        'FirstEncumbranceRate',
        'FloodZone',
        'FlooringDescription',
        'ForeclosureCommencedYN',
        'FurnishedYN',
        'FurnishingsDescription',
        'Garage',
        'GarageDescription',
        'GasDescription',
        'GatedYN',
        'GravelRoad',
        'GreenBuildingCertificationYN',
        'GreenCertificationRating',
        'GreenCertifyingBody',
        'GreenFeatures',
        'GreenYearCertified',
        'GrossOperatingIncome',
        'GrossRentMultiplier',
        'GroundMountedYN',
        'HandicapAdapted',
        'HeatingDescription',
        'HeatingFuel',
        'HiddenFranchiseIDXOptInYN',
        'Highlights',
        'HighSchool',
        'HOAMinimumRentalCycle',
        'HOAYN',
        'HomeownerAssociationName',
        'HomeownerAssociationPhoneNo',
        'HomeProtectionPlan',
        'HotWater',
        'HouseFaces',
        'HouseViews',
        'IDX',
        'IDXOptInYN',
        'Interior',
        'InternetYN',
        'JrHighSchool',
        'JuniorSuiteunder600sqft',
        'KeyDeposit',
        'KeyRefund',
        'KitchenCountertops',
        'LandlordOwnerPays',
        'LandscapeDescription',
        'LandUse',
        'LastChangeTimestamp',
        'LastChangeType',
        'LastListPrice',
        'LastStatus',
        'LeaseDescription',
        'LeaseOptionConsideredY',
        'LeasePrice',
        'LeedCertified',
        'LegalDescription',
        'Length',
        'ListPrice',
        'Litigation',
        'LitigationType',
        'Location',
        'LotDepth',
        'LotDescription',
        'LotFront',
        'LotFrontage',
        'LotNumber',
        'LotSqft',
        'Maintenance',
        'Management',
        'Manufactured',
        'MapDescription',
        'MasterBedroomDownYN',
        'MasterPlan',
        'MasterPlanFeeAmount',
        'MasterPlanFeeMQYN',
        'Matrix_Unique_ID',
        'MHYrBlt',
        'MiscellaneousDescription',
        'MLNumofPropIfforSale',
        'MLS',
        'MLSNumber',
        'NODDate',
        'NOI',
        'OriginalEntryTimestamp',
        'OriginalListPrice',
        'OtherApplianceDescription',
        'OtherDeposit',
        'OtherEncumbranceDesc',
        'OtherIncomeDescription',
        'OtherRefund',
        'OvenDescription',
        'OvenFuel',
        'OwnerLicensee',
        'OwnerManaged',
        'Ownership',
        'OwnersName',
        'OwnerWillCarry',
        'PackageAvailable',
        'ParcelNumber',
        'PendingDate',
        'PermittedPropertyManager',
        'PerPetYN',
        'PhotoCount',
        'PhotoExcluded',
        'PhotoInstructions',
        'PhotoModificationTimestamp',
        'PoolDescription',
        'PoolLength',
        'PoolWidth',
        'PostalCode',
        'PoweronorOff',
        'PriceChgDate',
        'PropertyDescription',
        'PropertySubType',
        'PropertyType',
        'PublicAddress',
        'PublicAddressYN',
        'PvPool',
        'Range',
        'RATIO_CurrentPrice_By_SQFT',
        'RealtorYN',
        'RefrigeratorYN',
        'RoofDescription',
        'SolarElectric',
        'SqFtTotal',
        'StateOrProvince',
        'Status',
        'StatusChangeTimestamp',
        'StreetDirPrefix',
        'StreetDirSuffix',
        'StreetName',
        'StreetNumber',
        'StreetNumberNumeric',
        'StreetSuffix',
        'StudioYN',
        'SubdivisionName',
        'Type',
        'UnitDescription',
        'UnitNumber',
        'Utilities',
        'UtilityInformation',
        'VirtualTourLink',
        'YearBuilt',
        'Zoning',
        'ZoningAuthority',
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
