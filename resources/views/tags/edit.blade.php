@extends('main')

@section('title', 'Edit tag')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-white m-3">
                {{Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT'])}}
                {{Form::label('tag_name', "Title:")}}
                {{Form::text('tag_name', null, ['class' => 'form-control'])}}
                {{Form::submit('Save', ['class' => 'btn btn-success mt-2'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
