@extends('layouts.app')

@section('title','EDIT TASK ')

@section('content')

<div class="d-flex flex-column  justify-content-center align-items-center mt-5">
  <h2 class="text-primary">{{ __('messages.edit_task') }}</h2>
{{-- html forms can only have post or get method here --}}
<form class="row shadow-lg rounded p-3" method="POST" action="{{route('tasks.update',['id' => $task->id])}}">
    @csrf
    {{-- so we need to add this put to indicate we are editing --}}
    @method('PUT')
  <div class="mb-3 col-12">
    <label for="title" class="form-label text-primary">{{ __('messages.task_title') }}</label>
    <input type="text" name="title" id="title" value="{{$task->title}}" class="form-control">

    @error('title')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3 col-12">
  <label for="description" class="form-label text-primary">{{ __('messages.task_description') }}</label>
  <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 100px">
    {{$task->description}}
  </textarea>

    @error('description')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3 col-12">
  <label for="long_description" class="form-label text-primary">{{ __('messages.task_long_description') }}</label>
  <textarea class="form-control" placeholder="Leave a comment here" id="long_description" name="long_description" style="height: 150px">
    {{$task->long_description}}
  </textarea>

    @error('long_description')
    <p class="alert alert-danger mt-1">{{$message}}</p>
    @enderror
  </div>


<!-- Hidden input ensures you get completed=0 if checkbox is not checked -->
<input type="hidden" name="completed" value="0">
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
    <label class="form-check-label text-primary" for="completed">{{ __('messages.completed') }}</label>
</div>

<div class="d-flex justify-content-center mt-3">
  <button type="submit" class="btn btn-primary col-3">{{ __('messages.save_edit') }}</button>
</div>
</form>
  <a class="btn btn-primary mt-5" href="{{route("tasks.index")}}"><i class="bi bi-arrow-left"></i> {{ __('messages.back_to_index') }}</a>
</div>
@endsection
