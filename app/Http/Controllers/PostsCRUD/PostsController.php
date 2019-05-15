<?php

namespace App\Http\Controllers\PostsCRUD;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('crudPosts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crudPosts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Requests\PostRequest $request)
    {
//        $post = new Post;
//        Post::create($request->all());
        $post = new Post;
        $post->fill($request->all());
        $post->save();
       return redirect()->route('posts.show', $post->id)->
                            with('success', 'The blog post was successfully save !');
       // return redirect()->back()->with('success', 'your message here');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('crudPosts.show')->with('post', $post);
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

        return view('crudPosts.edit')->withPost($post);
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
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();

        \session()->put('update', 'This post was successfully updated !!');

        return redirect()->route('posts.show', $post->id)->
        with('update', 'The blog post was successfully update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return redirect()->route('posts.index')->
        with('delete', 'The blog post was successfully delete!');
    }
}
