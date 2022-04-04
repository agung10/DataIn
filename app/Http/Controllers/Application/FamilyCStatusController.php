<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Models\FamilyCStatus;
use Illuminate\Http\Request;

class FamilyCStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['family_c_statuses'] = FamilyCStatus::orderBy('id', 'DESC')->get();

        return view('application.v_status.indexFamilyC', $data);
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
            'relationship' => 'required',
        ]);

        $data = new FamilyCStatus();
        $data->relationship = ucfirst($request->input('relationship'));

        $data->save();

        return redirect()->route("status_kartu_keluarga.index")->with("alertStore", "Status {$data->relationship}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
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
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = FamilyCStatus::find($id);
        $data->relationship = ucfirst($request->input('relationship'));

        $data->save();

        return redirect()->route("status_kartu_keluarga.index")->with("alertUpdate", "Status {$data->relationship}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FamilyCStatus::find($id);
        $relationship = $data->relationship;

        $data->delete();

        return redirect()->route("status_kartu_keluarga.index")->with("alertDestroy", "Status {$relationship}");
    }

    public function getDataEdit($id)
    {
        $data = FamilyCStatus::find($id);
        return response()->json($data);

        // echo json_encode($data); native
    }
}
