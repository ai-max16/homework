@extends('layouts.app')

@section('title', 'ToDoリスト一覧')

@section('content')

@if (session('flash_message'))
<p class="text-success">{{ session('flash_message') }}</p>
@endif

<div class="mb-2">
  <a href="{{ route('tasks.create') }}" class="text-decoration-none">新しくToDoを作成する</a>
</div>

@foreach($tasks as $task)
<div class="card mb-3">
  <div class="card-body">
    <div class="d-flex align-items-center">
      @if ($task->completed)
      <span class="badge bg-success me-2">完了</span>
      @else
      <span class="badge bg-warning me-2">未完了</span>
      @endif
      <h2 class="card-title fs-3">{{ $task->title }}</h2>
    </div>
    <div class="d-flex">
      <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-primary d-block me-1">編集</a>
      <form action="{{ route('tasks.destroy', $task) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">削除</button>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection