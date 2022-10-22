<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (Auth::user()->role->rolename == "Group") 
        {
           $group = Auth::user()->group->id;
           $users =  User::where(['role_id'=>2,'group_id'=>$group])->paginate(10);
           return view('dashboard.user.index',[
               'alluser'=>$users
           ]);
        }

        $user = User::paginate(10);

        return view('dashboard.user.index',[
            'alluser'=>$user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::select('select id, rolename from roles');
        $groups = DB::select('select id, groupname from groups');
        return view('dashboard.user.create',[
            'allrole'=>$roles,
            'allgroup'=>$groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>$request->role,
            'group_id'=>$request->group
        ]);

        session()->flash('success', __('User Added Successfully'));
        return redirect('/dashboard/user');
        
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
        $user = User::find($id);
        $roles = DB::select('select id, rolename from roles');
        $groups = DB::select('select id, groupname from groups');

        return view('dashboard.user.edit',[
            'selecteduser'=>$user,
            'allrole'=>$roles,
            'allgroup'=>$groups

        ]);
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
        User::where('id', $id)
      ->update([
        'name' => $request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'role_id'=>$request->role,
        'group_id'=>$request->group
      ]);
      session()->flash('success', __('User Updated Successfully'));
      return redirect('/dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('success', __('User Deleted Successfully'));
        return redirect('/dashboard/user');
    }
}
