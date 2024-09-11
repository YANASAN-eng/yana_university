@extends('layouts.frame')

@section('title','本のタイトルを編集')

@section('form')
    <form action="{{ url('/book/edit') }}"method="post">
        @csrf
        <table>
            <tr>
                <th>ID</th>
                <td><input name="book_id"type="text"value="{{ $id }}"readonly></td>
            </tr>
            <tr>
                <th>科目</th>
                <td>
                    <select name="subject_name">
                        @foreach($subjects as $subject)
                            <option value="{{$subject->subject_name}}">
                                {{$subject->subject_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>本のタイトル</th>
                <td>
                    <input type="text"name="book_name">
                </td>
            </tr>
            <tr>
                <th>URL</th>
                <td>
                    <input type="text"name="book_url">
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
            location.href = "http://localhost:8888/list";
        })
    </script>
@endsection