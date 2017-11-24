@extends('admin.components.main')
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
                <li class="active">Index</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -------------------------------------------->
            <div class="row">
                <div class="col-lg-12">
                    <h1><strong>ユーザーのリスト</strong></h1>

                    @if(session('message'))
                        <div class="alert">
                            {{ session('message')}}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr >
                            <th>ID</th>
                            <th>名前</th>
                            <th>メール</th>
                            <th>生年月日</th>
                            <th>性別</th>
                            <th>電話番号</th>
                            <th>住所</th>
                            <th>ステータス</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td> {{ $user->name }}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->location }}</td>
                                <td>{{ $user->is_active }}</td>
                                <td>
                                    <form action="{{ url('admin/user/' . $user->id .'/toggle_active_status') }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn  {{ $user->is_active == 1 ? 'btn-danger' : 'btn-success' }}">
                                            {{ $user->is_active == 1 ? 'Disable' : 'Enable' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div align="center">{!! $users->links() !!}</div>
                </div>
            </div>
            <!-- /.box -------------------------------------------------->

        </section>
        <!-- /.content -->
    </div>
@endsection
