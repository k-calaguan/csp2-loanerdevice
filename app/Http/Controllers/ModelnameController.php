<?php

namespace App\Http\Controllers;

use App\Modelname;
use App\Category;
use Session;
use Illuminate\Http\Request;

class ModelnameController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return redirect('/assets/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return redirect('/assets/create');
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
			'name' => 'required',
			'category_id' => 'required',
		);

		$this->validate($request, $rules);

		if (Modelname::where('name', $request->name)->exists()) {
			Session::flash('status', 'Model name '.$request->name.' already exists.');
			Session::flash('alert-type', 'alert-danger');
		} else {
			$modelname = new Modelname;
			$modelname->name = $request->name;
			$modelname->category_id = $request->category_id;
			$modelname->specs = $request->specs;

			if($request->image != null){
				$request->image->move(public_path('/images'), str_replace(' ', '_', $request->image->getClientOriginalName()));
				$modelname->image = '/images/'.str_replace(' ', '_', $request->image->getClientOriginalName());
			}

			$modelname->save();

			Session::flash('status', 'Successfully added '.$modelname->name.' to the list.');
			Session::flash('alert-type', 'alert-success');
		}

		return redirect('assets/create');
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
		$categories = Category::all();
		$modelname = Modelname::find($id);
		return view('modelnames.edit', compact('categories', 'modelname'));
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
		// dd($request);
		$rules = array(
			'name' => 'required',
			'category_id' => 'required',
		);

		$this->validate($request, $rules);

		$modelname = Modelname::find($id);
		$modelname->name = $request->name;
		$modelname->category_id = $request->category_id;
		$modelname->specs = $request->specs;

		if($request->image != null){
			$request->image->move(public_path('/images'), str_replace(' ', '_', $request->image->getClientOriginalName()));
			$modelname->image = '/images/'.str_replace(' ', '_', $request->image->getClientOriginalName());
		} 
		
		$modelname->save();

		Session::flash('status', 'Successfully updated '.$modelname->name.'.');
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
		//
	}
}
