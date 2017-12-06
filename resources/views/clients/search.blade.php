@extends('layouts.app')

@section('content')
    @include('layouts.header', ['categories' => $categories])
    @include('layouts.search_form', ['keyword' => empty($keyword) ? '' : $keyword])
    <section id="index_page">
        <div class="row container">
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
                            <p class="light-blue-text text-darken-2"><strong><a href="{{ route('client.show', $client->id) }}" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>ゲット</a></strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="fa-align-center">
            {{ $clients->links() }}
        </div>
    </section>
@endsection
@section('bottom_js')
    <script>
        $(document).ready(function () {
            if ($("body").hasScrollBar()) {
                $("footer").addClass("footer-fix");
                $("#bottom").remove();
            }
        });

        (function($) {
            $.fn.hasScrollBar = function() {
                return this.get(0).scrollHeight > this.height();
            }
        })(jQuery);
    </script>
@endsection
