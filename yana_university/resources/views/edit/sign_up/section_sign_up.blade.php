@extends('layouts.frame')

@section('title','節のタイトル')

@section('form')
    <form action="{{url('/section/sign_up')}}"method="post">
        @csrf
        <table>
            <tr>
                <th>章のタイトル</th>
                <td>
                    <select name="chapter_name">
                        @foreach($chapters as $chapter)
                            <option class="{{$chapter->chapter_name}}">
                                {{$chapter->chapter_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
                @if($errors->has('section_name'))
                    <td></td>
                @endif
            </tr>
            <tr>
                <th>節のタイトル</th>
                <td>
                    <input type="text"name="section_name">
                </td>
                @if($errors->has('section_name'))
                    <td>
                        {{$errors->first('section_name')}}
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