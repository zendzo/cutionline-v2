<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cuti;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function index()
    {
    	$page_title = "Halaman utama";

        $user = User::all();

        $cuti = Cuti::all();

        $berjalan = Cuti::where('cuti_status_id',2)->get();

        $ditolak = Cuti::where('cuti_status_id',3)->get();

    	return view('admin.home',compact(['page_title','user','cuti','berjalan','ditolak']));  
    }

    public function pegawaiIndex()
    {
    	$page_title = "Daftar Pegawai";

    	return view('pegawai.index',compact('page_title'));
    }
}
