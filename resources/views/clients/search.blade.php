@extends('layouts.master')

@section('main')
    @include('layouts.header', ['categories' => $categories])
    @include('layouts.search_form', ['keyword' => empty($keyword) ? '' : $keyword])
    <div class="row"></div>
    <div class="row">
        <section id="index_page">
            <div class="container">
                <div class=" hide-on-small-only"></div>
                @foreach($clients as $client)
                    <div class="col s12 m6">
                        <div class="row valign-wrapper">
                            <div class="col s12 m4 img">
                                <img src="{{ $client->banner }}" class="materialboxed responsive-img" >
                            </div>
                            <div class="col s12 m8 text_box">
                                <h6 class="black-text"><strong>{{ $client->title }}</strong></h6>
                                <p>{{ $client->description }}</p>
                                <p class="light-blue-text text-darken-2"><strong><a href="{{ route('client.show', $client->id) }}" class="waves-effect waves-light btn">{{ $client->get_active_points() }}<i class="material-icons left">cloud_download</i>ゲット</a></strong></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="fa-align-center">
                {{ $clients->links() }}
            </div>
        </section>
    </div>
@endsection
