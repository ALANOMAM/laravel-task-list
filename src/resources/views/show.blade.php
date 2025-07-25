
@extends('layouts.app')


@section('title','SINGLE TASK PAGE')


@section('content')
<p>{{$task->title}}</p>

<p>{{$task->description}}</p>

@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif
@endsection
