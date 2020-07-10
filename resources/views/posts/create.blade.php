@extends('layouts.app')
@section('content')
<div class="row">
    <div class="container col-sm-6">
        <h1>Create New Post</h1>
        <form action="/posts" method="POST">
         @csrf
         <div class="form-group">
             <label for="title">Title</label>
             <input class="form-control" type="text" name="title" id="title">
             <label for="description">Description</label>
             <input class="form-control" type="text" name="description" id="description">
             <label for="publish_at">Publish At</label>
             <input class="form-control" type="datetime-local" name="publish_at" id="publish_at">
             <input class="btn btn-default btn-outline-success mt-3" type="submit" value="Add post">
         </div>
        </form>
    </div>
</div> 
@endsection