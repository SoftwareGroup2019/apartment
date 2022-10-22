<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Apartment;
use Illuminate\Support\Facades\Hash;

class ApartmentsAuthController extends Controller
{
    //
    public function apartmentlogin(Request $request)
    {
        $device_name = $request->device_name;
        try {

            $valdations = Validator::make($request->all(), [
                'apartmentname'=>'required',
                'password'=>'required'
            ]);
    
            if ($valdations->fails()) 
            {
                return response()->json([
                    'status'=>false,
                    'message'=>'Validation Errors',
                    'errors'=>$valdations->errors()
                ],401);
            }

            $apt = Apartment::where('apartmentname',$request->apartmentname)->first();

            // return response()->json([
            //     'data'=>$apt
            // ]);
            if (! $apt || ! Hash::check($request->password,$apt->password)) {
                return response()->json([
                    'status'=>false,
                    'message'=>'Wrong Apartment Information'
                ],401);
            }

            return response()->json([
                'status'=>true,
                'message'=>'Apartment Loged in Successfully',
                'aptid'=>$apt->id,
                'aptname'=>$apt->apartmentname,
                'ads'=>$apt->enableads,
                'service'=>$apt->enableservice,
                'token'=>$apt->createToken($device_name)->plainTextToken
            ],200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }

    }
    
}
