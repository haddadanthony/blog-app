@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 m-auto card">
                <div class="card-body">
                    <h2 class="card-title" style="text-transform: uppercase;">{{$post->title}}</h2>
                    <p class="card-text">{{$post->description}}</p>
                    <form class="d-inline-block" action="{{route('post.delete', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">Delete</button>
                    </form>
                    <a href={{route('post.edit', $post->id)}} class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection