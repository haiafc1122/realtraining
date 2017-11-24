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
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit category
                        </div>

                        <div class="panel-body">
                            <!-- create form -->
                            <form action="/admin/category/{{ $category->id }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                            {{$err}}<br/>
                                        @endforeach
                                    </div>
                                @endif

                            <!-- Name -->
                                <div class="form-group">
                                    <label for="task-name" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $category->name }} required">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="task-name" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="description" id="task-name" class="form-control", value="{{ $category->description }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-btn fa-save"></i>Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -------------------------------------------------->
        </section>
        <!-- /.content -->
    </div>
@endsection
