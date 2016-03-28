<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
	public function propertyInquire(Request $request)
	{
		$user = $request->all();

		\Mail::send('emails.propertyInquire', ['user' => $user], function ($m) use ($user) {
			$m->from($user['email'], $user['name']);

			$m->to(env('MAIL_USERNAME'), 'Jacobs Site')->subject('Property Inquire');
		});

		return redirect()->back()->with('success_message', 'Your inquire for this property has been sent...');
	}
}
