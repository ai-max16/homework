@extends('layouts.app')

@section('title', 'ToDoリスト一覧')

@section('content')

@if (session('flash_message'))
<p class="text-success">{{ session('flash_message') }}</p>
@endif

<div class="mb-2">
  <a href="{{ route('tasks.create') }}" class="text-decoration-none fs-4">▶︎新しくToDoを作成する</a>
</div>

<div class="row mt-3 mb-3">
  <!-- ToDoの状態絞り込みフォーム -->
  <div class="col-md-3 mb-3">
    <form action="{{ route('tasks.index') }}" method="get">
      <label for="status" class="form-label">ToDoの状態</label>
      <select class="form-select" name="status" id="status" onchange="this.form.submit()">
        @if(request('status') == 'all')
        <option value="all" selected>すべて</option>
        @else
        <option value="all">すべて</option>
        @endif

        @if(request('status') == 'completed')
        <option value="completed" selected>完了</option>
        @else
        <option value="completed">完了</option>
        @endif

        @if(request('status') == 'incomplete')
        <option value="incomplete" selected>未完了</option>
        @else
        <option value="incomplete">未完了</option>
        @endif
      </select>
    </form>
  </div>

  <!-- ToDo検索フォーム -->
  <div class="col-md-5 mb-3">
    <form action="{{ route('tasks.index') }}" method="get">
      <label for="search" class="form-label">ToDoを検索</label>
      <div class="input-group">
        <input type="text" class="form-control" name="search" id="search" value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">検索</button>
      </div>
    </form>
  </div>
</div>

<!-- ユーザーごとのタスク表示 -->
@foreach(auth()->user()->tasks as $task)
@if (request('status') == 'all' || (request('status') == 'completed' && $task->completed) || (request('status') == 'incomplete' && !$task->completed))
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
    <div>
      <p class="badge text-bg-light fs-6 mt-3">優先度：{{ $task->priority }}</p>
      <p class="badge text-bg-light fs-6 ms-4">いつまでに：{{ $task->deadline }}</p>
    </div>
    <div class="d-flex">
      <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-primary d-block me-1">編集</a>
      <form action="{{ route('tasks.destroy', $task) }}" method="post" onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">削除</button>
      </form>
    </div>
  </div>
</div>

@endif
@endforeach

@endsection