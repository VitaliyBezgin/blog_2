@extends('main')

@section('title', " $post->title ")


@section('content')
    <div class="container text-light">
        <div class="row">
            <div class="col-md-12">
                <p>{!! $post->title!!}</p>
                <p>{!! $post->slug!!}</p>
                <p>{!! $post->body!!}</p>
                <hr>
                <p>@foreach($post->tags as $tag)
                        <span class="btn-secondary p-1">#{{$tag->tag_name}}</span>
                    @endforeach
                </p>
                <p>Posted in : {!! $post->category->category_name!!}</p>
            </div>
        </div>
    </div>
@endsection

{{--@section('content')--}}
{{--    <div class="container text-light">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                    <p>{!! $post['title']!!}</p>--}}
{{--                    <p>{!! $post['slug']!!}</p>--}}
{{--                    <p>{!! $post['body']!!}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
