<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    public function getContact()
    {
        return view('pages.contact');
    }
    public function getAbout()
    {
        $first = 'Vitaliy';
        $last = 'Bezgin';
        $full = $first.$last;
        $email = 'bezgin96"ukr.net';
        $data['email'] = $email;
        $data['name'] = $full;
        return view('pages.about', ['fullname' => $full]);
//        return view('about')->withFullname($full)->withEmail($email);
//        return view('about')->withData($data);

    }
}
