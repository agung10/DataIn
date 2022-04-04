<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Models\MaritalStatus;
use Illuminate\Http\Request;

class MaritalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['marital_statuses'] = MaritalStatus::orderBy('id', 'DESC')->get();

        return view('application.v_status.indexMarital', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'w_status' => 'required',
        ]);

        $data = new MaritalStatus();
        $data->w_status = ucfirst($request->input('w_status'));

        $data->save();

        return redirect()->route("status_pernikahan.index")->with("alertStore", "Status {$data->w_status}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = MaritalStatus::find($id);
        $data->w_status = ucfirst($request->input('w_status'));

        $data->save();

        return redirect()->route("status_pernikahan.index")->with("alertUpdate", "Status {$data->w_status}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MaritalStatus::find($id);
        $w_status = $data->w_status;

        $data->delete();

        return redirect()->route("status_pernikahan.index")->with("alertDestroy", "Status {$w_status}");
    }

    public function getDataEdit($id)
    {
        $data = MaritalStatus::find($id);
        return response()->json($data);

        // echo json_encode($data); native
    }
}
