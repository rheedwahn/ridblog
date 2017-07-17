<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Category;

use App\User;

use App\Tag;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin === TRUE)
        {
            return view('home')->with('user_count', User::where('admin', 0)->get()->count())
                           ->with('admin_count', User::where('admin', TRUE)->get()->count())
                           ->with('category_count', Category::all()->count())
                           ->with('post_count', Post::all()->count())
                           ->with('trashed_count', Post::onlyTrashed()->get()->count())
                           ->with('tag_count', Tag::all()->count());

        }else
        {
            return view('home')->with('category_count', Category::all()->count())
                           ->with('post_count', Post::where('user_id', Auth::user()->id)->count())
                           ->with('trashed_count', Post::onlyTrashed()->where('user_id', Auth::user()->id)->get()->count())
                           ->with('tag_count', Tag::all()->count());

        }
        
    }
}
