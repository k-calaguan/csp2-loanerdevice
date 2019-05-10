<?php

namespace App\Http\Controllers;

use Auth;
use App\Asset;
use App\User;
use App\AssetUser;
use App\Status;
use App\Modelname;
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
		$statuses = Status::all();
		
		if(Auth::user()->is_admin == '1'){
			$assets = Asset::latest()->take(10)->get();
			$modelnames = Modelname::all();
			$users = User::latest()->take(10)->get();
			$requests = AssetUser::latest()->take(10)->get();
			$statuses = Status::all();
			return view('dashboard.admin', compact('assets', 'modelnames', 'users', 'requests', 'statuses'));
		} else{
			$requests = AssetUser::where('user_id', Auth::user()->id)->take(10)->get();
			return view('dashboard.user', compact('requests', 'statuses'));
		}
	}
}
