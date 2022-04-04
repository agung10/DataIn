<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Models\FamilyStatus;
use Illuminate\Http\Request;

class FamilyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['family_statuses'] = FamilyStatus::orderBy('id', 'DESC')->get();

        return view('application.v_status.indexFamily', $data);
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
            'f_status' => 'required',
        ]);

        $data = new FamilyStatus();
        $data->f_status = ucfirst($request->input('f_status'));

        $data->save();

        return redirect()->route("status_keluarga.index")->with("alertStore", "Status {$data->f_status}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $data = FamilyStatus::find($id);
        $data->f_status = ucfirst($request->input('f_status'));

        $data->save();

        return redirect()->route("status_keluarga.index")->with("alertUpdate", "Status {$data->f_status}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FamilyStatus::find($id);
        $f_status = $data->f_status;

        $data->delete();

        return redirect()->route("status_keluarga.index")->with("alertDestroy", "Status {$f_status}");
    }

    public function getDataEdit($id)
    {
        $data = FamilyStatus::find($id);
        return response()->json($data);

        // echo json_encode($data); native
    }
}
