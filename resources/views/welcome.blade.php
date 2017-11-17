@extends('layouts.master')

@section('main')
    <section id="index_page">
        <div class="container white-text">
            <div class="row content_1">
                <div class="col s12 m6 l7 right">
                    <img src="images/zei_shopping_mynumber.png" class="full_width">
                </div>
                <div class="col s12 m6 l5 light-blue-text text-darken-1 left">
                    <ul>
                        <li>
                            <p><strong>hello</strong></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content_2">
                <div class="carousel" data-indicators="true">
                    <a class="carousel-item" href="#one!"><img src="images/2016-11-23_160637.jpg"></a>
                    <a class="carousel-item" href="#two!"><img src="images/2016-11-23_160704.jpg"></a>
                    <a class="carousel-item" href="#three!"><img src="images/2016-11-23_160637.jpg"></a>
                    <a class="carousel-item" href="#three!"><img src="images/2016-11-23_160704.jpg"></a>
                    <a class="carousel-item" href="#four!"><img src="images/2016-11-23_160637.jpg"></a>
                </div>
            </div>
            <div class="row content_3">
                <div class="col m4 s12">
                    <img src="images/placard_woman_1smile.png" class="full_width">
                    <div class="text_box valign-wrapper">
                        <p class="valign center">Selling Point A1</p>
                    </div>
                </div>
                <div class="col m4 s12">
                    <img src="images/placard_man_2angry.png" class="full_width">
                    <div class="text_box valign-wrapper">
                        <p class="valign center">Selling Point A1</p>
                    </div>
                </div>
                <div class="col m4 s12">
                    <img src="images/placard_woman_4laugh.png" class="full_width">
                    <div class="text_box valign-wrapper">
                        <p class="valign center">Selling Point A1</p>
                    </div>
                </div>
            </div>
            <div class="row content_4">
                <div class=" hide-on-small-only"></div>
                <div class="col s12 m6">
                    <div class="row valign-wrapper">
                        <div class="col s12 m4 img">
                            <img src="images/img.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s12 m8 text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labori</p>
                            <p class="light-blue-text text-darken-2"><strong>-Realworld</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="row valign-wrapper">
                        <div class="col s12 m4 img">
                            <img src="images/img.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s12 m8 text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labori</p>
                            <p class="light-blue-text text-darken-2"><strong>-Realworld</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="row valign-wrapper">
                        <div class="col s12 m4 img">
                            <img src="images/img.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s12 m8 text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labori</p>
                            <p class="light-blue-text text-darken-2"><strong>-Realworld</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="row valign-wrapper">
                        <div class="col s12 m4 img">
                            <img src="images/img.jpg" class="circle responsive-img">
                        </div>
                        <div class="col s12 m8 text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labori</p>
                            <p class="light-blue-text text-darken-2"><strong>-Realworld</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection

