@extends('admin.components.main')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                カテゴリー画面
                <small>カテゴリーを作る</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">category</a></li>
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
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('category.store') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">カテゴリー名</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
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
                                                    Create
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


