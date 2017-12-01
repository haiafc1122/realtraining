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
                <li><a href="#">User</a></li>
                <li class="active">Passbook</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -------------------------------------------->
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    <table class="table table-striped">
                        <thead class="cf">
                        <tr>
                            <th class="col-md-2">利用日</th>
                            <th class="col-md-7">内容</th>
                            <th class="col-md-1">状態</th>
                            <th class="col-md-2">ポイント数</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($actions) > 0)
                            @foreach($actions as $action)
                                <tr>
                                    <td>{{ $action->created_at }}</td>
                                    <td>{{ $action->client->title }}</td>
                                    <td class="{{ $action->state }}">{{ $action->show_status() }}</td>
                                    <td>{{ $action->point }}</td>
                                </tr>
                            @endforeach
                        @else
                            該当の履歴がありません
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $actions->links() }}
                </div>
            </div>
            <!-- /.box -------------------------------------------------->

        </section>
        <!-- /.content -->
    </div>
@endsection