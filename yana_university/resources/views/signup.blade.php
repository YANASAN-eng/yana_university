@extends('layouts.frame')

@section('title', 'ユーザー登録画面')

@section('contents')
<div class="contents-title">
    <h1>アカウント登録画面</h1>
</div>
@endsection
@section('form')
<form action="{{ route('signup.execution') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
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
    <div class="row">
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
    <div class="row">
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
    <div class="row">
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
    <div class="row">
        <div class="column1">
            <button class="back">戻る</button>
        </div>
        <div class="column2">
            <input type="submit" value="新規登録">
        </div>
    </div>
</form>
@endsection