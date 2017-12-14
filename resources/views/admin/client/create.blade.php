@extends('admin.components.main')

@section('top_css')

@endsection

@section('top_js')
@endsection

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
                <li class="active">Create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -------------------------------------------->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('clients.store') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title" class="col-md-4 control-label">タイトル</label>
                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control" name="title" required autofocus>
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('started_date') ? ' has-error' : '' }}">
                                            <label for="started_date" class="col-md-4 control-label">発行日</label>
                                            <div class='col-md-6' id=''>
                                                <input type='datetime-local' class="form-control" id="started_date" name="started_date" required/>
                                                @if ($errors->has('started_date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('started_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                            <label for="end_date" class="col-md-4 control-label">締め切り</label>
                                            <div class='col-md-6'>
                                                <input type='datetime-local' class="form-control" id="end_date" name="end_date" />
                                                @if ($errors->has('end_date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('end_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                            <label for="url" class="col-md-4 control-label">リング</label>
                                            <div class="col-md-6">
                                                <input id="url" type="text" class="form-control" name="url" required >
                                                @if ($errors->has('url'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('url') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                                            <label for="banner" class="col-md-4 control-label">Banner</label>
                                            <div class="col-md-6">
                                                <input id="banner" type="text" class="form-control" name="banner" required >
                                                @if ($errors->has('banner'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('banner') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('point_num') ? ' has-error' : '' }}">
                                            <label for="point_num" class="col-md-4 control-label">ポイント</label>
                                            <div class="col-md-6">
                                                <input id="point_num" type="text" class="form-control" name="point_num" required >
                                                @if ($errors->has('point_num'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('point_num') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                                            <label for="rate" class="col-md-4 control-label">レート</label>
                                            <div class="col-md-6">
                                                <input id="rate" type="text" class="form-control" name="rate" required >
                                                @if ($errors->has('rate'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('rate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="rolename">カテゴリー</label>
                                            <div class="col-md-6">
                                                <select class="custom-select" name="category_id">
                                                    <option selected>カテゴリー</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="description" class="col-md-4 control-label">説明</label>
                                            <div class="col-md-6">
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    作成
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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

@section('bootom_js')
@endsection

