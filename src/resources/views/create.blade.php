@extends('layouts.app')

@section('title','ADD TASK ')

@section('content')
<form class="col-6" method="POST" action="{{route('tasks.store')}}">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" class="form-control">

    @error('title')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="form-floating mb-3">
  <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 100px"></textarea>
  <label for="description">Description</label>

    @error('description')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="form-floating mb-3">
  <textarea class="form-control" placeholder="Leave a comment here" id="long_description" name="long_description" style="height: 100px"></textarea>
  <label for="long_description">Long description</label>

    @error('long_description')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Add task</button>
</form>

@endsection