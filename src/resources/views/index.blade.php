
@extends('layouts.app')

@section('title')
<h1>TASK LIST TEMPLATE</h1>
@endsection

@section('content')
<div>
    @if(count($tasks))
     @foreach($tasks as $task)
        <a href="{{ route('tasks.show', ['id' => $task->id] ) }}">{{$task->title}}</a>
     @endforeach
       
    @else
       <div>There are no tasks</div>
    @endif

</div>

<button type="button" class="btn btn-primary">Primary</button>

@endsection