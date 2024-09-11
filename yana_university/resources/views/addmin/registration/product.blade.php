@extends('layouts.frame')

@section('title', '商品登録画面')

@section('style')

@endsection

@section('form')
<form action="{{ route('addmin.registration.product.execution') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="column_1">
            <label for="name">商品名</label>
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
    <div class="row">
        <div class="column_1">
            <label for="price">値段</label>
        </div>
        <div class="column_2">
            <input type="text" id="price" name="price" value="{{ old('price') }}">
        </div>
        @if ($errors->has('price'))
            <div class="column_3">
                <span class="error-message">{{ $errors->first('price') }}</span>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="column_1">
            <label for="product_image">画像</label>
        </div>
        <div class="column_2">
            <input type="file" id="product_image" name="product_image">
        </div>
    </div>
    <div class="button_wrapper">
        <input type="submit" value="登録">
        <button>戻る</button>
    </div>
</form>
@endsection