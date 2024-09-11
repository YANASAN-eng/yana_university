@extends('layouts.frame')

@section('title', 'プログラミング関連記事')

@section('introduction')
<div class="ihntroduction-title-wrapper">
    <h1 class="introduction-title">プログラミング関連記事</h1>
</div>
@endsection

@section('contents')
<div class="contents">
    <ul class="content-lists">
        <!-- TODO:DBとforeachを用いて後でループ処理で表示しなおす -->
        <li class="contents-list">
            <a href="{{ route('programming.works.contents') }}">作品集</a>
        </li>
    </ul>
</div>
@endsection

