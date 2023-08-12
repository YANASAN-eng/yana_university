@extends('layouts.frame')

@section('title','章のタイトルを編集')

@section('form')
    <form action="{{url('/chapter/edit')}}"method="post">
        @csrf
        <table>
            <tr>
                <th>ID</th>
                <td><input name="chapter_id"type="text"value="{{$id}}"readonly></td>
                @if($errors->has('chapter_name'))
                    <td></td>
                @endif
            </tr>
            <tr>
                <th>本のタイトル</th>
                <td>
                    <select name="book_name">
                        @foreach($books as $book)
                            <option value="{{$book->book_name}}">
                                {{$book->book_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
                @if($errors->has('chapter_name'))
                    <td></td>
                @endif
            </tr>
            <tr>
                <th>章のタイトル</th>
                <td>
                    <input type="text"name="chapter_name">
                </td>
                @if($errors->has('chapter_name'))
                    <td>
                        {{$errors->first('chapter_name')}}
                    </td>
                @endif
            </tr>
        </table>
        <input type="submit"value="編集実行"style="background-color:rgba(255,0,0,0.5);">
        <input id="back_btn"type="button"value="戻る"style="background-color:rgba(200,200,200,0.8);;">
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