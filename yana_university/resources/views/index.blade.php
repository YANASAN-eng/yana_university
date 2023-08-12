@extends('layouts.frame')

@section('title','ホームーページ')

@section('style')
    <style type="text/css">
        <!--
            .content{
                width:20%;
                padding:1%;
                float:left;
            }
            .content img{
                max-width:200px;
                width:100%;
                box-shadow:10px 10px rgba(200,200,0,0.7);
            }
            .contents_wrapper{
                padding-bottom:100px;
            }
        -->
    </style>
@endsection

@section('introduction')
    <h1>YANA大学ホームページ</h1>
    <p>
        ようこそYANA大学へ！
    </p>
    <p>
        YANA大学は，数学科/物理学科/情報工学科/イラスト創作科の4つの学科
        で構成される仮想的な青空大学です．
    </p>
    <p>
        本大学は，学力も年齢も性別も一切関係なく学問を自由に学んで欲しい
        という目的を持って作成されました．
    </p>
    <p>
        ただし，そうは言うものの本大学で行われる授業の内容を理解するのに
        最低限必要な予備知識として高校生レベルの知識を仮定しています．
        ですが，あくまでも高校生レベルの内容を理解していればいいだけなので，
        それを理解できているなら幼稚園児だろうが学歴が低かろうが一切関係なく
        読んで頂いて大丈夫です．
    </p>
    <p>
        なお，読み方に関しては特に指定などはございません．自分が興味あるものから自由に
        読んで頂ければ大丈夫です．
    </p>
    <p>
        ここで少し話が変わりますが，少々注意点を述べますと，本大学では分かりやすさを重視するため
        厳密性に欠ける表現が度々出てくる
        可能性がございます．
    </p>
    <p>
        では，上記の注意点を読んだ上で納得された方は早速ですがYANA大学の授業をぜひ受けて行ってくださいね！
    </p>
@endsection

@section('contents')
    <div class="contents">
        <div class="content">
            <img class="link_btn"src="{{asset('img/math.jpg')}}">
            <p>
                <a href="{{url('/math')}}">数学科</a>
            </p>
            
        </div>
        <div class="content">
            <img class="link_btn"src="{{asset('img/physics.jpg')}}">
            <p>
                <a href="{{url('/physics')}}">物理学科</a>
            </p> 
        </div>
        <div class="content">
            <img class="link_btn"src="{{asset('img/programming.jpg')}}">
            <p>
                <a href="{{url('/programming')}}">情報工学科</a>
            </p>
        </div>
        <div class="content">
            <img class="link_btn"src="{{asset('img/illust.jpg')}}">
            <p>
                <a href="{{url('/illust')}}">イラスト創作科</a>
            </p>  
        </div>
        <div class="content">
            <img class="link_btn"src="{{asset('img/bgm.jpg')}}">
            <p>
                <a href="{{url('/bgm')}}"target="_blank"rel="noopener noreferrer">YANA CAFFE</a>
            </p>    
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript"src="{{asset('js/home/main.js')}}"></script>
@endsection