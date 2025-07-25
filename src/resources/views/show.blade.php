
@extends('layouts.app')


@section('title')
<h1>SINGLE TASK PAGE</h1>
@endsection

@section('content')
<p>{{$task->title}}</p>

<p>{{$task->description}}</p>

@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif
@endsection
