@extends('layouts.app')

@section('content')
@if(session()->has('msg'))
<p style="padding-left: 50px;" class="alert alert-success">{{session()->get('msg')}}</p> 
@endif
<div class="container p-5">
    <a class="btn btn-primary" href="/posts/create">Add new post</a>
    <a class="btn btn-outline-primary" href="/image">Upload Image</a>
</div>
<div class="container-fluid m-auto d-flex flex-wrap">
    @foreach($posts as $post)
        <div class="card m-5" style="width: 300px">
            <div class="card-body">
                <h2 class="card-title" style="text-transform: capitalize">{{$post->title}}</h2>
                <h6 class="card-subtitle mb-2 text-muted">{{$post->status}}</h6>
                <p class="card-text" style="font-size: 1.2em">{{$post->description}}</p>
            <a class="card-link" href={{route('post.show', $post->id)}}>Details</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection