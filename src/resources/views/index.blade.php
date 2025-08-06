
@extends('layouts.app')

@section('title', 'TASK LIST PAGE')

@section('content')


<div class="table-responsive d-flex justify-content-center">
<table class="table w-75 mt-5">
  <thead>
    <tr class="table-primary text-center">
      <th scope="col" hidden>id</th>
      <th scope="col" style="width: 10%;">{{ __('messages.task_title') }}</th>
      <th scope="col" style="width: 25%;">{{ __('messages.task_description') }}</th>
      <th scope="col" style="width: 5%;">{{ __('messages.completed') }}</th>
      <th scope="col" style="width: 30%;"><a class="" href="{{ route('tasks.create') }}"><i class="bi bi-plus-circle-fill"></i></a>  </th>
    </tr>
  </thead>
  <tbody>
    @if(count($tasks))
     @foreach($tasks as $task)
     <tr class="text-center">
      <th scope="row" hidden>{{$task->id}}</th>
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td>
      @if($task->completed)
          <i class="bi bi-patch-check-fill text-primary"></i>
      @endif
      </td>
      <td>
        <a class="btn btn-primary" href="{{ route('tasks.show', ['id' => $task->id] ) }}">{{ __('messages.show') }}</a>
        <a class="btn btn-warning" href="{{ route('tasks.edit', ['id' => $task->id] ) }}">{{ __('messages.edit') }}</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          {{ __('messages.delete') }}
        </button>
      </td>
    </tr>


<!-- Modal start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('messages.delete') }} <strong>{{$task->title}}</strong></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{ __('messages.confirm_task_delete') }}
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('messages.no') }}</button>

      {{-- delete div --}}
      <div>
        <form action="{{route('tasks.delete', ['id'=> $task->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">{{ __('messages.yes') }}</button>
        </form>
      </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal end -->

     @endforeach
     @endif
  </tbody>
</table>
</div>




   {{-- Pagination controls --}}
<div class="d-flex justify-content-center">
    {{ $tasks->links() }}
</div>


@endsection