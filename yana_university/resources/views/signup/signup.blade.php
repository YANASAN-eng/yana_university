@extends('layouts.frame')

@section('title', 'ユーザー登録画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css')}}">
@endsection

@section('contents')
<div class="contents-title">
    <h1>アカウント登録画面</h1>
</div>
@endsection
@section('form')
<form id="form" action="{{ route('signup.config') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row-item">
        <div class="column1">
            <label for="name">名前</label>
        </div>
        <div class="column2">
            <input type="text" id="name" name="name">
        </div>
        @if ($errors->has('name'))
            <div class="column3">
                <span class="error-message">{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="email">メールアドレス</label> 
        </div>
        <div class="column2">
            <input type="email" name="email" id="email">
        </div>
        @if ($errors->has('email'))
            <div class="column3">
                <span class="error-message">{{ $errors->first('email') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="password">パスワード</labnel>
        </div>
        <div class="column2">
            <input type="password" name="password" id="password">
        </div>
        @if ($errors->has('password'))
            <div class="column3">
                <span class="error-message">{{ $errors->first('password') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="profile_image">アカウント画像</labnel>
        </div>
        <div class="column2">
            <input type="file" name="profile_image" id="profile_image">
        </div>
        @if ($errors->has('profile_image'))
            <div class="column3">
                <span class="error-message">{{ $errors->first('profile_image') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <input type="submit" value="確認画面に進む">
        </div>
        <div class="column2">
            <button class="back" type="button">戻る</button>
        </div>
    </div>
</form>
@endsection