<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\FamilyStatus;
use App\Models\FamilyCStatus;
use App\Models\MaritalStatus;
use App\Models\RT;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = Auth::user();

        return view('application.p_data_diri.index', $data);
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
        //
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
        $data['user'] = User::find($id);
        $data['family_statuses'] = FamilyStatus::all();
        $data['family_c_statuses'] = FamilyCStatus::all();
        $data['marital_statuses'] = MaritalStatus::all();
        $data['rt'] = RT::all();

        return view('application.p_data_diri.edit', $data);
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
        $request->validate([
            'marital_id' => 'required',
            'family_id' => 'required',
            'family_c_id' => 'required',
            'rt_id' => 'required',
            'nik' => 'required|min:16',
            'no_kk' => 'required|min:16',
            'fullname' => 'required|string',
            'phone_number' => 'required|max:13',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required',
            'education' => 'required',
            'religion' => 'required|string',
            'gender' => 'required',
            'detail_address' => 'required|string',
            'profession' => 'required|string',
            'house_type' => 'required',
            'disabilitas' => 'required'
        ]);

        $data = User::find($id);
        $data->marital_id = $request->input('marital_id');
        $data->family_id = $request->input('family_id');
        $data->family_c_id = $request->input('family_c_id');
        $data->rt_id = $request->input('rt_id');

        $data->no_kk = $request->input('no_kk');
        $data->nik = $request->input('nik');
        $data->fullname = $request->input('fullname');
        $data->phone_number = $request->input('phone_number');
        $data->place_of_birth = $request->input('place_of_birth');
        $data->date_of_birth = $request->input('date_of_birth');
        $data->gender = $request->input('gender');
        $data->religion = $request->input('religion');
        $data->education = $request->input('education');
        $data->detail_address = $request->input('detail_address');
        $data->house_type = $request->input('house_type');
        $data->disabilitas = $request->input('disabilitas');
        $data->profession = $request->input('profession');

        $is_complete = 0;

        if(!empty($data->nik) && !empty($data->no_kk) && !empty($data->fullname) && !empty($data->place_of_birth) && !empty($data->date_of_birth) && !empty($data->gender) && !empty($data->religion) && !empty($data->detail_address) && !empty($data->rt_id) && !empty($data->phone_number) && !empty($data->profession) && !empty($data->education) && !empty($data->family_id) && !empty($data->family_c_id) && !empty($data->marital_id) && !empty($data->house_type) && !empty($data->disabilitas)) {
            $is_complete = 1;
        }

        $data->is_complete = $is_complete;

        
        $profile = $request->file('profile');
        if (!empty($profile)) {
            $rand = bin2hex(openssl_random_pseudo_bytes(50)) . "." . $profile->extension();
            $rand_md5 = md5($rand) . "." . $profile->extension();
            $data->profile = $rand_md5;

            $profile->move(public_path('template/custom/img_upload/profile'), $rand_md5);
        }

        $data->save();

        return redirect()->route("data_diri.index")->with("alertUpdate", "Data Diri");
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

    public function print()
    {
        $data['user'] = Auth::user();

        return view('application.v_laporan.data_diri', $data);
    }
}
