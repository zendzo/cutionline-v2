<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

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

        return view('/home')
        ->with('message', 'Selamat datang kembali!')
        ->with('status','success')
        ->with('type','success');
    }
}
