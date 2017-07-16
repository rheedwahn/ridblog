<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Profile;

use Session;

use File;

class UsersController extends Controller
{

    /*protecting this controller*/
    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = USER::all();

        return view('admin.users.index')->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avater' => 'uploads/default/admin.jpg',
            ]);

        Session::flash('success', 'The user have been created successfully');
        return redirect()->route('users');
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

    public function getTrashed()
    {
        $user = User::onlyTrashed()->get();

        if($user->count() == 0)
        {
            Session::flash('info', 'Your trash is empty, please trash a user first');

            return redirect()->route('users');
        }

        return view('admin.users.trash')->with('users', $user);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $user->restore();

        $user->posts()->restore();

        Session::flash('success', 'You have restored this user successfully');

        return redirect()->back();
    }

    public function kill($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $profile = Profile::where('user_id', $id)->first();

        $path = $user->profile->avater;

        if($user->profile->avater !== 'uploads/default/admin.jpg')
        {
            if(File::exists($path))
            {
                unlink($path);
            }
        }

        $user->forceDelete();

        $profile->forceDelete();

        $user->posts()->forceDelete();

        Session::flash('success', 'You have deleted this user successfully');

        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->posts()->delete();

        $user->delete();

        Session::flash('success', 'You have successfully trashed this user');

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        Session::flash('success', 'You have given this user an admin right');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'You have removed this user as an admin');

        return redirect()->back();
    }
}
