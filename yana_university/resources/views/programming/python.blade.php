@extends('layouts.lesson_template')

@section('title','python')

@section('style')

@endsection
@section('sentences')
    <div class="chapter">
        <h1>線形代数</h1>
        <div class="input_linear_form">
            <form id="type_of_matrix"action="{{url('/programming/python/linear')}}"method="get">
                @csrf
                <table>
                    <tr>
                        <th>行列の行数</th>
                        <td><input name="row"type="text"placeholder="行列の行数を入力してください．"></td>
                    </tr>
                    <tr>
                        <th>行列の列数</th>
                        <td><input name="column"type="text"placeholder="行列の列数を入力してください．"></td>
                    </tr> 
                </table>
                <input type="submit"value="行列の型を入力"style="font-wight:bold;background-color:rgba(255,0,0,0.6);">
            </form>
            @yield('type_of_matrix')
        </div>
    </div>
    <div class="chapter">
        <h1>スクレイピング</h1>
    </div>
@endsection

@section('script')
    