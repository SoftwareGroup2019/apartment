<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdsCompany;
use Illuminate\Http\Request;

class AdsCompanyController extends Controller
{
    public function index()
    {
        $adsco = AdsCompany::paginate(5);
        return view('dashboard.adscompany.index',[
            'alladsco'=>$adsco
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.adscompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdsCompany::create([
            'companyname' => $request->companyname,
            'phonenumber'=> $request->phonenumber,
        ]);

        session()->flash('success', __('AdsCo. Added Successfully'));
        return redirect('/dashboard/adscompany');
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
        $adsco = AdsCompany::find($id);

        return view('dashboard.adscompany.edit',[
            'selectedcompany'=>$adsco,
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
        AdsCompany::where('id', $id)
        ->update([
            'companyname' => $request->companyname,
            'phonenumber'=> $request->phonenumber,
        ]);
        session()->flash('success', __('AdsCo. Updated Successfully'));
        return redirect('/dashboard/adscompany');
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
        AdsCompany::destroy($id);
        session()->flash('success', __('AdsCo. Deleted Successfully'));
        return redirect('/dashboard/adscompany');
    }
}
