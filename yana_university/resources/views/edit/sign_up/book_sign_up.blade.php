@extends('layouts.frame')

@section('title','本のタイトル')

@section('form')
    <form action="{{url('/book/sign_up')}}"method="post">
        @csrf
        <table>
            <tr>
                <th>科目</th>
                <td>
                    <select name="subject_name">
                        @foreach($subjects as $subject)
                            <option class="{{$subject->subject_name}}">
                                {{$subject->subject_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
                @if($errors->has('book_name') || $errors->has('book_url'))
                    <td></td>
                @endif
            </tr>
            <tr>
                <th>本のタイトル</th>
                <td>
                    <input type="text"name="book_name">
                </td>
                @if($errors->has('book_name'))
                    <td>
                        {{$errors->first('book_name')}}
                    </td>
                @endif
            </tr>
            <tr>
                <th>URL</th>
                <td>
                    <input type="text"name="book_url">
                </td>
                @if($errors->has('book_url'))
                    <td>
                        {{$errors->first('book_url')}}
                    </td>
                @endif
            </tr>
        </table>
        <input id="submit"type="submit"value="新規登録"style="background-color:rgba(255,150,0,0.8);">
        <input id="buck_btn"type="button"value="戻る"style="background-color:rgba(200,200,200,0.8);">
    </form>
@endsection

@section('script')
    <script>
        let buck_btn = document.getElementById('buck_btn');
        buck_btn.addEventListener('click',function(){
            location.href = "http://localhost:8888/yana_university/public/list";
        });
    </script>
@endsection