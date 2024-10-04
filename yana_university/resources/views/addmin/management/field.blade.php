@extends('layouts.commonPortal')

@section('items')
<div class="item">
    <a href="{{ route('addmin.inspection.field') }}">分野一覧</a>
</div>
<div class="item">
    <a href="{{ route('addmin.registration.field') }}">分野登録</a>
</div>
@endsection