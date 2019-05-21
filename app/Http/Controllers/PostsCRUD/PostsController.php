<?php

namespace App\Http\Controllers\PostsCRUD;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class PostsController extends Controller
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('crudPosts.create', ['categories' => $categories])->withTags($tags);
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
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync($request->tags, false);
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

        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category){
            $cats[$category->id] = $category->category_name;
        }
        $tags = Tag::all();
        $tagEmpty = [];
        foreach ($tags as $tag){
            $tagEmpty[$tag->id] = $tag->tag_name;
        }
        return view('crudPosts.edit')->withPost($post)->withCategories($cats)->withTags($tagEmpty);
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
        if($request->input('slug') == $post->slug )
        {
            $this->validate($request, [
                'title' => 'required|min:5|max:200',
                'body'  => 'required|'
            ]);
        }else{
            $this->validate($request, [
                'title' => 'required|min:5|max:200|unique:posts',
                'slug'  => 'required|min:5|max:200|unique:posts',
                'body'  => 'required|'
            ]);
        }
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();

//        if(isset($request->tags)){
//            $post-tags()->sync($request->tags);
//        }else{
//            $post->tags()->sync(array());
//        }

        $post->tags()->sync($request->tags, true);

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
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')->
        with('delete', 'The blog post was successfully delete!');
    }
}
