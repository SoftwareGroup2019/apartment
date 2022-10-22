<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::paginate(10);
        return view('dashboard.client.index',[
            'allclient'=>$client
        ]);
    }


    public function create()
    {
        $service = Service::all();
        return view('dashboard.client.create',[
            'allservice'=>$service
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
    
        Client::create([
            'name' => $request->name,
            'password' => $request->password,
            'service_id' => $request->service_id
        ]);

        session()->flash('success', __('Client Added Successfully'));
        return redirect('/dashboard/client');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       
        $client = Client::find($id);
        $service = Service::all();

        return view('dashboard.client.edit',[
            'selectedclient'=>$client,
            'allservice'=>$service
        ]);
    }


    public function update(Request $request, $id)
    {
        Client::where('id', $id)
        ->update([
            'name' => $request->name,
            'service_id' =>$request->service_id
        ]);
        session()->flash('success', __('Client. Updated Successfully'));
        return redirect('/dashboard/client');
    }


    public function destroy($id)
    {
        //
        Client::destroy($id);
        session()->flash('success', __('Client. Deleted Successfully'));
        return redirect('/dashboard/client');
    }
}
