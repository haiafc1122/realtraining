@extends('layouts.master')

@section('main')
    @include('layouts.header', ['categories' => $categories])
    <section id="blog_main">
        <div class="container white">
            <div class="row mg_b_0">
                <div class="row">
                </div>
                <div class="col s12 page_label mg_b_10">
                    <div class="full_height mg_r_10 teal darken-1 left"></div>
                    <h3 class="text-uppercase teal lighten-5">{{ $category->name }}</h3>
                </div>
                <div class="col s12 l9">
                    <div class="row">
                        <div class="col s12">
                            @foreach($clients as $client)
                            <div class="row">
                                <div class="col s4">
                                    <img src="{{ $client->banner }}" class="full_width">
                                </div>
                                <div class="col s8">
                                    <h5 class="title_2">
                                        <a href="{{ route('client.show', $client->id) }}"
                                           class="teal-text text-darken-1"><strong>{{ $client->title }}</strong></a>
                                    </h5>
                                    <p class="mg_b_10">{{ $client->description }}</p>
                                    <small><i><strong style="color: #ffa102;">({{ ($client->point_num)*($client->rate)*0.1 }}) <span style="font-size: 15px;">ポイント</span></strong></i></small>
                                    <a href="{{ route('client.show', $client->id) }}" class="red-text"><u>ゲット></u></a>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col s12 center">
                                    <ul class="pagination">
                                        {{ $clients->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



