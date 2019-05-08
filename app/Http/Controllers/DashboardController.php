<?php

namespace App\Http\Controllers;

use Auth;
use App\Asset;
use App\User;
use Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Session::flash('status', 'Welcome back '.Auth::user()->name.'!');

        if(Auth::user()->is_admin == 'true'){
            $assets = Asset::latest()->take(10)->get();

            return view('dashboard.admin', compact('assets'));
        } else{

            return view('dashboard.user');
        }
    }
}
