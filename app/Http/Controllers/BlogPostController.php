<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogposts.index', ['blogposts'=>BlogPost::withCount('comments')->get()]); //BlogPost::orderBy('created_at', 'desc')->take(5)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogposts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $validate = $request;//->validate();
       $blogpost = new BlogPost();
       $blogpost->blogPostTitle = $validate['blogPostTitle'];
        $blogpost->blogPostContent = $validate['blogPostContent'];
        $blogpost->blogPostIsHighlight = $request['blogPostIsHighlight']=='on' ?1:0;
        $blogpost->save();
        $request->session()->flash('status', 'TheBlog Post was created!');
        return redirect()->route('blogposts.show',['blogpost'=> $blogpost->id]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('blogposts.show', ['blogposts'=>BlogPost::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blogposts.edit',['blogposts'=>BlogPost::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {

        $blogpost = BlogPost::findorFail($id);
        $validated = $request->validated();
        $blogpost->fill($validated);
        $blogpost->blogPostIsHighlight = $request['blogPostIsHighlight']=='on' ?1:0;
        $blogpost->save();

        $request->session()->flash('status', 'TheBlog Post was Updated!');
        return redirect()->route('blogposts.show',['blogpost'=> $blogpost->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogpost = BlogPost::find($id);
        $this->authorize('blogposts.delete',$blogpost);
        $blogpost->delete();
        session()->flash('status','Blog Post With the ID' .$id . 'was deleted!');
        return redirect()->route('blogposts.index');
    }
}
