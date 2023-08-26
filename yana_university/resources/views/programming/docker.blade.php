@extends('layouts.lesson_template')

@section('docker')

@section('sentences')
    <h1>docker入門</h1>
<div class="chapter">
    <h2>dockerとは何をするためのものか</h2>
    <p>
        まず結論から書きます．dockerとは，アプリケーションの実行環境
        を構成するためのツールです．
    </p>
    <p>
        例をあげます．PHPでウェブアプリケーションを作りたいと思ったとき，
        アプリケーションを実際に動作させる場合は次のようです．
        <ol>
            <li>サーバを用意する</li>
            <li>そのサーバにApacheをインストールする</li>
            <li>そのサーバにPHPをインストールする</li>
            <li>そのサーバに自分で書いたプログラムソースコードを乗せる</li>
        </ol>
    </p>
    <p>
        dockerは以上の4つのうち1から3までのインフラ環境構築を簡単にしてくれる
        ツールです．
    </p>
    <h2>dockerを使用するメリット</h2>
    <p>
        開発環境を構築する方法は次の様なものがあります．
        <ul>
            <li>各自PCでXAMPPを利用する</li>
            <li>各自PCでVMwareを利用して仮想サーバを作成する</li>
            <li>AWSでクラウド上に仮想サーバを作成して共有する</li>
        </ul>
    </p>
    <p>
        これらの方法と比べてDockerを利用するメリットは次のようです．
        <ul>
            <li>環境構築が簡単</li>
            <li>環境の共有が簡単</li>
            <li>環境が軽い</li>
        </ul>
    </p>
    <h2>dockerの最低限の知識</h2>
    <p>
        <ul>
            <li>コンテナ</li>
            <li>イメージ</li>
            <li>Docker Hub</li>
            <li>Dockerfile</li>
        </ul>
        <img src="{{asset('img/docker_model.png')}}"style="width:500px;height:500px;">
    </p>
    <h2>コンテナ</h2>
    <p>
        コンテナとは，アプリケーションを実行できる環境の事．
        イメージでは<span style="color:red;">コンテナ$\fallingdotseq$サーバー</span>
    </p>
    <h2>イメージ</h2>
    <p>
        イメージは，コンテナの元になる設定ファイル．
        イメージには，OSやミドルウェアなどの情報が入っており，そのイメージから
        コンテナを作成することで実際にアプリケーションを実行できる環境が作成
        できる．
    </p>
    <h2>docker hub</h2>
    <p>
        docker hubとはdockerのイメージを共有するサービスの事．
    </p>
    <h2>dockerfile</h2>
    <p>
        dockerfileはdockerイメージを作成するための設定を記述したテキストファイル．
    </p>
</div>

@endsection