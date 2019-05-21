@extends('main')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1 class="light_text">All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{route('posts.create')}}" class="btn btn-success btn-h1">New post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-light">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Body</th>
                <th>Created at</th>
                </thead>
                @include('partials._messages')
                <tbody>
                    @foreach($posts as $post)
                        <tr class="postLine">
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{substr($post->body, 0, 50)}} {{strlen($post->body) > 150 ? "...":""}}</td>
                            <td>{{date('M j, Y H:i', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="{{route('posts.show', [$post->id])}}" class="btn btn-primary">View</a>
                                <a href="{{route('posts.edit', [$post->id])}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
@endsection