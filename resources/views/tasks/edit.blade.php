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
  <a href="{{ route('tasks.index', ['status' => 'all']) }}" class="text-decoration-none">&lt; 戻る</a>
</div>

<form action="{{ route('tasks.update', $task) }}" method="post">
  @csrf
  @method('patch')
  <div class="form-group mb-3">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $task->title) }}">
  </div>
  <div class="form-group mb-3">
    <label for="category">カテゴリー</label>
    <select class="form-control" name="category_id" required>
      @foreach ($categories as $category)
      @if ($category->id == $task->category_id)
      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="category">優先度</label>
    <select class="form-control" name="priority" required>
      <option value="高" @if(old('priority', $task->priority)==='高') selected
        @endif>高</option>
      <option value="中" @if(old('priority', $task->priority)==='中') selected
        @endif>中</option>
      <option value="低" @if(old('priority', $task->priority)==='低') selected
        @endif>低</option>
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="category">いつまでに</label>
    <input type="datetime-local" class="form-control" name="deadline" value="{{ old('deadline', $task->deadline) }}">
  </div>

  <div>
    <input type="hidden" name="completed" value="0">
    <input type="checkbox" id="completed" name="completed" @if($task->completed) checked @endif value="1">
    <label for="completed">完了</label>
  </div>
  <button type="submit" class="btn btn-outline-primary">更新</button>
</form>
@endsection