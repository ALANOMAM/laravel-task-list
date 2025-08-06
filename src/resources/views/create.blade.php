@extends('layouts.app')

@section('title','ADD TASK ')


@section('content')
<div class="d-flex flex-column justify-content-center align-items-center mt-5">
  <h2 class="text-primary">{{ __('messages.create_task') }}</h2>
<form class="row shadow-lg rounded p-3" method="POST" action="{{route('tasks.store')}}">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label text-primary">{{ __('messages.task_title') }}</label>
    <input type="text" name="title" id="title"  value="{{old('title')}}" class="form-control">

    @error('title')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">
  <label for="description" class="form-label text-primary">{{ __('messages.task_description') }}</label>
  <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 100px">
    {{old('description')}}
  </textarea>

    @error('description')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">
  <label for="long_description" class=" form-label text-primary">{{ __('messages.task_long_description') }}</label>
  <textarea class="form-control" placeholder="Leave a comment here" id="long_description" name="long_description" style="height: 100px">
    {{old('long_description')}}
  </textarea>

    @error('long_description')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="d-flex justify-content-center">
 <button type="submit" class="btn btn-primary col-3">{{ __('messages.add_task') }}</button>
  </div>


</form>

  <a class="btn btn-primary mt-5" href="{{route("tasks.index")}}"><i class="bi bi-arrow-left"></i>{{ __('messages.back_to_index') }}</a>
</div>

@endsection