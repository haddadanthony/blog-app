@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <p class="alert alert-danger">{{$errors->first()}}</p> 
    @endif
    <div class="container">
        <div class="row">
            <form class="col-sm-8 m-auto" action={{route('post.update', $post->id)}} method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" value="{{$post->title}}" type="text" name="title" id="title">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" value="{{$post->description}}" name="description" id="description">
                    <label for="publish_at">Publish At</label>
                    <input class="form-control" type="datetime-local" value="{{$post->publish_at}}" name="publish_at" id="publish_at">
                    <input class="btn btn-default btn-outline-success mt-3" type="submit" value="Edit post">
                </div>
            </form>
        </div>
    </div>    
@endsection