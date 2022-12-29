<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Validations\{ LoginValidations, RegistrationValidations};
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    /**
     * register
     */
    public function register(Request $request)
    {
        $validationResult = RegistrationValidations::validate($request); 

        if (!$validationResult['success']) {
          return response($validationResult);
        }
    
        try {

            $requestAll = $request->all();
            $requestAll['password'] = bcrypt($request->password);

            $model = User::create($requestAll);
        
        } catch (\Exception $ex) {

            return response([
                'success' => false,
                'message' => 'Failed to save data.',
                'errors'  => env('APP_ENV') !== 'production' ? $ex->getMessage() : []
            ]);
        }

        return response([
            'success' => true,
            'data'    => $model,
            'message' => 'Data saved successfully'
        ]);
  
    }

    /**
     * login
     */
    public function login(Request $request)
    {
        $validationResult = LoginValidations::validate($request); 

        if (!$validationResult['success']) {
          return response($validationResult);
        }

        $credentials = array('email' => $request->email, 'password' => $request->password);

        try {

            if (! $token = JWTAuth::attempt($credentials)) {

                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);

            }            
            
        } catch (JWTException $ex) {

            return response()->json([
                'success' => false,
                'message' => env('APP_ENV') !== 'production' ? $ex->getMessage() : []
            ], 500);
        }
 	
 		//Token created, return with success response and jwt token
        return response()->json([
            'success'       => true,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    public function logout()
    {
        auth()->logout();

        return response()->json([
            'success' => true,
            'message' => 'User has been logged out'
        ]);

    }

}
