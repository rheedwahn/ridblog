<?php

namespace App\Http\Controllers;

use App\Category;

Use App\Tag;

use Newsletter;

Use App\Post;

use App\Profile;

use App\Setting;

use App\User;

Use Session;

use Illuminate\Http\Request;

class FrontendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome')->with('category', Category::take(6)->get())
                              ->with('setting', Setting::first())
                              ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                              ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(2)->get())
                              ->with('first_category', Category::orderBy('created_at', 'desc')->first())
                              ->with('second_category', Category::orderBy('created_at', 'desc')->skip(1)->take(1)->first())
                              ->with('third_category', Category::orderBy('created_at', 'desc')->skip(2)->take(1)->first());
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
    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');

        $previoues_id = Post::where('id', '<', $post->id)->max('id');


        return view('single')->with('posts', $post)
                             ->with('category', Category::take(6)->get())
                             ->with('title', $post->title)
                             ->with('setting', Setting::first())
                             ->with('tag_all', Tag::all())
                             ->with('next', Post::find($next_id))
                             ->with('previous', Post::find($previoues_id));
                             
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->get();
        $title = Category::where('slug', $slug)->first();

        //dd($category->all());

        return view('category')->with('category', $category)
                               ->with('title', $title)
                               ->with('setting', Setting::first())
                               ->with('category', Category::take(6)->get())
                               ->with('tag_all', Tag::all());
    
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->get();
        $title = Tag::where('slug', $slug)->first();

        //dd($category->all());

        return view('tag')->with('tag', $tag)
                               ->with('title', $title)
                               ->with('setting', Setting::first())
                               ->with('category', Category::take(6)->get())
                               ->with('tag_all', Tag::all());
    
    }

    public function search()
    {
        //dd(request()->all());
        $search = request()->search;

        if(!$search)
        {

            return redirect()->back();

        }

        $posts = Post::where('title', 'LIKE', "%{$search}%")->get();

        return view('result')->with('posts', $posts)
                             ->with('title', 'Search Result for:' . request()->search)
                             ->with('setting', Setting::first())
                             ->with('category', Category::take(6)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            ]);

        Newsletter::subscribe($request->email);

        Session::flash('success', 'You have subscribed to our newsletter successfully');

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
