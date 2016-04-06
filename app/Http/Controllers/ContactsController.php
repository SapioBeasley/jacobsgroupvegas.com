<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
	public function propertyInquire(Request $request)
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

		\Mail::send($email, ['user' => $user], function ($m) use ($user) {
			$m->from($user['email'], $user['name']);

			$m->to(env('MAIL_USERNAME'), 'Jacobs Site')->subject('New Inquire');
		});

		return redirect()->back()->with('success_message', 'Your inquiry has been sent...');
	}
}
