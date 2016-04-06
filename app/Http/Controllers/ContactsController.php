<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
	public function inquire(Request $request)
	{
		$user = $request->all();

		switch (true) {
			case isset($user['listingId']):
				$email = 'emails.propertyInquire';
				break;

			case isset($user['community']):
				$email = 'emails.communityInquire';
				break;

			default:
				$email = 'emails.agentInquire';
				break;
		}

		$this->mailIt($email, $user);

		return redirect()->back()->with('success_message', 'Your inquiry has been sent...');
	}

	public function postListing(Request $request)
	{
		$data = $request->all();

		// Create listing
		$listing = \App\Listing::create([
			'address1' => $data['address1'],
			'address2' => $data['address2'],
			'city' => $data['city'],
			'state' => $data['state'],
			'zip' => $data['zip'],
			'property_type' => $data['property_type'],
			'condition' => $data['condition'],
			'beds' => $data['beds'],
			'baths' => $data['baths'],
			'additional_rooms' => $data['additional_rooms'],
			'approx_size' => $data['approx_size'],
			'approx_age_of_kitchen' => $data['approx_age_of_kitchen'],
			'approx_age_of_baths' => $data['approx_age_of_baths'],
			'message' => $data['message'],
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'phone' => $data['phone']
		]);

		$userData = $this->mapData($data);

		$checkForUser = \App\User::where('email', '=', $userData['email'])->first();

		if (is_null($checkForUser)) {

			// Create User
			$user = \App\User::create([
				'name' => $userData['name'],
				'email' => $userData['email'],
				'password' => bcrypt($userData['password']),
				'phone' => $userData['phone']
			]);
		}

		$email = 'emails.listingPost';

		$data['name'] = $userData['name'];

		$this->mailIt($email, $data);

		return redirect()->back()->with('success_message', 'Your listing has been sent for review...');
	}

	public function mailIt($template, $user)
	{
		\Mail::send($template, ['user' => $user], function ($m) use ($user) {
			$m->from($user['email'], $user['name']);

			$m->to(env('MAIL_USERNAME'), 'Jacobs Site')->subject('New Inquire');
		});

		return;
	}

	public function mapData($data)
	{
		$data = [
			'name' => $data['first_name'] . ' ' . $data['last_name'],
			'email' => $data['email'],
			'password' => $data['email'],
			'password_confirmation' => $data['email'],
			'phone' => $data['phone']
		];

		return $data;
	}
}
