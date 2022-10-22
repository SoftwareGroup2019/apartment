<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function index()
    {
        $all_role = Role::paginate(10);

        if ($all_role) {

                return response()->json([
                'status'=>"Success",
                'msg'=>"Role Recevied Successfully",
                'data'=>$all_role
            ]);
        }
        else {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'All Role Not Recevied'
            ], 401);
        }


    }

 
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {

        $role = Role::create($request->all());

        if ($role) 
        {
            return response()->json([
                'data'=> $role,
                'status'=>'success', 
                'message'=>'Role Created Successfully'
            ],200);
        }
        else 
        {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'Role Not Created'
            ], 403);
        }

    }


    public function show($id)
    {
        $role = Role::find($id);

        if ($role) {
            return response()->json([
                'status'=>"Success",
                'msg'=>"Role Recevied Successfully",
                'data'=>$role
            ]);
        }
        else {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'Role Not Recevied'
            ], 401);
        }
    }


    public function edit($id)
    {
        $role = Role::find($id);

        if ($role) {
            return response()->json([
                'status'=>"Success",
                'msg'=>"Role Recevied Successfully",
                'data'=>$role
            ]);
        }
        else {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'Role Not Recevied'
            ], 401);
        }

    }


    public function update(Request $request, Role $role)
    {

        if ($role->update($request->all()))
        {
            return response()->json([
                'data'=>$role,
                'status'=>'success', 
                'message'=>'Role Updated Successfully'
            ],200);
        }
        else 
        {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'Role Not Updated'
            ], 401);
        }

    }


    public function destroy(Role $role)
    {
        if ($role->delete())
        {
            return response()->json([
                'data'=>[],'status'=>'success', 'message'=>'Role Deleted Successfully'
            ],200);
        }
        else 
        {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'Role Not Deleted'
            ], 401);
        }
    }
}
