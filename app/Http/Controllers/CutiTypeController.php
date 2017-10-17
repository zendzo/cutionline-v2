<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CutiType;

class CutiTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar Jenis Cuti";

        $cutiType = CutiType::all();

        return view('cuti-type.index',compact(['page_title','cutiType']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah Jenis Type";

        return view('cuti-type.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $type = CutiType::create($input);

        return redirect()->route('admin.cuti-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuti_types  $cuti_types
     * @return \Illuminate\Http\Response
     */
    public function show(CutiType $cuti_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuti_types  $cuti_types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Type Cuti";

        $cutiType = CutiType::findOrFail($id);

        return view('cuti-type.edit',compact(['page_title','cutiType']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuti_types  $cuti_types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $cutiType = CutiType::findOrFail($id);

        $cutiType->type = $input['type'];

        $cutiType->update();

        return redirect()->route('admin.cuti-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuti_types  $cuti_types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = CutiType::findOrFail($id);

        $cuti->delete();

        return redirect()->route('admin.cuti-type.index');   
        
    }
}
