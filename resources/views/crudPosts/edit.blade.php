@extends('main')

@section('title', 'Edit post')

@section('content')
    <div class="row m-3">
        @include('crudPosts.errors')
        <div class="col-md-8 text-light">
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate']) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, ["class" => 'form-control input-lg']) }}
            {{Form::label('category_id', "Category:")}}
            {{Form::select('category_id', $categories, null,  ['class' => 'form-control custom-select'])}}
            {{Form::label('tags', 'Tags:', ['class' => 'form-spacing-top'])}}
            {{Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple'])}}
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, ["class" => 'form-control']) }}
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
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <a href="{{route('posts.show', [$post->id])}}" class="btn btn-primary btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                       <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection