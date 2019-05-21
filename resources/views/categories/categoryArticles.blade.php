@extends('main')

@section('title', " $posts->title ")

@section('content')
    <div class="container text-light">
        <div class="row">
            <div class="col-md-12">
                <p>{!! $posts->!!}</p>
                <p>{!! $posts->slug!!}</p>
                <p>{!! $posts->body!!}</p>
                <hr>
                <p>@foreach($posts->tags as $tag)
                        <span class="btn-secondary p-1">#{{$tag->tag_name}}</span>
                    @endforeach
                </p>
                <p>Posted in : {!! $post->category->category_name!!}</p>
            </div>
        </div>
    </div>
@endsection
