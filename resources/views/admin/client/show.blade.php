@extends('admin.components.main')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                クライアント画面
                <small>クライアントの案件を作る</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Client</a></li>
                <li class="active">Show</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -------------------------------------------->
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="row">
                                        <label for="title" class="col-md-2 col-md-offset-1 control-label">タイトル</label>
                                        <div class="col-md-6">
                                            <div>{{ $client->title }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="started_date" class="col-md-2 col-md-offset-1 control-label">発行日</label>
                                        <div class='col-md-6'>
                                            <div>{{ date_format(date_create($client->started_date), "Y-m-d\TH:m") }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="end_date" class="col-md-2 col-md-offset-1 control-label">締め切り</label>
                                        <div class='col-md-6'>
                                            <div>{{ date_format(date_create($client->end_date), "Y-m-d\TH:m") }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="url" class="col-md-2 col-md-offset-1 control-label">リング</label>
                                        <div class="col-md-6">
                                            <div>{{ $client->url }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="banner" class="col-md-2 col-md-offset-1 control-label">Banner</label>
                                        <div class="col-md-6">
                                            <div><img src="{{ $client->banner }}" alt=""></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="point_num" class="col-md-2 col-md-offset-1 control-label">ポイント</label>
                                        <div class="col-md-8">
                                           <div>{{ $client->point_num }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="rate" class="col-md-2 col-md-offset-1 control-label">レート</label>
                                        <div class="col-md-6">
                                            <div>{{ $client->rate }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="rate" class="col-md-2 col-md-offset-1 control-label">カテゴリー</label>
                                        <div class="col-md-6">
                                            <div>{{ $client->category->name }}</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="description" class="col-md-2 col-md-offset-1 control-label">説明</label>
                                        <div class="col-md-6">
                                            <div>{{ $client->description }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-4">
                                            <a class="btn btn-primary" href="{{ url('/admin/clients') }}"><span>戻り</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -------------------------------------------------->

        </section>
        <!-- /.content -->
    </div>
@endsection
