@extends('layouts.bgm_frame')

@section('title','YANACAFFE')

@section('contents')
    <div class="contents-scroll"style="overflow:scroll;
                                        height:250px;
                                        position:absolute;
                                        top:100px;
                                        left:0px;
                                        position:fixed;
                                        z-index:10;
                                        background-color:rgba(0,0,0,0.8);
                                        ">
    
        @foreach($bgms as $bgm)
            <iframe width="24%" src="https://www.youtube.com/embed/{{$bgm->bgm_url}}" title="{{$bgm->bgm_name}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @endforeach
    
    </div>
@endsection

@section('introduction')
    <div class="intro" style="margin-top:250px;">
        <h1>YANA CAFFEへようこそ！</h1>
        <p>
            YANA CAFFEへようこそ．ここでは，あなたが好きな作業用bgmを自由に
            張り付けて聴くことができます．
        </p>
        <p>
            ちなみに，なぜこのような様式を取ったかといいますと次のようです．
        </p>
        <p>
            普段僕たちは，作業用bgmを聴くとき無意識のうち好きなジャンルの
            曲ばかりを耳にしがちです．
            ですが，皆様に自由に作業用bgmを本サイトに張り付けて頂く事で，
            自分の好きな範囲に留まらず，色々な曲に出会うことが可能になり，
            様々な良曲に出会って頂けると考えたからです．
        </p>
        <p>
            また，池谷裕二さんの著書「記憶力を強くする」を
            読んで頂くと分かるのですが，
            <span style="color:red;font-weight:bold;">様々な刺激を脳に与えると海馬の神経細胞が増殖し
            記憶力が増大する</span>そうです．
        </p>
        <p>
            まあ，長々と理由を書きましたが，あまり気にせずに気の向くまま
            自由にあなたの好きな作業用bgmを張り付けて，快適な
            YANA CAFFEを皆で作って行きましょう！
        </p>
    </div>
@endsection
@section('form')
    <form action="{{url('/bgm')}}"method='post'>
        @csrf
        <table>
            <tr>
                <th>曲名</th>
                <td><input name="bgm_name"type="text"></td>
                @if($errors->has('bgm_name') || $errors->has('bgm_url'))
                    <td>{{$errors->first('bgm_name')}}</td>
                @endif
            </tr>
            <tr>
                <th>曲のジャンル</th>
                <td>
                    <select name="bgm_category">
                        @foreach($categories as $category)
                            <option value="{{$category->category_name}}">
                                {{$category->category_name}}
                            </option>
                        @endforeach
                    </select>
                </td>
                @if($errors->has('bgm_name') || $errors->has('bgm_url'))
                    <td></td>
                @endif
            </tr>
            <tr>
                <th>曲のURL</th>
                <td><input name="bgm_url"type="text"></td>
                @if($errors->has('bgm_url'))
                    <td>
                        {{$errors->first('bgm_url')}}
                    </td>
                @endif
            </tr>
            <tr>
                <th>曲に対するコメント</th>
                <td><input name="bgm_comment"type="text"></td>
                @if($errors->has('bgm_name') || $errors->has('bgm_url'))
                    <td></td>
                @endif
            </tr>
        </table>
        <input type="submit"value="曲を登録"style="background-color:rgba(255,0,0,0.8);">
    </form>
    <table>
        <tr>
            <th>登録された曲名</th>
            <th>登録された曲のジャンル</th>
            <th>登録された曲のURL</th>
            <th>登録された曲に対するコメント</th>
        </tr>
        @foreach($bgm_views as $bgm)
            <tr>
                <td>
                    {{$bgm->bgm_name}}
                </td>
                <td>
                   {{$categories[(int)$bgm->category_id - 1]->category_name}}
                </td>
                <td>
                    {{$bgm->bgm_url}}
                </td>
                <td>
                    {{$bgm->bgm_comment}}
                </td>
            </tr>
        @endforeach
    </table>
    {{$bgm_views->onEachSide(2)->links()}}
@endsection

@section('script')
    <script type="text/javascript"src="{{asset('js/bgm/main.js')}}"></script>
@endscript