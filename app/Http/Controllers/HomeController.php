<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Cuti;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to admin page is user is ad administrator
        if (Auth::user()->role_id === 1) {
            return redirect('/admin');
        }

        $masa_kerja = Auth::user()->masaKerja();

        if ($masa_kerja >= 1 or $masa_kerja <= 5) {
            $tahunan_max = 12;
        }

        if ($masa_kerja >= 5 or $masa_kerja <= 10) {
            $tahunan_max = 15;
        }

        if ($masa_kerja >= 10) {
            $tahunan_max = 18;
        }

        $melahirkan_max = 90;
        $haji_max = 40;
        $nikah_max = 3;

        $tahunan = Cuti::where('user_id',Auth::id())->where('cuti_type_id',1)->get();

        $melahirkan = Cuti::where('user_id',Auth::id())->where('cuti_type_id',2)->get();

        $haji = Cuti::where('user_id',Auth::id())->where('cuti_type_id',3)->get();

        $nikah = Cuti::where('user_id',Auth::id())->where('cuti_type_id',4)->get();

        return view('/home',compact([
            'tahunan_max',
            'melahirkan_max',
            'haji_max',
            'nikah_max',
            'tahunan',
            'melahirkan',
            'haji',
            'nikah'
        ]))
        ->with('message', 'Selamat Datang Kembali!')
        ->with('status','success')
        ->with('type','success');
    }
}
