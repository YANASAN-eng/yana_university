@extends('layouts.frame')

@section('title', '分野集画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection

@section('form')
<form id="form" action="{{ route('addmin.edit.field.execution') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$field->id}}">
    <div class="row-item">
        <div class="column1">
            <label for="lecture-id">講義選択</label>
        </div>
        <div class="column2">
            <select name="lecture_id" id="lecture-id">
                @foreach ($lectures as $lecture)
                    <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('lecture_id'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('lecture_id') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="name">名前</label>
        </div>
        <div class="column2">
            <input type="text" id="name" name="name" value="{{ $errors->has('name') ? old('name') : $field->name }}">
        </div>
        @if ($errors->has('name'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="url">url</label>
        </div>
        <div class="column2">
            <input type="text" id="url" name="url" value="{{ $errors->has('url') ? old('url') : $field->url }}">
        </div>
        @if ($errors->has('field'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('field') }}</span>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="column1">
            <input type="submit" value="編集を実行">
        </div>
        <div class="column2">
            <button class="back" type="button">戻る</button>
        </div>
    </div>
</form>
@endsection