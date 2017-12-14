@extends('admin.components.main')
@section('top_css')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ユーザー画面
                <small>ユーザーの詳細</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Contact</a></li>
                <li class="active">Index</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -------------------------------------------->
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{ session('message')}}
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success">
                            {{ session('success')}}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead class="cf">
                        <tr>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-1">日付</th>
                            <th class="col-md-1">名前</th>
                            <th class="col-md-1">メール</th>
                            <th class="col-md-1">電話番号</th>
                            <th class="col-md-1">場所</th>
                            <th class="col-md-4">内容</th>
                            <th class="col-md-1">ステータス</th>
                            <th class="col-md-1">チェック</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($contacts) > 0)
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone_number }}</td>
                                    <td>{{ $contact->location }}</td>
                                    <td>{{ $contact->content }}</td>
                                    <td class="{{ $contact->checked }}">{{ $contact->show_status() }}</td>
                                    <td>
                                        @if($contact->checked == !config('settings.contact.checked'))
                                            <form action="{{ url('admin/contact/' . $contact->id .'/check') }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                    <button type="submit" class="btn btn-success">
                                                        確認
                                                    </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                </tr>
                            @endforeach
                        @else
                            該当の履歴がありません
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $contacts->links() }}
                </div>
            </div>
            <!-- /.box -------------------------------------------------->

        </section>
        <!-- /.content -->
    </div>
@endsection
