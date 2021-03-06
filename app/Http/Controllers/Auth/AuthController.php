<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function ajaxAuth(Request $request)
    {
        $login = $this->login($request);

        $sessionData = $login->getSession();

        if (! is_null($sessionData->get('errors'))) {
            $errors = $sessionData->get('errors')->toJson();

            return $sessionData->get('errors')->toJson();
        }

        $response = new \Illuminate\Http\Response();

        $response->withCookie(cookie()->forget('propertyViews'));

        return $response;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data = $this->mapData($data);

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data = $this->mapData($data);

        if (env('APP_ENV') != 'local') {
            \Mail::send('emails.newRegister', ['data' => $data], function ($m) use ($data) {
                $m->from($data['email'], $data['name']);

                $m->to(env('MAIL_USERNAME'), 'Jacobs Site')->subject('New Site Registration');
            });
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone']
        ]);
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
