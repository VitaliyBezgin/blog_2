@extends('main')

@section('title', 'View Post')

@section('content')
    @include('partials._messages')
    <div class="row mt-3 mb-2">
        <div class="col-md-8 text-light">
            <h1> {{$post->title}}</h1>
            <h3> {{$post->slug}}</h3>
            <h4>{{$post->category->category_name}}</h4>
            <p class="lead">{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="alert alert-info m-2">
                <dl class="dl-horizontal">
                    <label>URL:</label>
                    <p>
                        <a href="{!! route('single', $post->slug) !!}">{{url($post->slug)}}</a>
                    </p>
                </dl>
                <hr>
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{$post->category->category_name}}</p>
                </dl>
                <hr>
                <dl class="dl-horizontal">
                    <label>Created at:</label>
                    <p>{{date('M j, Y H:i',strtotime($post->created_at))}}</p>
                </dl>
                <hr>
                <dl class="dl-horizontal">
                    <label>Last updated:</label>
                    <p>{{date('M j, Y H:i',strtotime($post->created_at))}}</p>
                </dl>
                <hr>
                @foreach($post->tags as $tag)
                    <span class="btn-secondary p-1">#{{$tag->tag_name}}</span>
                @endforeach

                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="{{route('posts.edit', [$post->id])}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'DELETE',
                                    'route' => ['posts.destroy', $post->id]]) !!}
                        <button onclick="return confirm('Are you sure ?')" class="btn btn-danger">
                            Delete
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
