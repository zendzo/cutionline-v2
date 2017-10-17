<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserProfile;

class UserAboutController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $profile = UserProfile::create([
            'alamat' => $input['alamat'],
            'kcp'   =>  $input['kcp'],
            'pendidikan'    =>  $input['pendidikan'],
            'user_id'   =>  Auth::id()
        ]);

        if (!$profile) {
            return redirect()->back()->withInput();
        }

        return redirect()->back();
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
        $input = $request->all();

        $userProfile = UserProfile::findOrFail($id);

        $userProfile->alamat = $input['alamat'];

        $userProfile->kcp = $input['kcp'];

        $userProfile->pendidikan = $input['pendidikan'];

        $userProfile->update();

        if (!$userProfile) {
            return redirect()->back()->withInput();
        }

        return redirect()->back();
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
}
