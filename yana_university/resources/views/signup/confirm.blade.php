@extends('layouts.frame')

@section('title', 'ログインページ')


@section("style")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection
@section('form')
<form id="form" action="{{ route('signup.execution') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="login-table">
        <div class="row-item">
            <div class="column-item1">
                名前
            </div>
            <div class="column-item2">
                <input type="text" name="name" value="{{ $name }}" >
            </div>
            @if (!empty($errors->has('name')))
                <div class="column-item3">
                    <span class="error-message">{{ $errors->first('name') }}</span>
                </div>
            @endif
        </div>
        <div class="row-item">
            <div class="column-item1">
                メールアドレス
            </div>
            <div class="column-item2">
                <input type="mail" name="email" value="{{ $email }}" >
            </div>
            @if ($errors->has('email'))
                <div class="column-item3">
                    <span class="error-message">{{ $errors->first('email') }}</span>
                </div>
            @endif
        </div>
        <div class="row-item">
            <div class="column-item1">
                パスワード
            </div>
            <div class="column-item2">
                <input type="password" name="password" value="{{ $password }}">
            </div>
            @if (!empty($errors->has('password')))
                <div class="column-item3">
                    <span class="error-message">{{ $errors->first('password') }}</span>
                </div>
            @endif
        </div>
        <div class="row-item">
            <div class="column1">
                <label>アカウント画像</labnel>
            </div>
            <div class="column2">
                <img src="{{$profile_image}}" width=100 height=100>
            </div>
        </div>
        <div class="row-item">
            <div class="column1">
                <input type="submit" value="完了画面に進む">
            </div>
            <div class="column2">
                <button id="backsign" type="button">戻る</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section("script")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/signup/main.js') }}"></script>
@endscript