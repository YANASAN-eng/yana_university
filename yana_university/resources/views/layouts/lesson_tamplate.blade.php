@extends('layouts.lesson_frame')

@section('contents')
    <ul>
        @foreach($chapters as $chapter)
            <li>{{$chapter->chapter_name}}</li>
            <ul>
                @foreach($sections as $section)
                    @if($chapter->id == $section->chapter_id)
                        <li>{{$section->section_name}}</li>
                    @endif
                @endforeach
            </ul>
        @endforeach
    </ul>
@endsection