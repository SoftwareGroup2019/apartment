<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{

    public function index()
    {
        try {

            $all_group = Group::paginate(10);

            if ($all_group) {
    
                    return response()->json([
                    'status'=>"Success",
                    'msg'=>"Group Recevied Successfully",
                    'data'=>$all_group
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'All Group Not Recevied'
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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            
            $group = Group::create($request->all());
            if ($group) 
            {
                return response()->json([
                    'data'=> $group,
                    'status'=>'success', 
                    'message'=>'Group Created Successfully'
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'Group Not Created'
                ], 403);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }


    public function show($id)
    {
        try {

            $group = Group::find($id);
            if ($group) {
                return response()->json([
                    'status'=>"Success",
                    'msg'=>"Group Recevied Successfully",
                    'data'=>$group
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'Group Not Recevied'
                ], 401);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }


    public function edit($id)
    {
        try {

            $group = Group::find($id);

            if ($group) {
                return response()->json([
                    'status'=>"Success",
                    'msg'=>"Group Recevied Successfully",
                    'data'=>$group
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'Group Not Recevied'
                ], 401);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }


    public function update(Request $request, Group $group)
    {
        try {

            if ($group->update($request->all()))
            {
                return response()->json([
                    'data'=>$group,
                    'status'=>'success', 
                    'message'=>'Group Updated Successfully'
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'Group Not Updated'
                ], 401);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }

    public function destroy(Group $group)
    {
        try {

            if ($group->delete())
            {
                return response()->json([
                    'data'=>[],'status'=>'success', 'message'=>'Group Deleted Successfully'
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'Group Not Deleted'
                ], 401);
            }
            
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }
}
