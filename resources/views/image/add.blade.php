<style>

   .image {
       width: 300px;
       height: 300px;
   } 

   .upload-wrapper {
       display: flex;
       justify-content: space-around;
   }


   label {
       font-weight: bold;
       font-size: 1.5em;
   }

   @media (max-width: 650px) {
       .wrapper {
           flex-flow: column;
       }
   }

</style>

@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <p class="alert alert-danger">{{$errors->first()}}</p> 
    @endif
    <div class="upload-wrapper">
        <img class="image" style="border-radius: 50%" src="storage/images/{{$image ?? ''}}" alt='profile-pic'>
        <form action="/image" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="height: 50vh" class="form-group d-flex flex-column justify-content-around">
                <label for="image">Upload Image</label>
                <input class="form-control" type="file" name="image_src" id="image_src">
                <input class="btn btn-outline-success" type="submit" value="Upload">
            </div>
        </form>
    </div>
@endsection