<?php

namespace App\Http\Controllers;

use App\User;
use App\Status;
use App\AssetUser;
use App\Asset;
use App\Modelname;
use Illuminate\Http\Request;
use Auth;
use Session;

class AssetUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::has('assets')->get();
        $statuses = Status::all();
        $userreqs = AssetUser::where('status_id', 3)->orWhere('status_id', 4)->get();
        $assets = Asset::all();
        $modelnames = Modelname::all();

        return view('requests.index', compact('users', 'statuses', 'userreqs', 'assets', 'modelnames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        function reqNum() {
            $randomNum = array();
            while(count($randomNum) != 6) {
                $randomNum[] = rand(0, 9);
                $randomNum = array_unique($randomNum);
            }
            return $randomNum = implode('', $randomNum);
        }

        // $user = Auth::user();
        //status is set to pending
        // $user->assets()->attach($request->modelname_id, ['req_num' => 'REQ'.reqNum(), 'status_id' => 1]);

        $userreq = new AssetUser;
        $userreq->req_num = 'REQ'.reqNum();
        $userreq->user_id = Auth::user()->id;
        $userreq->modelname_id = $request->modelname_id;
        // $userreq->asset_id = null;
        $userreq->status_id = 3;
        $userreq->save();

        Session::flash('status', 'Ticket '.$userreq->req_num.' has been submitted and is awaiting approval.');
        Session::flash('alert-type', 'alert-success');

        return redirect('assets');
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
        // dd($request);
        if($request->asset_id == "Select an asset") {
            Session::flash('status', 'You must select an asset.');
            Session::flash('alert-type', 'alert-danger');
        } else {
            if($request->req_action == 'cancelled') {
                $userreq = AssetUser::find($id);
                $userreq->status_id = 6; // cancelled
                $userreq->save();

                Session::flash('status', $userreq->req_num.' has been cancelled.');
                Session::flash('alert-type', 'alert-warning');
            } elseif($request->req_action == 'returned') {
                $asset = Asset::find($request->asset_id);
                $asset->status_id = 1; // available
                $asset->save();

                $userreq = AssetUser::find($id);
                $userreq->asset_id = $request->asset_id;
                $userreq->status_id = 5; // completed
                $userreq->save();

                Session::flash('status', $userreq->req_num.' has been completed.');
                Session::flash('alert-type', 'alert-success');

            } else {
                $asset = Asset::find($request->asset_id);
                $asset->status_id = 2; // not available
                $asset->save();

                $userreq = AssetUser::find($id);
                $userreq->asset_id = $request->asset_id;
                $userreq->status_id = 4; // pending return
                $userreq->save();

                Session::flash('status', $userreq->req_num.' has been approved.');
                Session::flash('alert-type', 'alert-success');
            }
        }

        return redirect('/requests');
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
