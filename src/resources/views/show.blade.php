
@extends('layouts.app')


@section('title','SINGLE TASK PAGE')


@section('content')

<div class="d-flex flex-column justify-content-center align-items-center mt-5  ">

<div class="card {{ $task->completed ? 'text-bg-success' : 'text-bg-secondary' }} mb-3 shadow-lg " style="max-width: 50%;">
  <div class="card-header">{{ $task->title }}</div>
  <div class="card-body">
    <h5 class="card-title">{{ $task->description }}</h5>
    @if($task->long_description)
      <p>{{ $task->long_description }}</p>
    @endif
  </div>
</div>

<a class="btn btn-primary" href="{{route("tasks.index")}}"> <i class="bi bi-arrow-left"></i>{{ __('messages.back_to_index') }}</a>

</div>



@endsection
