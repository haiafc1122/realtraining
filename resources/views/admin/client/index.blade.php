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
        @include('admin.components.search_form', ['keyword' => empty($keyword) ? '' : $keyword])
            <!-- Default box -------------------------------------------->
            <div class="container">
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
                </div>
                <div class="row">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th class="col-md-1" >ID</th>
                            <th class="col-md-1" >タイトル</th>
                            <th class="col-md-1" >カテゴリー</th>
                            <th class="col-md-1" >発行日</th>
                            <th class="col-md-1" >締め切り</th>
                            <th class="col-md-1" >Banner</th>
                            <th class="col-md-1" >ポイント</th>
                            <th class="col-md-1" >レート</th>
                            <th class="col-md-2" >説明</th>
                            <th class="col-md-1" >ステータス</th>
                            <th class="col-md-1" ></th>
                            <th class="col-md-1" ></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td> {{ $client->id }} </td>
                                <td> <a href="{{ route('clients.show', $client->id) }}">{{ $client->title }}</a> </td>
                                <td>{{ $client->category->name }}</td>
                                <td> {{ $client->started_date }} </td>
                                <td> {{ $client->end_date }} </td>
                                <td><img src="{{ $client->banner }}" height="98" width="98"> </td>
                                <td> {{ $client->point_num }} </td>
                                <td> {{ $client->rate }} </td>
                                <td> {{ $client->description }} </td>
                                <td><div class="@if ($client->is_active == 0) status-inactive @else status-active @endif">{{ $client->active_status() }}</div></td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('clients.edit', $client->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('admin/clients/' . $client->id .'/toggle_active_status') }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn  {{ $client->is_active == 1 ? 'btn-danger' : 'btn-success' }}">
                                            {{ $client->is_active == 1 ? 'Disable' : 'Enable' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div align="center">{!! $clients->links() !!}</div>
                </div>
            </div>
            <!-- /.box -------------------------------------------------->

        </section>
        <!-- /.content -->
    </div>
@endsection
