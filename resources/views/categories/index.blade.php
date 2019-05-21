@extends('main')

@section('title', '| All Categories')

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-8 text-light">
                <h2> Categories</h2>
                <table class="table text-light">
                    <thead>
                        <tr class="tr">
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{$category->id}}</th>
                            <td><a href="{!! route('categoryArticles', $category->category_name) !!}">{{$category->category_name}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 text-light mt-3">
                <div class="alert alert-secondary">
                    {!! Form::open(['method' => 'POST','route' => ['category.store'], 'data-parsley-validate'])!!}
                        <h3>New category</h3>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Category name:" required value="{{old('name')}}">
                    </div>
                    <input type="submit" value="Create" class="btn btn-info">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection