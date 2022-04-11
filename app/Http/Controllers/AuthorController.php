<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAuthor;
use App\Models\Author;
use App\Models\Profile;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class AuthorController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors= Author::all();
        $authors->load('profile');
        return view('author.index', ['authors'=>$authors]); //BlogPost::orderBy('created_at', 'desc')->take(5)->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create',['author',null]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthor $request)
    {
        $validate = $request;//->validate();
        $author = new Author();
        $author->name = $request['name'];
        $author->save();

        $profile = new Profile();
        $profile->email= $request['authorEmail'];
        //$profile->authorId=
        $author->profile()->save($profile);
        //$author->save();

        Debugbar::info($profile);
        $request->session()->flash('status', 'Author' . $author->name . 'was created!');
        $authors= Author::all();
        $authors->load('profile');
        return redirect()->route('author.index', ['authors'=>$authors]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('author.show', ['author'=>Author::find($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('author.edit', ['author'=>Author::find($id)->load('profile')]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAuthor $request, $id)
    {
        $author = Author::findorFail($id)->load('profile');
        $author = Author::with('profile')->whereKey($id)->first();
        Debugbar::info($author);
        $validated = $request->validated();
        $author->fill($validated);
        $author->profile->email= $request['authorEmail'];
        //$author->name = $request['authorName'];
        $author->profile->save();
        $author->save();

        $request->session()->flash('status', 'Author was Updated!');
        return redirect()->route('author.show',['author'=> $author->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id)->load('profile');;
        //$author = Author::with('profile')->where('id', $id)->first();
        $author->profile()->delete();
        $author->delete();
        session()->flash('status','$author With the ID' .$id . 'was deleted!');
        return redirect()->route('author.index');
    }
}
