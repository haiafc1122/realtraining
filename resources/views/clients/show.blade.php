@extends('layouts.app')
@section('content')
@include('layouts.header', ['categories' => $categories])
<div class="blog_main">
    <div class="container white">
        <div class="row">
            <div class="row mg_b_0">
                <div class="col s12 l9">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row mg_r_0 mg_l_0 grey lighten-3">
                                        <div class="col m6 pa_l_0 pa_r_0">
                                            <div class="grey lighten-3">
                                                <img src="{{ $client->banner }}" class="block full_width">
                                            </div>
                                        </div>

                                        <div class="col m6">
                                            <h4 class="teal-text text-darken-1 title_1"><strong>{{ $client->title }}</strong></h4>
                                            <p class="mg_b_10">{{ $client->description }}</p>
                                            <small><i><strong style="color: #ff0000;">({{ $client->get_active_points() }}) <span style="font-size: 15px;">ポイント</span></strong></i></small>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <form method="POST" target="_blank" role="form" action="{{ route('action.client', $client->id) }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">サービスを利用して{{ $client->get_active_points() }}Pt ゲット！</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection