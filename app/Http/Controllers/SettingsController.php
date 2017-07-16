<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use Intervention\Image\ImageManager;

use Image;

use Session;

use Auth;

use App\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function update()
    {
        //dd(request()->all());

        //$admin = Auth::user()->admin;

        $this->validate(request(), [

            'site_name' => 'required',
            'contact_email' => 'required|email',
            'contact_number' => 'required|numeric|phone',
            'address' => 'required',
            'site_logo' => 'image|required',
            ]);

        //dd(request()->all());

        $setting = Setting::first();

        /*processing and resizing the logo*/
        if(request()->hasFile('site_logo'))
        {
            $logo = request()->site_logo;

            $logo_new_name = time() . $logo->getClientOriginalName();

            $logo->move('uploads/site_uploads', $logo_new_name);

            $image = Image::make(sprintf('uploads/site_uploads/%s', $logo_new_name))->resize(200, 50)->save();

                $setting->site_logo = 'uploads/site_uploads/' . $logo_new_name;

                $setting->save();
        }

        $setting->site_name = request()->site_name;

        $setting->contact_email = request()->contact_email;

        $setting->contact_number = request()->contact_number;

        $setting->address = request()->address;

        $setting->save();

        Session::flash('success', 'The site settings has been updated');

        return redirect()->route('settings');
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
