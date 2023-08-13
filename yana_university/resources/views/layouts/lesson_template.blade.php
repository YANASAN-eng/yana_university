<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet"href="{{asset('css/style.css')}}">
        <script type="text/javascript" id="MathJax-script" async
        src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
        <script typr="text/javascript"src="{{asset('js/config.js')}}"></script>
        @yield('style')
        <style>
            .contents_wrapper{
                float:left;
                height:76%;
                width:25%;
                overflow:scroll;
                position:absolute;
                top:95px;
                left:0px;
                position:fixed;
                background-color:rgba(255,255,0,0.5);
            }
            .sentences_warapper{
                float:right;
                height:76%;
                width:75%;
                position:fixed;
                top:95px;
                left:25%;
                overflow:scroll;
            }
            li{
                color:rgba(0,0,255,0.9);
            }
            
        </style>
    </head>
    <body>
        <header>
            <div class="clearfix">
                <div class="header_logo">
                    <img src="{{asset('img/yana_logo.jpg')}}">
                </div>
                <div class="zundamon_voice">
                    <h3 style="color:white;">ここを触ると僕がページ読み上げます！</h3>
                    <img id="zundamon_voice"src="{{asset('img/zundamon.jpg')}}">
                </div>
            </div>
        </header>
        <div class="main_wrapper">
            <div class="introduction_wrapper">@yield('introduction')</div>
            <div class="clearfix">
                <div class="contents_wrapper">
                    <ul>
                        @foreach($chapters as $chapter)
                            <li class="chapter_btn">{{$chapter->chapter_name}}</li>
                            <ul>
                                @foreach($sections as $section)
                                    @if($chapter->id == $section->chapter_id)
                                        <li class="section_btn">{{$section->section_name}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endforeach
                    </ul>
                </div>
                <div class="sentences_warapper">@yield('sentences')</div>
            </div>
            <div class="form_wrapper">@yield('form')</div>
        </div>
        <footer>
            <div class="clearfix">
                <div class="footer_logo">
                    <img src="{{asset('img/yana_logo.jpg')}}">
                </div>
                <div class="footer_menus">
                    <ul>
                        <li id="back">戻る</li>
                        <li id="home">ホームページに戻る</li>
                    </ul>
                </div>
            </div>
        </footer>
        <script type="text/javascript"src="{{asset('js/main.js')}}"></script>
        <script type="text/javascript"src="{{asset('js/lesson/main.js')}}"></script>
    @yield('script')
    </body>
</html>