@extends('main')

@section('title', " $post->title ")


@section('content')
    <div class="container text-light">
        <div class="row">
            <div class="col-md-12">
                <p>{!! $post->title!!}</p>
                <img src="{{asset('uploadImg/'. $post->image)}}" alt="">
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
        <div class="row comments bg-dark">
            <div class="col-12">
                <h3>Комментарии к статье {{$post->comments()->count()}}</h3>
            </div>
            @include('partials.messages')
            <div class="col-md-8">
                @foreach($post->comments as $comment)
                    <div class="articles_comments col-12 m-4 bg-secondary rounded-right">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{asset('profile_images/'.Auth::user()->user_image)}}}}" alt="">
{{--                                <img src={{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email)))}} alt="" class="rounded-circle">--}}
                            </div>
                            <div class="col-8 bg-info mt-3 ">
                                <p class="col-12 mb-2 text-warning">{{auth()->user()->name}}</p>
                                <p class="col-12">{{$comment->name}}</p>
                                <p class="col-12">{{$comment->comment}}</p>
                                <p class="col-12">{{$comment->created_at}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            @include('crudPosts.errors')
            <div class="col-md-8">
                @if(Auth::check())
                {{Form::open(['route' => ['comments.store', 'method' => 'POST']])}}
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <input type="hidden" value="{{auth()->user()->name}}" name="user_name">
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="commnet" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" class="btn btn-success">
                    </div>
                {{Form::close()}}
                @endif
                @if(Auth::check() == false)
                    <p class="bg-info text-light"> Чтобы оставить сомментарий зарегистрируйтесь ! </p>
                @endif
            </div>
        </div>
    </div>
@endsection

