@extends('admin.components.main')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                クライアント画面
                <small>クライアントの詳細</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Client</a></li>
                <li class="active">Index</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -------------------------------------------->
            <div class="container">
                @if(session('message'))
                    <div class="alert alert-danger">
                        {{ session('message')}}
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                <div class="row">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Cients</h4>
                            <p class="category">List of clients</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>発行日</th>
                                <th>締め切り</th>
                                <th>リンク</th>
                                <th>Banner</th>
                                <th>ポイント</th>
                                <th>レート</th>
                                <th>説明</th>
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td> {{ $client['id'] }} </td>
                                        <td> {{ $client['title'] }} </td>
                                        <td> {{ $client['started_date'] }} </td>
                                        <td> {{ $client['end_date'] }} </td>
                                        <td> {{ $client['url'] }} </td>
                                        <td> {{ $client['banner'] }} </td>
                                        <td> {{ $client['point_num'] }} </td>
                                        <td> {{ $client['rate'] }} </td>
                                        <td> {{ $client['description'] }} </td>
                                        <td class="center">
                                            <i class="fa fa-pencil fa-fw"></i>
                                            <a href="{{ url('admin/client/' . $client->id . '/edit') }}">Edit</a>
                                        </td>
                                        <td class="center">
                                            <form action="{{ url('admin/client/' . $client->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash-o  fa-fw"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div align="center">{!! $clients->links() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -------------------------------------------------->

        </section>
        <!-- /.content -->
    </div>
@endsection
