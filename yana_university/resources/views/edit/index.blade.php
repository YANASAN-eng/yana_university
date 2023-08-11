@extends('layouts.frame')

@section('title','目次作成フォーム')

@section('style')
    <link rel="stylesheet"href="{{asset('css/data/style.css')}}">
@endsection

@section('form')
    <div class="book_form">
        <table>
            <tr>
                <th>科目</th>
                <th>本のタイトル</th>
                <th>url</th>
                <th><input class="sign_up"id="book_sign_up"type="button"value="新規作成"></th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td>
                        {{$subjects[$book->subject_id-1]->subject_name}}
                    </td>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->book_url}}</td>
                    <td>
                        <div class="clearfix">
                            <form action="{{url('/book/edit')}}"method="get">
                                @csrf
                                <input name="book_id"type="hidden"value="{{$book->id}}">
                                <input class="book_edit edit"type="submit"value="編集">
                            </form>
                            <form action="{{url('book/destroy')}}"method="post">
                                @csrf
                                <input name="book_id"type="hidden"value="{{$book->id}}">
                                <input class="book_destroy destroy"type="submit"value="削除">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>{{$books->links()}}</div>
    </div>
    <div class="chapter_form">
        <table>
            <tr>
                <th>本のタイトル</th>
                <th>章のタイトル</th>
                <th><input class="sign_up"id="chapter_sign_up"type="button"value="新規作成"></th>
            </tr>
            @foreach($chapters as $chapter)
                <tr>
                    <td>{{$book_titles[$chapter->book_id - 1]}}</td>
                    <td>{{$chapter->chapter_name}}</td>
                    <td>
                        <div class="clearfix">
                            <form action="{{url('chapter/edit')}}"method="get">
                                @csrf
                                <input name="chapter_id"type="hidden"value="{{$chapter->id}}">
                                <input class="chapter_edit edit"type="submit"value="編集">
                            </form>
                            <form action="{{url('chapter/destroy')}}"method="post">
                                @csrf
                                <input name="chapter_id"type="hidden"value="{{$chapter->id}}">
                                <input class="chapter_destroy destroy"type="submit"value="削除">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>{{$chapters->links()}}</div>
    </div>
    <div class="chapter_form">
        <table>
            <tr>
                <th>章のタイトル</th>
                <th>節のタイトル</th>
                <th><input class="sign_up"id="section_sign_up"type="button"value="新規作成"></th>
            </tr>
            @foreach($sections as $section)
                <tr>
                    <td>{{$chapter_titles[$section->chapter_id - 1]}}</td>
                    <td>{{$section->section_name}}</td>
                    <td>
                        <div class="clearfix">
                            <form action="{{url('section/edit')}}"method="get">
                                @csrf
                                <input name="section_id"type="hidden"value="{{$section->id}}">
                                <input class="aection_edit edit"type="submit"value="編集">
                            </form>
                            <form action="{{url('section/destroy')}}"method="post">
                                @csrf
                                <input name="section_id"type="hidden"value="{{$section->id}}">
                                <input class="section_destroy destroy"type="submit"value="削除">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>{{$sections->links()}}</div>
    </div>
@endsection

@section('script')
    <script type="text/javascript"src="{{asset('js/data/main.js')}}"></script>
@endsection