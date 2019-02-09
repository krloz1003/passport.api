<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login () {
		if (auth()->attempt(request()->input())) {
			$user = auth()->user();
			$success['token'] =  $user
				->createToken('Passport Api', ['show-products'])
				->accessToken;
			return response()->json(['success' => $success], 200);
		} else {
			return response()->json(['error' => 'Unauthorized'], 401);
		}
    }
        
    public function register () {
        $validator = Validator::make(request()->input(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required', 
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        request()->merge(['password' => bcrypt(request('password'))]);
        $user = User::create(request()->input());
        $success['token'] = $user
            ->createToken('Passport Api', ['show-products'])
            ->accessToken;

        return response()->json(['success' => $success]);

    }
}
