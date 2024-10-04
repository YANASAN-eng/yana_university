@extends('layouts.commonPortal')

@section('title', '章管理画面')

@section('items')
<div class="item">
    <a href="{{ route('addmin.inspection.chapter') }}">章一覧</a>
</div>
<div class="item">
    <a href="{{ route('addmin.registration.chapter') }}">章登録</a>
</div>
@endsection