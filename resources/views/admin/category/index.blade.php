@extends('admin.components.main')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                カテゴリー画面
                <small>カテゴリー</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">category</a></li>
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
                            <h4 class="title">Categories</h4>
                            <p class="category">List of categories</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>名</th>
                                <th>説明</th>
                                <th>修正</th>
                                <th>削除</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td> {{ $category['id'] }} </td>
                                        <td> {{ $category['name'] }} </td>
                                        <td> {{ $category['description'] }} </td>
                                        <td class="center">
                                            <i class="fa fa-pencil fa-fw"></i>
                                            <a href="{{ url('admin/category/' . $category->id . '/edit') }}">Edit</a>
                                        </td>
                                        <td class="center">
                                            <form action="{{ url('admin/category/' . $category->id) }}" method="POST">
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
                            <div align="center">{!! $categories->links() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -------------------------------------------------->
        </section>
        <!-- /.content -->
    </div>
@endsection


