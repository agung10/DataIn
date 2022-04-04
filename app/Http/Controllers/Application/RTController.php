<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Models\RT;
use Illuminate\Http\Request;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rts'] = RT::orderBy('id', 'DESC')->get();

        return view('application.v_rt.index', $data);
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
            'number' => 'required',
        ]);

        $data = new RT();
        $data->number = $request->input('number');

        $data->save();

        return redirect()->route("rukun_tetangga.index")->with("alertStore", "RT {$data->number}");
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
        $data = RT::find($id);
        $data->number = $request->input('number');

        $data->save();

        return redirect()->route("rukun_tetangga.index")->with("alertUpdate", "RT {$data->number}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RT::find($id);
        $number = $data->number;

        $data->delete();

        return redirect()->route("rukun_tetangga.index")->with("alertDestroy", "RT {$number}");
    }

    public function getDataEdit($id)
    {
        $data = RT::find($id);
        return response()->json($data);

        // echo json_encode($data); native;
    }
}
