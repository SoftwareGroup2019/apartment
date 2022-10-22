<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {
        try {

            $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            ->select('users.name', 'users.email','roles.rolename', 'groups.groupname')
            ->get();

            // $all_user = User::all();
            if ($users) {
    
                return response()->json([
                'status'=>"Success",
                'msg'=>"Users Recevied Successfully",
                'role'=>$users
            ]);
        }
        else {
            return response()->json([
                'data'=>[],
                'status'=>'failed',
                'message'=>'All Users Not Recevied'
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
            
            $user = User::create($request->all());

            if ($user) 
            {
                return response()->json([
                    'status'=>'success', 
                    'message'=>'User Created Successfully',
                    'data'=> $user
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'User Not Created'
                ], 403);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }


    public function show($id)
    {
        
        try {
            
            $user = User::find($id);
            if ($user) 
            {
                return response()->json([
                    'username'=>$user->name,
                    'email'=>$user->email,
                    'password'=>$user->password,
                    'role'=>$user->role->rolename,
                    'group'=>$user->group->groupname
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'User Not Created'
                ], 403);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }

    }


    public function edit($id)
    {
        try {

            $user = User::find($id);

            if ($user) {
                return response()->json([
                    'status'=>"Success",
                    'msg'=>"User Recevied Successfully",
                    'data'=>$user
                ]);
            }
            else {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'User Not Recevied'
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


    public function update(Request $request, User $user)
    {
        try {
            
            if ($user->update($request->all()))
            {
                return response()->json([
                    'data'=>$user,
                    'status'=>'success', 
                    'message'=>'User Updated Successfully'
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'User Not Updated'
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


    public function destroy(User $user)
    {
        try {

            if ($user->delete())
            {
                return response()->json([
                    'data'=>[],'status'=>'success', 'message'=>'User Deleted Successfully'
                ],200);
            }
            else 
            {
                return response()->json([
                    'data'=>[],
                    'status'=>'failed',
                    'message'=>'User Not Deleted'
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
