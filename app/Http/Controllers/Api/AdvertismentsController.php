<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertismentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image_path = $request->file('image')->store('image', 'public');
    
            $data = Advertisment::create([
                'title' => $request->title,
                'image' => $image_path,
                'video' => $request->video,
                'period'=> $request->period,
                'ads_companie_id'=> $request->ads_companie_id
            ]);
    
            return response($data, Response::HTTP_CREATED);


        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
