<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
    	User::updateOrCreate(['email' => $request->email],[
    		'name'	=> $request->name,
    		'email'	=> $request->email,
    		'password'	=> $request->password,
    	]);
    	$http = new Client;

		$response = $http->post(url('oauth/token'), [
		    'form_params' => [
		        'grant_type' 	=> 'password',
		        'client_id' 	=> '2',
		        'client_secret' => 'NEiuZS5KmxyqLtHNVeXtKuycwQgkGI9Z7zFl5qnO',
		        'username' 		=> $request->email,
		        'password' 		=> $request->password,
		        'scope' 		=> '',
		    ],
		]);

		return response(['data' => json_decode((string) $response->getBody(), true)]);
    }

    public function login(LoginRequest $request)
    {
    	$user = User::where('email', $request->email)->first();
    	if($user){
    		$checker = Hash::check($request->password, $user->password);
	    	if($checker){
	    		$http = new Client;

				$response = $http->post(url('oauth/token'), [
				    'form_params' => [
				        'grant_type' 	=> 'password',
				        'client_id' 	=> '2',
				        'client_secret' => 'NEiuZS5KmxyqLtHNVeXtKuycwQgkGI9Z7zFl5qnO',
				        'username' 		=> $request->email,
				        'password' 		=> $request->password,
				        'scope' 		=> '',
				    ],
				]);

				return response(['data' => json_decode((string) $response->getBody(), true)]);
	    	}
    	}
    	return response(['status' => 'Error', 'message' => 'Email or password not valid']);
    }
}
