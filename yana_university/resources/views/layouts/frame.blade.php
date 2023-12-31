<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet"href="{{asset('css/style.css')}}">
        @yield('style')
    </head>
    <body>
        <header>
            <div class="clearfix">
                <div class="header_logo">
                    <img src="{{asset('img/yana_logo.jpg')}}">
                </div>
                <div class="header_menus">
                    
                </div>
            </div>
        </header>
        <div class="main_wrapper">
            <div class="introduction_wrapper">@yield('introduction')</div>
            <div class="contents_wrapper">@yield('contents')</div>
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
    @yield('script')
    </body>
</html>