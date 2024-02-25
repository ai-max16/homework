@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
  <div class="w-50">
    <h1>マイページ</h1>

    <hr>

    <div class="container">
      <div class="row">
        <div class="d-flex align-items-center">
          <a href="{{route('mypage.edit')}}">
            <p>ユーザー情報の編集</p>
          </a>
        </div>
      </div>
    </div>

    <hr>

    <div class="container">
      <div class="row">
        <div class="d-flex align-items-center">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <p>ログアウト</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

        </div>
      </div>
    </div>

    <hr>
  </div>
</div>
@endsection