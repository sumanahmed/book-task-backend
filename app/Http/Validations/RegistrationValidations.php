<?php

namespace App\Http\Validations;

use Illuminate\Support\Facades\Validator;


class RegistrationValidations {
     /**
     * MasterCipSectorValidations;
    */
    public static function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' =>'required',
            'lastName'  =>'required',
            'password'  =>'required',
            'email'     => 'required|unique:users,email'
        ]);

        if ($validator->fails()) {
            return ([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        return ['success'=> 'true'];

    }

}