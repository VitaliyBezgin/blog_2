@extends('main')

@section('title', 'Create New Post')

@section('stylesheets')
    <link rel="stylesheet" href="{!! asset('css/parsley.css') !!}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Create New Post</h2>
            @include('crudPosts.errors')
            <hr>
            {!! Form::open(['method' => 'POST','route' => ['posts.store'], 'data-parsley-validate'])!!}
                <div class="form-group">
                    <input type="text" id="title" class="form-control" name="title" placeholder="Title" required value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control" value="{{old('title')}}" required placeholder="Post body..."></textarea>
                </div>
            <input type="submit" value="Create" class="btn btn-dark btn-outline-info">
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection