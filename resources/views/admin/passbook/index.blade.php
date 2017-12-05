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
            <li><a href="#">Passbook</a></li>
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
                        <th class="col-md-1">ユーザー</th>
                        <th class="col-md-2">利用日</th>
                        <th class="col-md-5">内容</th>
                        <th class="col-md-1">状態</th>
                        <th class="col-md-1">承認</th>
                        <th class="col-md-1">却下</th>
                        <th class="col-md-1">ポイント数</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($actions) > 0)
                        @foreach($actions as $action)
                        <tr>
                            <td>{{ $action->user->email }}</td>
                            <td>{{ $action->created_at }}</td>
                            <td>{{ $action->client->title }}</td>
                            <td class="{{ $action->state }}">{{ $action->show_status() }}</td>
                            <td>
                                @if($action->state == config('settings.action.status.pending'))
                                    <form action="{{ route('admin.passbook.approval', $action->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                            <button type="submit" class="btn btn-success">
                                                確認
                                            </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if($action->state == config('settings.action.status.pending'))
                                <form action="{{ route('admin.passbook.reject', $action->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-danger">
                                            却下
                                        </button>
                                </form>
                                @endif
                            </td>
                            <td>
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
