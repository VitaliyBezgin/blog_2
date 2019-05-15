@extends('main')
    @section('title', '| Homepage')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h1 class="text-light text-center m-2">Welcome to my blog !</h1>
                </div>
            </div>
        </div>
        <div class="row welcome_first_posts">
            <p class="popular_title">Popular posts</p>
            @foreach($posts as $post)
            <div class="col-md-3 postsAnimate">
                    <h3>{{$post->title }}</h3>
                    <p>{{substr($post->body, 0, 250)}} {{strlen($post->body) > 150 ? "...":""}}</p>
{{--                    <a href="{{route('pages.single', $post->id)}}" class="btn btn-info">Read more</a>--}}
            </div>
            @endforeach
        </div>
    </div>
@endsection

