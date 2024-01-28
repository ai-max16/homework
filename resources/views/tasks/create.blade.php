@extends('layouts.app')

@section('title', '新しくToDoを作成する')

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

<form action="{{ route('tasks.store') }}" method="post">
  @csrf
  <div class="form-group mb-3">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
  </div>
  <div class="form-group mb-3">
    <label for="category">カテゴリー</label>
    <select class="form-control" name="category_id" required>
      <option value="" disabled selected>選択してください</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="category">優先度</label>
    <select class="form-control" name="priority" required>
      <option value="" disabled selected>選択してください</option>
      <option value="高">高</option>
      <option value="中">中</option>
      <option value="低">低</option>
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="category">いつまでに</label>
    <input type="datetime-local" class="form-control" name="deadline" required>
  </div>
  <button type="submit" class="btn btn-outline-primary">追加</button>
</form>
@endsection