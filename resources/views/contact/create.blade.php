@extends('layouts.master')
@section('main')
        <div class="row">
            <div class="col-lg-offset-5">
                <h2>お問い合わせ</h2>
            </div>
        </div>
        <div class="container">
            <form class="col s12 col-lg-offset-3" action="{{ route('contact.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate" name="name"   @if(!empty(Auth::user()->name))  value="{{ Auth::user()->name }}" @endif  required>
                        <label for="icon_prefix">名前</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" class="validate" name="email" @if(!empty(Auth::user()->email))  value="{{Auth::user()->email}}" @endif required>
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone_number" type="text"  name="phone_number" class="validate" @if(!empty(Auth::user()->phone_number))  value="{{ Auth::user()->phone_number }}" @endif required>
                        <label for="icon_telephone">電話番号</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">person_pin_circle</i>
                        <input id="location" type="text" class="validate" name="location" @if(!empty(Auth::user()->location))  value="{{ Auth::user()->location }}" @endif required>
                        <label for="location">場所</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">text</i>
                        <textarea id="content" class="materialize-textarea" name="content" required></textarea>
                        <label for="textarea1">問い合わせの内容</label>
                    </div>
                </div>

               {{-- <div class="row">
                    <div class="input-field col s10">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="g-recaptcha" data-sitekey="6LcLzDgUAAAAAAmjSNrabR63TsJlSXUDivy9i2mU"></div>
                        </div>
                    </div>
                </div>--}}

                <div class="row">
                    <div class="col-lg-offset-4">
                        <button class="btn waves-effect waves-light" type="submit" name="action">送信
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row"></div>
@endsection
{{--
@section('bottom_js')
    <script src='https://www.google.com/recaptcha/api.js?hl=ja'></script>
@endsection--}}
