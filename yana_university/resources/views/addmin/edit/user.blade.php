@extends('layouts.frame')

@section('title', 'ユーザー編集画面')

@section('form')
<form action="{{ route('addmin.edit.user.execution') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="column1">
            <label for="name">名前</label>
        </div>
        <div class="column2">
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        @if($errors->has('name'))
            <div class="column3">
                <span class="error-message">{{$errors->first('name')}}</span>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="column1">
            <label for="email">メールアドレス</label>
        </div>
        <div class="column2">
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        @if($errors->has('email'))
            <div class="column3">
                <span class="error-message">{{$errors->first('email')}}</span>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="column1">
            <label for="password">パスワード</label>
        </div>
        <div class="column2">
            <input type="password" name="password" id="password" value="">
        </div>
        @if($errors->has('password'))
            <div class="column3">
                <span class="error-message">{{$errors->first('password')}}</span>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="column1">
            <label for="profile_image">アカウント画像</label>
        </div>
        <div class="column2">
            <input type="file" name="profile_image" id="profile_image" value="{{ $user->profile_image }}">
        </div>
    </div>
    <div class="row">
        <div class="column1">
            <input type="submit" value="編集を実行">
        </div>
        <div class="column2">
            <button class="back">戻る</button>
        </div>
    </div>
</form>
@endsection