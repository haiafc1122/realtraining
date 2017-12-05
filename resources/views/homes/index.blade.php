@extends('layouts.app')

@section('content')
@include('layouts.header', ['categories' => $categories])

<section id="index_page">
    <div class="container">
        <div class="row content_1">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="{{ asset('images/real2.jpg') }}">
                        <div class="caption center-align">
                            <h3 class="black-text">楽しくポイントを貯めましょう！</h3>
                            <h5 class="light text-lighten-4 black-text ">どこでも！</h5>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/real1.jpg') }}">
                        <div class="caption left-align">
                            <h3>ポイントを交換できる</h3>
                            <h5 class="light white-text text-lighten-3">現金、カード、ギッフト。。。</h5>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/real3.jpg') }}">
                        <div class="caption right-align">
                            <h3 class="black-text">毎日お得！</h3>
                            <h5 class="light black-text text-lighten-2">多く貯めましょう！</h5>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/real4.jpg') }}">
                        <div class="caption center-align">
                            <h3 class="white-text">毎日キャンペーンがある</h3>
                            <h5 class="light white-text text-lighten-1">もっと、お得！</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        @if(!empty($client_use_oftens))
            <div class="content_2">
                <div class="carousel" data-indicators="true">
                        @foreach($client_use_oftens as $client_use_often)
                        <a class="carousel-item" href="{{ route('client.show', $client_use_often->id) }}"><img src="{{ $client_use_often->banner }}"></a>
                        @endforeach
                </div>
            </div>
        @endif

        @if(!empty($campaigns))
        <div class="row content_3">
            <div class="row">
                <h5 class="card-panel teal white-text">キャンペーン</h5>
            </div>
            <div class="row"></div>
            @foreach($campaigns as $campaign)
            <div class="col m4 s12">
                <img src="images/placard_woman_4laugh.png" class="full_width">
                <div class="text_box valign-wrapper">
                    <div class="valign center card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator"  src="{{ $campaign->banner }}" height="158" width="239">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $campaign->tile }}<i class="material-icons right">more_vert</i></span>
                            <p><a href="{{ route('client.show', $campaign->id) }}">ゲット</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $campaign->tile }}<i class="material-icons right">close</i></span>
                            <p>{{ $campaign->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @if(!empty($client_use_oftens))
            <div class="row content_4">
                <div class=" hide-on-small-only"></div>
                @foreach($client_use_oftens as $client_use_often)
                <div class="col s12 m6">
                    <div class="row valign-wrapper">
                        <div class="col s12 m4 img">
                            <img src="{{ $client_use_often->banner }}" class="materialboxed responsive-img" >
                        </div>
                        <div class="col s12 m8 text_box">
                            <p>{{ $client_use_often->description }}</p>
                            <p class="light-blue-text text-darken-2"><strong><a href="{{ route('client.show', $client_use_often->id) }}" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>ゲット</a></strong></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
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
