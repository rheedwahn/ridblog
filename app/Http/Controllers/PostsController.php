<?php

namespace App\Http\Controllers;

use App\Category;

use App\Post;

use Auth;

use App\User;

use App\Tag;

use Session;

use File;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $post_user = Post::where('user_id', Auth::user()->id)->get();

        if(Auth::user()->admin === TRUE)
        {
            if($posts->count() === 0)
            {
                Session::flash('info', 'You currently do not have a post, please create one...');

                return redirect()->route('post.create');
            }
        }else
        {
            if($post_user->count() === 0 )
            {
                Session::flash('info', 'You currently do not have a post, please create one...');

                return redirect()->route('post.create');
            }
        }


        return view('admin.posts.index')->with('posts', $post_user)->with('post_admin', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tag = Tag::all();

        if($categories->count() === 0 || $tag->count() === 0)
        {
            if($categories->count() === 0)
            {
                Session::flash('info', 'You must have some categories attempting to create a post');

                return redirect()->route('category.create');  
            }else
            {
                Session::flash('info', 'You must have some tags before attempting to create a post');

                return redirect()->route('tag.create'); 
            }
            
        }
        
         return view('admin.posts.create')->with('categories', $categories)
                                          ->with('tag', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required', 
            'category_id' => 'required',
            'tag' => 'required',
            ]);

        /*handling uploading the image*/
        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        /*moving the image to public/uploads/post*/
        $featured->move('uploads/posts', $featured_new_name);

        /*saving the information to the db*/
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id, 
            'slug' => str_slug($request->title),
            ]);

        $post->tags()->attach($request->tag);

        Session::flash('success', 'Your post has been created successfully');

        return redirect()->route('home');

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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('posts', $post)
                                        ->with('categories', Category::all())
                                        ->with('tag', Tag::all());
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

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tag' => 'required',
            'featured' => 'image',
            ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            /*moving the image to public/uploads/post*/
            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request->title;

        $post->content = $request->content;

        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tag);

        Session::flash('success', 'Your post has been updated successfully');

        return redirect()->route('posts'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Your post has been trashed successfully...');

        return redirect()->back();
    }

    public function trash()
    {
        $post = Post::onlyTrashed()->where('user_id', Auth::user()->id)->get();

        $post_admin = Post::onlyTrashed()->get();

        $user = User::onlyTrashed()->get();

        if(Auth::user()->admin === TRUE)
        {
            if($post_admin->count() === 0)
            {
                Session::flash('info', 'Your trash is empty, you can trash a post from the all post route');

                return redirect()->route('posts');
            }
        }
        else
        {
            if($post->count() == 0 )
            {
                Session::flash('info', 'Your trash is empty, you can trash a post from the all post route');

                return redirect()->route('posts');
            }
        }

        
        return view('admin.posts.trash')->with('posts', $post)
                                        ->with('posts_admin', $post_admin)
                                        ->with('users', $user);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Your post has been restored');

        return redirect()->back();
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $path = $post->featured;

        if(File::exists($path))
        {
            unlink($path);
        }

        $post->forceDelete();

        Session::flash('success', 'Your post has been deleted permanently');

        return redirect()->back();
    }
}
