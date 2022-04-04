<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RT;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rt = Auth::user()->rt_id;
        if(Auth::user()->level != "Administrator") {
            $data['users'] = User::where('rt_id', $rt)->where('is_complete', 1)->get();
            $data['genders']   = User::select('gender')->where('rt_id', $rt)->where('is_complete', 1)->get(); // belom
            $data['educations'] = User::select('education')->where('rt_id', $rt)->where('is_complete', 1)->get(); //velom

            $data['jumlah_warga'] = User::where('rt_id', $rt)->where('is_complete', 1)->count();
            $data ['jumlah_keluarga'] = User::select('no_kk')->where('rt_id', $rt)->whereNotNull('no_kk')->groupBy('no_kk')->get();
            $data ['jumlah_kepala_keluarga'] = User::where('family_c_id', 1)->where('rt_id', $rt)->where('is_complete', 1)->count();
        } else {
            $data['users'] = User::all();
            $data['genders']   = User::select('gender')->where('is_complete', 1)->get();
            $data['educations'] = User::select('education')->where('is_complete', 1)->get();

            $data['jumlah_rt'] = RT::count();
            $data['jumlah_warga'] = User::where('is_complete', 1)->count();
            $data ['jumlah_keluarga'] = User::select('no_kk')->whereNotNull('no_kk')->groupBy('no_kk')->get();
            $data ['jumlah_kepala_keluarga'] = User::where('family_c_id', 1)->where('is_complete', 1)->count();
        }

        // Chart
        $data['rt'] = RT::all()->toArray();
        $data['rt'] = array_column($data['rt'], 'number');
        $data['rt'] = array_map(function($value)
        {
            return 'RT '.$value;
        }, $data['rt'] );
        $data['rt'] = json_encode($data['rt']);
        
        $data['warga'] = DB::table('users')->selectRaw('count(*) as total, rt_id')->where('is_complete', 1)->groupBy('rt_id')->get()->toArray();
        $data['warga'] = json_encode(array_column($data['warga'], 'total'));
        
        
        return view('home', $data);
    }
}
