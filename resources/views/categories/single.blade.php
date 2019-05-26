@extends('main')

@section('title', "Cat ")

@section('content')
    <div class="container text-light">
        <div class="row">
            <div class="col-md-12">
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Body</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($category->posts as $post)
                        <tr>
                            <th><a href="{!! route('single', $post->slug) !!}">{{$post->title}}</a></th>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
