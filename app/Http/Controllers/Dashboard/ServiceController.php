<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::paginate(5);
        return view('dashboard.service.index',[
            'allservice'=>$service
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Service::create([
            'servicename' => $request->servicename,
            'username' => $request->username,
            'password' => $request->password,
            'phonenumber' => $request->phonenumber,
        ]);

        session()->flash('success', __('Service Added Successfully'));
        return redirect('/dashboard/service');
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
        $service = Service::find($id);

        return view('dashboard.service.edit',[
            'selectedservice'=>$service
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
        Service::where('id', $id)
        ->update([
            'servicename' => $request->servicename,
            'username' => $request->username,
            'password' => $request->password,
            'phonenumber' => $request->phonenumber,
        ]);
        session()->flash('success', __('Service Updated Successfully'));
        return redirect('/dashboard/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        session()->flash('success', __('Service Deleted Successfully'));
        return redirect('/dashboard/service');
    }
}
