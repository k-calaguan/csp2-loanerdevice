<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\Modelname;
use App\Status;
use Illuminate\Http\Request;
use Auth;
use Session;

class AssetController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = Auth::user();
		$modelnames = Modelname::all()->sortBy('name');
		$statuses = Status::all()->where('id', '<=', 2)->sortBy('name');
		$categories = Category::all()->sortBy('name');
		if(request()->has('filter')) {
			$assets = Asset::where('status_id', request('filter'))->get()->sortBy('name');
		} else {
			$assets = Asset::all()->sortBy('name');
		}

		$assetcounts = Asset::groupBy('modelname_id')
			->selectRaw('count(*) as total, modelname_id')
			->where('status_id', 1)
			->get();

		return view('assets.index', compact('user', 'assets', 'categories', 'statuses', 'modelnames', 'assetcounts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$modelnames = Modelname::all()->sortBy('name');
		$statuses = Status::all()->where('id', '<=', 2)->sortByDesc('name');
		$categories = Category::all()->sortBy('name');
		return view('assets.create', compact('categories', 'statuses', 'modelnames'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = array(
			'sn' => 'required',
			'modelname_id' => 'required',
			'status_id' => 'required',
		);

		$this->validate($request, $rules);
		
		// if asset serial number already exists, redirect back to asset create form
		if(Asset::where('sn', $request->sn)->exists()) {
			Session::flash('status', 'An asset with serial number '.'"'.$request->sn.'"'.' already exists.');
				Session::flash('alert-type', 'alert-danger');
				return redirect('/assets/create');
		}

		$asset = new Asset;
		$asset->sn = $request->sn;
		$asset->modelname_id = $request->modelname_id;
		$asset->status_id = $request->status_id;
		$asset->save();

		Session::flash('status', 'Successfully added new asset with serial number '.'"'.$request->sn.'".');
		Session::flash('alert-type', 'alert-success');

		return redirect('/assets/create'); 
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
		$asset = Asset::find($id);
		$rules = array(
			'sn' => 'required',
			'modelname_id' => 'required',
			'status_id' => 'required',
		);

		$this->validate($request, $rules);

		$asset->sn = $request->sn;
		$asset->modelname_id = $request->modelname_id;
		$asset->status_id = $request->status_id;
		$asset->save();

		Session::flash('status', 'Successfully updated '.$request->sn.'.');
		Session::flash('alert-type', 'alert-success');

		return redirect('/assets');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		/*$asset = Asset::find($id);
		if($asset->status_id == 1){
			$asset->status_id = 2;
			$asset->save();
			Session::flash('status', 'Item '.'"'.$asset->sn.'"'.' has been disabled.');
			Session::flash('alert-type', 'alert-danger');

		} else {
			$asset->status_id = 1;
			$asset->save();
			Session::flash('status', 'Item '.'"'.$asset->sn.'"'.' has been enabled.');
			Session::flash('alert-type', 'alert-success');
		}*/

		return redirect('/assets');
	}
}
