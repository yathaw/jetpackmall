<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Carbon\Carbon;
use App\User;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request){

    	// dd($request->township);

    	$validator = Validator::make($request->all(), [
            'name' 		=> 'required',
            'email' 	=> 'required|email|unique:users',
            'password' 	=> 'required',
            'c_password'=> 'required|same:password',
            'phone'    	=> 'required',
            'address' 	=> 'required',
        ]);

        if($validator->fails()){
            $message = 'Validation Error.';
            $status = 400;

            $response = [
                'status'  => $status,
                'success' => false,
                'data'    => $validator->errors(),
                'message' => $message,
            ];

            return response()->json($response, 400);       
        }
        else{
        	$name = $request->name;
	        $email = $request->email;
	        $password = $request->password;
	        $phone = $request->phone;
	        $township = $request->township;
	        $address = $request->address;
	        $profile = 'images/user/emoji.png';

	        $user = User::create([
	            'name'      =>  $name,
	            'profile'   =>  $profile,
	            'email'     =>  $email,
	            'password'  =>  bcrypt($password),
	            'phone'     =>  $phone,
	            'address'   =>  $address,
	            'township_id' =>  $township
	        ]);
	        $user->assignRole('customer');
        	Auth::login($user);
	        $token = $user->createToken('MyApp')->accessToken;

        	$message = 'User register successfully.';
	        $status = 200;
	        $result = new UserResource($user);

	        $response = [
	            'status'  => $status,
	            'success' => true,
	            'data'    => $result,
	            'token'	  => $token,
	            'message' => $message,
	        ];


	        return response()->json($response, 200);
        }

    }

    public function login(Request $request){
    	$email = $request->email;
    	$password = $request->password;


    	if(Auth::attempt([
    		'email' => $email, 
    		'password' => $password])){

            $user = $request->user(); 
            $tokenResult =  $user->createToken('MyApp'); 
            $token = $tokenResult->token;

            $message = 'User login successfully.';
	        $status = 200;
	        $result = new UserResource($user);

	        $response = [
	            'status'  => $status,
	            'success' => true,
	            'data'    => $result,
	            'token'	  => $tokenResult->accessToken,
	            'token_type' => 'Bearer',
	            'message' => $message,
	        ];
   
            return response()->json($response, 200);
        } 
        else{ 

        	$message = 'User Unauthorised';
	        $status = 401;

	        $response = [
	            'status'  => $status,
	            'success' => true,
	            'message' => $message,
	        ];

            return response()->json($response, 401);
        } 
    }

    public function logouts(){
    	if (Auth::check()) {
	       Auth::user()->AuthAcessToken()->delete();

	       	return response()->json([
	            'message' => 'Successfully logged out'
	        ]);
	    }
    }

    public function logout(Request $request){

    	$value = $request->bearerToken();
    	$id = (new Parser())->parse($value)->getHeader('jti');
    	$token = $request->user()->tokens->find($id);
    	$token->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
