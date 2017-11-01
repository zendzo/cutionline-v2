<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Cuti;
use App\CutiRecord;

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

        $page_title = "Data Cuti ".Auth::user()->fullName();

        $cuti_records = CutiRecord::where('user_id',Auth::id())->get();

        return view('/home',compact(['cuti_records','page_title']))
        ->with('message', 'Selamat Datang Kembali!')
        ->with('status','success')
        ->with('type','success');
    }
}
