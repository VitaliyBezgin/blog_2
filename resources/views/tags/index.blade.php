@extends('main')

@section('title', '| All Tags')

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-8 text-light">
                <h2> Tags</h2>
                <table class="table text-light">
                    <thead>
                    <tr class="tr">
                        <th>#</th>
                        <th>Tag name</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th>{{$tag->id}}</th>
                            <td><a href="{{route('tags.show', $tag->id)}}" class="btn btn-link">{{$tag->tag_name}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 text-light mt-3">
                <div class="alert alert-secondary">
                    {!! Form::open(['method' => 'POST','route' => ['tags.store'], 'data-parsley-validate'])!!}
                    <h3>New tag</h3>
                    <div class="form-group">
                        <label for="name">Tag name</label>
                        <input type="text" id="name" name="tag_name" class="form-control" placeholder="Tag name:" required value="{{old('name')}}">
                    </div>
                    <input type="submit" value="Create" class="btn btn-info">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection