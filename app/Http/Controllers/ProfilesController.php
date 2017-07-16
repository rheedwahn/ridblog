<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Session;

use User;

use Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.edit')->with('user', Auth::user());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'youtube' => 'required|url',
            'avater' => 'image',
            'about' => 'required',
            ]);

        $user = Auth::user();

        /*if the user uploads an image*/
        if($request->hasFile('avater'))
        {
            $avater = $request->avater;

            $avater_new_name = time() . $avater->getClientOriginalName();

            $avater->move('uploads/profile', $avater_new_name);

            $user->profile->avater = 'uploads/profile/' . $avater_new_name;

            $user->profile->save();
        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->profile->about = $request->about;

        $user->profile->facebook = $request->facebook;

        $user->profile->youtube = $request->youtube;

        $user->save();

        $user->profile->save();

        if($request->has('password'))
        {
            $user->password = $request->password;

            $user->save();
        }

        Session::flash('success', 'Your Profile has been updated successfully');

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
