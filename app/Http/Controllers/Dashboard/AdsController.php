<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdsCompany;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Advertisment::paginate(10);
        return view('dashboard.ads.index',[
            'allads'=>$ads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ads.create');
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

        $group = Auth::user()->group->id;

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = $request->file('image')->store('image', 'public');

       

        Advertisment::create([
            'title' => $request->title,
            'image' => $image_path,
            'video' => $request->video,
            'period'=> $request->period,
            'provider'=> $request->provider,
            'group_id'=> $group
        ]);

        session()->flash('success', __('Ads Added Successfully'));
        return redirect('/dashboard/ads');
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
       
        $ads = Advertisment::find($id);
        return view('dashboard.ads.edit',[
            'selectedads'=>$ads]);
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
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('image', 'public');
        Advertisment::where('id', $id)
        ->update([
            'title' => $request->title,
            'image' => $image_path,
            'video' => $request->video,
            'period'=> $request->period,
            'provider'=> $request->provider
        ]);
        session()->flash('success', __('Ads. Updated Successfully'));
        return redirect('/dashboard/ads');
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
        Advertisment::destroy($id);
        session()->flash('success', __('Ads. Deleted Successfully'));
        return redirect('/dashboard/ads');
    }
}
