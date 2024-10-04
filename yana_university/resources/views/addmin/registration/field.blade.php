@extends('layouts.frame')

@section('title', '分野登録画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection

@section('form')
<form id="form" action="{{ route('addmin.registration.field.execution') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row-item">
        <div class="column_1">
            <label for="lecture-id">講義選択</label>
        </div>
        <div class="column_2">
            <select name="lecture_id" id="lecture-id">
                    @foreach ($lectures as $lecture)
                        <option value="{{ $lecture->id }}">{{ $lecture->name }}</div>
                    @endforeach
            </select>        
        </div>
    </div>
    <div class="row-item">
        <div class="column_1">
            <label for="name">分野名</label>
        </div>
        <div class="column_2">
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        @if ($errors->has('name'))
            <div class="column_3">
                <span class="error-message">{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column_1">
            <label for="url">url</label>
        </div>
        <div class="column_2">
            <input type="text" id="url" name="url">
        </div>
    </div>
    <div class="button_wrapper">
        <input type="submit" value="登録">
        <button class="back" type="button">戻る</button>
    </div>
</form>
@endsection