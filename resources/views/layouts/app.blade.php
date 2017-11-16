@extends('layouts.master')

@section('add_css')

@endsection

@section('top_js')

@endsection

@section('main')
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
@endsection

@section('bottom_js')
    <script src="js/main.js"></script>
@endsection
