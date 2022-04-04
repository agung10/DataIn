<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\User;
use App\Models\RT;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id', 'DESC')->get();
        $data['rt'] = RT::all();

        return view('application.v_pengguna.index', $data);
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
        $request->validate([
            'nameP' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'level' => 'required',
            'rt_id' => 'required',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($request->input('level') == "RT") {
            $user = User::where('level', "RT")->where('rt_id', $request->input('rt_id'))->first();
            if ($user) {
                return redirect()->back()->with("alertErrorT", "Ketua RT {$request->input('rt_id')} sudah ada");
            }
        }

        $data = new User;
        $data->name = ucfirst($request->input("nameP"));
        $data->email = $request->input("email");
        $data->level = $request->input("level");
        $data->rt_id = $request->input("rt_id");
        $data->password = Hash::make($request->input("password"));

        $data->save();

        return redirect()->route("pengguna.index")->with("alertStore", $data->name);
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
        $request->validate([
            'level' => 'required',
            'rt_id' => 'required',
        ]);
        
        $data = User::find($id);
        $data->name = ucfirst($request->input("nameP"));
        $data->email = $request->input("email");
        $data->level = $request->input("level");
        $data->rt_id = $request->input("rt_id");

        if ($request->input('level') == "RT") {
            $user = User::where('level', "RT")->where('rt_id', $request->input('rt_id'))->first();
            if ($user) {
                return redirect()->back()->with("alertErrorT", "Ketua RT $data->rt_id sudah ada");
            }
        }

        $data->save();

        return redirect()->route("pengguna.index")->with("alertUpdate", $data->name);
    }

    public function updatePW(Request $request, $id)
    {
        $request->validate([
            'passwordE' => 'required|string|min:6|same:password_confirmation',
            'password_confirmation' => 'required|string|min:6|same:passwordE'
        ]);

        $data = User::find($id);
        $data->password =  Hash::make($request->input("passwordE"));

        $data->save();

        return redirect()->route("pengguna.index")->with("alertUpdate", "Kata Sandi Baru");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $name = $data->name;
        $data->delete();

        return redirect()->route("pengguna.index")->with("alertDestroy", $name);
    }

    public function getDataEdit($id)
    {
        $data = User::find($id);
        return response()->json($data);

        // echo json_encode($data); native
    }
}
