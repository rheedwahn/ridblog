<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Post;

use App\Tag;

use Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        if($tags->count() == 0)
        {
            Session::flash('info', 'You have no tags, please proceed to creating one');

            return redirect()->route('tag.create');
        }

        return view('admin.tags.index')->with('tag', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => 'required|max:200|unique:tags',
            ]);
       
       Tag::create([
        'tag' => $request->tag,
        'slug' => str_slug($request->tag),
        ]);

        Session::flash('success', 'Your Tag has been saved successfully');

        return redirect()->route('tags');
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
        $tags = Tag::find($id);

        return view('admin.tags.edit')->with('tag', $tags);
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
            'tag' => 'required|max:200|unique:tags',
            ]);

        $tags = Tag::find($id);

        $tags->tag = $request->tag;

        $tags->save();

        Session::flash('success', 'Your Tags has been updated successfully');

        return redirect()->route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::find($id);

        $tags->delete();

        Session::flash('success', 'Your Tag has been deleted');

        return redirect()->back();
    }
}
