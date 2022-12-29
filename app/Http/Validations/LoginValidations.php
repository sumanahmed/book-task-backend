<?php

namespace App\Http\Validations;

use Illuminate\Support\Facades\Validator;


class LoginValidations {
     /**
     * MasterCipSectorValidations;
    */
    public static function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'email'     =>'required',
            'password'  =>'required'
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