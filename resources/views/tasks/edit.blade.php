@extends('layouts.app')

@section('title', 'ToDoの編集')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="mb-2">
  <a href="{{ route('tasks.index') }}" class="text-decoration-none">&lt; 戻る</a>
</div>

<form action="{{ route('tasks.update', $task) }}" method="post">
  @csrf
  @method('patch')
  <div class="form-group mb-3">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $task->title) }}">
  </div>
  <div>
    <input type="hidden" name="completed" value="0">
    @if ($task->completed)
    <input type="checkbox" id="completed" name="completed" checked>
    @else
    <input type="checkbox" id="completed" name="completed">
    @endif
    <label for="completed">完了</label>
  </div>
  <button type="submit" class="btn btn-outline-primary">更新</button>
</form>
@endsection