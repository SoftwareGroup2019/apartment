<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function count()
    {
       $user_count = User::all()->count();
       $apt_count = Apartment::all()->count();
       $ads_count = Advertisment::all()->count();
       $client_count = Service::all()->count();

       return view('dashboard.home',[
        'user_length'=>$user_count,
        'apt_length'=>$apt_count,
        'ads_length'=>$ads_count,
        'client_length'=>$client_count
       ]);
    }
}
