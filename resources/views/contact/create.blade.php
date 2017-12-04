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
                        <input id="name" type="text" class="validate" name="name" value="{!! Auth::user()->name !!}" required>
                        <label for="icon_prefix">名前</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" class="validate" name="email" value="{!! Auth::user()->email !!}" required>
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone_number" type="text"  name="phone_number" class="validate" value="{!! Auth::user()->phone_number !!}" required>
                        <label for="icon_telephone">電話番号</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">person_pin_circle</i>
                        <input id="location" type="text" class="validate" name="location" value="{!! Auth::user()->location !!}" required>
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