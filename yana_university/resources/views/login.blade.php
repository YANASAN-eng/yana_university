@extends('layouts.frame')

@section('title', 'ログインページ')

@section('form')
<div class="login-form-wrapper">
    <form id="login-form" action="{{ route('login.execution') }}" method="POST">
        @csrf
        <div id="login-table">
            <div class="row-item">
                <div class="column-item1">
                    名前
                </div>
                <div class="column-item2">
                    <input type="text" name="name" placeholder="やなさん">
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
                    <input type="mail" name="email" placeholder="example@gmail.com">
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
                    <input type="password" name="password">
                </div>
                @if (!empty($errors->has('password')))
                    <div class="column-item3">
                        <span class="error-message">{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>
            <div class="row-gap"></div>
            <div class="row-item">
                <button class="back">戻る</button>
                <input type="submit" name="login" value="ログイン">
            </div>
        </div>
    </form>
</div>
@endsection
