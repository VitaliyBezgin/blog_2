@extends('main')

@section('title', 'Create New Post')

@section('stylesheets')
    <link rel="stylesheet" href="{!! asset('css/parsley.css') !!}">
@endsection

@section('content')
    <div class="row mb-4 text-white">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-light mt-3">Create New Post</h2>
            @include('crudPosts.errors')
            <hr>
            {!! Form::open(['method' => 'POST','route' => ['posts.store'], 'data-parsley-validate'])!!}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="Title" required value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" class="form-control" name="slug" placeholder="Slug" required value="{{old('slug')}}">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category_id" id="category" class="form-control custom-select">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                        @endforeach
                    </select>
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
    <script>
        $('.select2-multi').select2();
    </script>
@endsection