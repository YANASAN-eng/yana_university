@extends('layouts.frame')

@section('title', 'コーディング作品集')

@section('contents')
<div class="contemnts">
    <ul class="contents-lists">
        <li class="contents-list">
            <a href="{{ route('programming.works.EC') }}">模擬的ECサイト</a>
        </li>
    </div>
</div>
@endsection