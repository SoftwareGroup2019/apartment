<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentClient;
use App\Models\ApartmentService;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    //
    public function allService()
    {

        try {
            
            $service = Service::all();

            // dd($client);

            if ($service) {

                    return response()->json([
                    'status'=>"Success",
                    'msg'=>"Service Recevied Successfully",
                    'data'=>$service
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'All Service Not Recevied'
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

    public function order(Request $request)
    {
        // dd($request->all());
        
        try {
            $order = ApartmentService::create([
                'apartment_id'=>$request->apartment_id,
                'service_id'=>$request->service_id,
                'status'=>'inComplete'
            ]);
            
            if ($order) {
    
                    return response()->json([
                    'status'=>"Success",
                    'msg'=>"Order Added Successfully",
                    'data'=>$order
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'Order Not Added'
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

    public function aptorders($id)
    {
        // $apt_orders = DB::table('apartment_clients')->get();

        $apt_orders = Apartment::find($id);
        

        return $apt_orders->services;
    }
}
