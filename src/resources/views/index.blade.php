
@extends('layouts.app')

@section('title', 'TASK LIST PAGE')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Task title</th>
      <th scope="col">Task description</th>
      <th scope="col">Task long description</th>
      <th scope="col"><a class="" href="{{ route('tasks.create') }}"><i class="bi bi-plus-circle-fill"></i></a>  </th>
    </tr>
  </thead>
  <tbody>
    @if(count($tasks))
     @foreach($tasks as $task)
     <tr>
      <th scope="row">{{$task->id}}</th>
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td>{{$task->long_description}}</td>
      <td><a class="btn btn-primary" href="{{ route('tasks.show', ['id' => $task->id] ) }}">Show</a></td>
    </tr>
     @endforeach
     @endif
  </tbody>
</table>


@endsection