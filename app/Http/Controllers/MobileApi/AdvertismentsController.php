<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertismentsController extends Controller
{
    //

    public function allAdvertisment()
    {
        try {
            
            $all_ads = Advertisment::all();

            if ($all_ads) {
    
                    return response()->json([
                    'status'=>"Success",
                    'msg'=>"Advertisment Recevied Successfully",
                    'data'=>$all_ads
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'All Advertisment Not Recevied'
                ], 401);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }
    
}
