<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
    	#Todo: Use Validation 
        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
        	$user->api_token = str_random(60);
        	$user->save();

        	return response()->json([
                'status' => 200,
                'api_token' => $user->api_token,
                'username' => $user->name,
                'email' => $user->email,
                'id' => $user->id
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => 'Unauthenticated.'
        ]);		
    }

    public function register(Request $request)
    {
    	#Todo: Use Validation
    	$user = new User();

    	$user->email = $request->email;
    	$user->name = $request->name;
    	$user->password = bcrypt($request->password);
    	$user->api_token = str_random(60);

    	if ($user->save()) {
    		return response()->json([
	            'status' => 200,
	            'api_token' => $user->api_token,
	            'username' => $user->name,
	            'email' => $user->email,
	            'id' => $user->id
	        ]);
    	} else {
    		return response()->json([
                'message' => 'Something went wrong.',
                'status' => 205
            ]);
    	}
    }
}
