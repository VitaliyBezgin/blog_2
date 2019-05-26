<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'comment'   => 'required|min:5|max:2000'
        ]);

        $comment = $request->comment;
        $post_id = (int)$request->post_id;
        $user_id = auth()->user()->id;

        $new_comment = new Comment;
        $new_comment = Comment::create([
            'post_id'    =>  $post_id,
            'user_id'    =>  $user_id,
            'comment'    =>  $comment,
        ]);

        return redirect()->back()->with('success', 'The comment was successfully added !')->
            withUser_id($user_id);

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
        $comment = Comment::find($id);
        return redirect()->back()->with('success', 'Comment was successfully add to article !');
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
        //
    }
}
