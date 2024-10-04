@extends('layouts.frame')

@section('title', '管理画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/addmin/style.css') }}">
@endsection
@section('contents')
<div class="introduction-wrapper">
    <h1 class="introduction">@yield('introductionTitle')</h1>
</div>
<div class="transitions">
    @yield("items")
</div>
@endsection