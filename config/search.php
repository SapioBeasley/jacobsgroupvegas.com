<?php

return [
	'operators' => [
		'listingId' => [
			'operator' => '='
		],
		'city' => [
			'operator' => 'LIKE'
		],
		'community' => [
			'operator' => 'LIKE'
		],
		'postalCode' => [
			'operator' => '='
		],
		'bedrooms' => [
			'operator' => '>='
		],
		'totalBaths' => [
			'operator' => '>='
		],
		'min_price' => [
			'operator' => '>='
		],
		'max_price' => [
			'operator' => '<='
		],
		'min_sqft' => [
			'operator' => '>='
		],
		'max_sqft' => [
			'operator' => '<='
		],
	],
];
