@extends('main')

@section('title', "$categories->category_name Tag")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 text-white m-4">
                <h4>{{ucfirst($categories->category_name)}} Category <small> {{ $categories->posts()->count()}} posts</small></h4>
            </div>
            <div class="col-md-2">
                <a href="{{route('tags.edit', $categories->id)}}" class="btn btn-primary btn-block m-4">Edit</a>
            </div>
            <div class="col-md-2">
                {{Form::open(['route' => ['tags.destroy', $categories->id], 'method' => 'DELETE'])}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block mt-4'])}}
                {{Form::close()}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table text-white">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories->posts as $category)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>
                                @foreach($post->categories as $category)
                                    <span class="bg-secondary p-1">#{{$tag->category_name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

