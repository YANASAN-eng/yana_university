@extends('layouts.frame')

@section('title','節のタイトルを編集')

@section('form')
    <form action="{{url('/section/edit')}}"method="post">
        @csrf
        <table>
            <tr>
                <th>ID</th>
                <td><input name="section_id"type="text"value="{{$id}}"readonly></td>
            </tr>
            <tr>
                <th>章のタイトル</th>
                <td>
                    <select name="chapter_name">
                        @foreach($chapters as $chapter)
                            <option value="{{$chapter->chapter_name}}">
                                {{$chapter->chapter_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>節のタイトル</th>
                <td>
                    <input type="text"name="section_name">
                </td>
            </tr>
        </table>
        <input id="edit_btn"type="submit"value="編集実行"style="background-color:rgba(255,0,0,0.5);">
        <input id="back_btn"type="button"value="戻る"style="background-color:rgba(200,200,200,0.8);">
    </form>
@endsection

@section('script')
    <script>
        let back_btn = document.getElementById('back_btn');
        back_btn.addEventListener('click',function(){
            location.href = "http://localhost:8888/yana_university/public/list";
        })
    </script>
@endsection