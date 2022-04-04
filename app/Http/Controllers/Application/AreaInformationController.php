<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Models\AreaInformation;
use Illuminate\Http\Request;

class AreaInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['area_information'] = AreaInformation::first();

        return view('application.v_area.index', $data);
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
        abort(404);
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
    public function edit($id)
    {
        $data['area_information'] = AreaInformation::find($id)->get()->first();

        return view('application.v_area.edit', $data);
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
        $data = AreaInformation::find($id);
        $data->name = ucfirst($request->input("name"));
        $data->address_details = $request->input("address_details");
        $data->phone = $request->input("phone");
        $data->postal_code = $request->input("postal_code");
        $data->description = $request->input("description");

        $picture = $request->file('picture');

        if (!empty($picture)) {
            $rand = bin2hex(openssl_random_pseudo_bytes(50)) . "." . $picture->extension();
            $rand_md5 = md5($rand) . "." . $picture->extension();
            $data->picture = $rand_md5;

            $picture->move(public_path('template/custom/img_upload/area'), $rand_md5);
        }

        $data->save();

        return redirect()->route("informasi_wilayah.index")->with("alertUpdate", "Informasi Wilayah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort(404);
    }
}
