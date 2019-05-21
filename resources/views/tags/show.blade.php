@extends('main')

@section('title', "$tag->tag_name Tag")

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 text-white m-4">
                <h4>{{ucfirst($tag->tag_name)}} tag <small> {{ $tag->posts()->count()}} posts</small></h4>
            </div>
            <div class="col-md-2">
                <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary btn-block m-4">Edit</a>
            </div>
            <div class="col-md-2">
                {{Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE'])}}
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
                        @foreach($tag->posts as $post)
                            <tr>
                                <th>{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        <span class="bg-secondary p-1">#{{$tag->tag_name}}</span>
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
