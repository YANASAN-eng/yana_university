<!-- 共通レイアウト -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>@yield('title')</title>
        <link rel="stylesheet"href="{{ asset('css/style.css') }}">
        @yield('style')
    </head>
    <body>
        <header>
            <div class="header-logo">
                <img src="{{ asset('img/yana_logo.JPG')}} ">
            </div>
            <!-- ToDo:ログインメニューやメニューなど -->
            <div class="header-menus-wrapper">
                <ul class="header-menus">
                    <li class="header-menu login">
                        @if (auth()->check())
                        <form class="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout">ログアウト</button>
                        </form>
                        @else
                            <a href="{{ route('login.form') }}">ログイン</a>
                            <a href="{{ route('signup.show') }}">アカウント登録</a>
                        @endif
                    </li>
                    <li class="header-menu saite-map">
                        <a href="">サイトマップ</a>
                    </li>
                </ul>
            </div>
            <div class="gap"></div>
            <div class="account-image">
                <!-- TODOログインした状態としてない状態で画像を場合分け -->
                 @if (auth()->check())
                    <img src="{{ asset('storage/profiles/'.$account->profile_image) }}">
                 @else
                 <img src="{{ asset('img/default.JPG') }}">
                 @endif
            </div>
            <label for="check" id="hamburger-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </label>
            <input type="checkbox" id="check" name="check">  
        </header>
        <div id="side-menus">
            <ul class="side-menus">
                <li class="seide-menu-wrapper">
                    @if (auth()->check())
                            <a href="{{ route('chatAI') }}" class="side-menu">華ちゃんチャット</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout">ログアウト</button>
                            </form>
                        </li>
                        @if (auth()->user()->role ==1)
                            <a href="{{ route('addmin.portal') }}" class="side-menu">管理者画面</a>
                        @endif
                    @else
                        <a href="{{ route('login.form') }}" class="side-menu">ログイン</a>
                        </li>
                        <li class="side-menu-wrapper"><a href="{{ route('signup.show') }}" class="side-menu">アカウント登録</a></li>
                    @endif
                <li class="side-menu-wrapper"><a href="" class="side-menu">サイトマップ</a></li>
                <li>
                    <span class="acordion-title">講義</span>
                    <ul class="acordion">
                    @foreach ($lectures as $lecture)
                        <li class="sidle-menu-wrapper"><a href="{{ route($lecture->url) }}" class="side-menu">{{ $lecture->name }}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li class="side-menu-wrapper"><span class="side-menu back">戻る</span></li>
                <li class="side-menu-wrapper"><span class="side-menu home">ホームページへ戻る</span></li>
            </ul>
        </div>
        <div class="main-wrapper">
            <div class="introduction-wrapper">@yield('introduction')</div>
            <div class="contents-wrapper">@yield('contents')</div>
            <div class="form-wrapper">@yield('form')</div>
        </div>
        <footer>
            <div class="footer-logo">
                <img src="{{ asset('img/yana_logo.JPG') }}">
            </div>
            <div class="footer-menus-wrapper">
                <ul class="footer-menus">
                    <li class="footer-menu" class="back">戻る</li>
                    <li class="footer-menu" class="home">ホームページに戻る</li>
                </ul>
            </div>
        </footer>
        <script type="text/javascript"src="{{asset('js/main.js')}}"></script>
    @yield('script')
    </body>
</html>