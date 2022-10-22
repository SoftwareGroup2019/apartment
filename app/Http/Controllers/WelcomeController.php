<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    //
    public function login(Request $request)
    {

        var_dump(Auth::check());

        // if (Auth::check()) {
        //     dd($request->all());
        //     return redirect('/dashboard/home');
        // }
        // return back()->with('error', 'failed to login');
    }
}
