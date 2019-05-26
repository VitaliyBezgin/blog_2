<?php

namespace App\Http\Controllers;

use App\Post;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'subject'   => 'required|min:3',
            'message'   => 'required|min:10'
        ]);

        $data = [
          'email' => $request->email,
          'subject' => $request->subject,
          'bodyMessage' => $request->message
            //Нельзя называть переменную message !
        ];

//        Mail::queue();
            Mail::send('emails.contact', $data, function($messageToUser) use ($data){
                $messageToUser->from($data['email']);
                $messageToUser->to('bezgin96@ukr.net');
                $messageToUser->subject($data['subject']);
            });
        return redirect('/')->with('success', 'Your message was successfully sent');
    }

    public function getAbout()
    {
        return view('pages.about');
    }

}
