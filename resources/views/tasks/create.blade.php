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
  <a href="{{ route('tasks.index') }}" class="text-decoration-none">&lt; 戻る</a>
</div>

<form action="{{ route('tasks.store') }}" method="post">
  @csrf
  <div class="form-group mb-3">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
  </div>
  <button type="submit" class="btn btn-outline-primary">追加</button>
</form>
@endsection