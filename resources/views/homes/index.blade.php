@extends('layouts.app')

@section('content')
@include('layouts.header', ['categories' => $categories])

<section id="index_page">
    <div class="container">
        <div class="row content_1">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="{{ asset('images/photo06.jpg') }}">
                        <div class="caption center-align">
                            <h3>楽しくポイントを貯めましょう！</h3>
                            <h5 class="light grey-text text-lighten-3">どこでも！</h5>
                        </div>
                    </li>
                    <li>
                        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
                        <div class="caption left-align">
                            <h3>ポイントを交換できる</h3>
                            <h5 class="light grey-text text-lighten-3">現金、カード、ギッフト。。。</h5>
                        </div>
                    </li>
                    <li>
                        <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
                        <div class="caption right-align">
                            <h3>毎日お得！</h3>
                            <h5 class="light grey-text text-lighten-3">多く貯めましょう！</h5>
                        </div>
                    </li>
                    <li>
                        <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
                        <div class="caption center-align">
                            <h3>毎日キャペンがある</h3>
                            <h5 class="light grey-text text-lighten-3">もっと、お得！</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content_2">
            <div class="carousel" data-indicators="true">
                @foreach($client_use_oftens as $client_use_often)
                <a class="carousel-item" href="{{ route('client.show', $client_use_often->id) }}"><img src="{{ $client_use_often->banner }}"></a>
                @endforeach
            </div>
        </div>

        <div class="row content_3">
            <div class="col m4 s12">
                <img src="images/placard_woman_1smile.png" class="full_width">
                <div class="text_box valign-wrapper">
                    <div class="valign center card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="https://img.slvrbullet.com/w0000002332/222.gif" height="158" width="239">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">エムアイカード<i class="material-icons right">more_vert</i></span>
                            <p><a href="#">ゲット</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">エムアイカード<i class="material-icons right">close</i></span>
                            <p>※発行月の翌月末までに1,000円(税込)以上利用にてポイント付与対象となります。
                                ※以下3券種のカード全てポイント付与対象となります。
                                【対象カード】三越 M CARD、MI CARD、伊勢丹アイカード、
                                ※家族カードの発行、対象カード以外の発行・カード申込から3ヶ月以内…</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m4 s12">
                <img src="images/placard_woman_1smile.png" class="full_width">
                <div class="text_box valign-wrapper">
                    <div class="valign center card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://img.gendama.jp/service/campaign/20171130_114321.jpg" height="158" width="239">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Yahoo! JAPANカード<i class="material-icons right">more_vert</i></span>
                            <p><a href="#">ゲット</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Yahoo! JAPANカード<i class="material-icons right">close</i></span>
                            <p>このサービスの注意事項はありません。
                                正常にポイントを獲得するためにをご確認いただき、
                                サービスをご利用ください。</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col m4 s12">
                <img src="images/placard_woman_1smile.png" class="full_width">
                <div class="text_box valign-wrapper">
                    <div class="valign center card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator"  src="http://h.accesstrade.net/sp/rr?rk=0100kfad000t0s" height="158" width="239">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">松井証券 口座開設<i class="material-icons right">more_vert</i></span>
                            <p><a href="#">ゲット</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">松井証券 口座開設<i class="material-icons right">close</i></span>
                            <p>【ポイント獲得条件】
                                ・申込日より翌月最終営業日の前日までに、開設完了に至った場合のみ</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row content_4">
            <div class=" hide-on-small-only"></div>
            @foreach($client_use_oftens as $client_use_often)
            <div class="col s12 m6">
                <div class="row valign-wrapper">
                    <div class="col s12 m4 img">
                        <img src="{{ $client_use_often->banner }}" class="materialboxed responsive-img" >
                    </div>
                    <div class="col s12 m8 text_box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labori</p>
                        <p class="light-blue-text text-darken-2"><strong><a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>ゲット</a></strong></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('bottom_js')
    <script>
        $(document).ready(function(){
            $('.slider').slider();
        });
    </script>
@endsection
