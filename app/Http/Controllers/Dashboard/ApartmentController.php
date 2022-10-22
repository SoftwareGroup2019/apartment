<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApartmentController extends Controller
{

    public function index()
    {
        $apt = Apartment::paginate(5);
        return view('dashboard.apartment.index',[
            'allapartment'=>$apt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.apartment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Apartment::create([
            'apartmentname' => $request->apartmentname,
            'password'=> Hash::make($request->password),
            'enableads' => $request->enableads,
            'enableservice' => $request->enableservice
        ]);

        session()->flash('success', __('Apartment Added Successfully'));
        return redirect('/dashboard/apartment');
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
        $apt = Apartment::find($id);

        return view('dashboard.apartment.edit',[
            'selectedapartment'=>$apt,
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
        Apartment::where('id', $id)
        ->update([
            'apartmentname' => $request->apartmentname,
            'password'=> $request->password,
            'enableads' => $request->enableads,
            'enableservice' => $request->enableservice
        ]);
        session()->flash('success', __('Apartment Updated Successfully'));
        return redirect('/dashboard/apartment');
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
        Apartment::destroy($id);
        session()->flash('success', __('Apartment Deleted Successfully'));
        return redirect('/dashboard/apartment');
    }
}

