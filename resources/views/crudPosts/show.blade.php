@extends('main')

@section('title', 'View Post')

@section('content')
    @include('partials._messages')
    <div class="row">
        <div class="col-md-8">
            <h1> {{$post->title}}</h1>
            <p class="lead">{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="alert alert-info m-2">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{date('M j, Y H:i',strtotime($post->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{date('M j, Y H:i',strtotime($post->created_at))}}</dd>
                </dl>
                <hr>

                <div class="row">
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
