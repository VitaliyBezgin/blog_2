<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
        if(is_numeric($slug))
        {
            $post = Post::find($slug);

            return Redirect::to(route('single', $post->slug), 301);
        }else{
            $post = Post::whereSlug($slug)->first();
            $tags = Tag::all();
            $tagEmpty = [];
            foreach ($tags as $tag){
                $tagEmpty[$tag->id] = $tag->tag_name;
            }
            return view('pages.singlePage')->withPost($post)->withTags($tagEmpty);
        }
    }
}
