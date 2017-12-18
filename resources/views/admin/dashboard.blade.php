@extends('admin.components.main')
@section('main')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              ホームページ
              <small>管理画面</small>
          </h1>
          <ol class="breadcrumb">
              <li><i class="fa fa-dashboard">ホーム</i></li>
{{--
              <li class="active">Widgets</li>
--}}
          </ol>
      </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <!--first row-->
        <div class="row">
            <div class="row">
                <div class="content-header row-title" ><h3>今月</h3></div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $numOfCurrentMonthClients }}</h3>

                        <p>新規クライアント</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $currentMonthAvgRate }}<sup style="font-size: 20px">%</sup></h3>

                        <p>アクションのレート平均</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $numOfCurrentMonthUsers }}</h3>

                        <p>新規ユーザー</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h6>対応済み: <strong>{{ $numOfCurrentMonthContactCheck }}</strong></h6>
                        <h6>未対応: <strong>{{ $numOfCurrentMonthContactUncheck }}</strong></h6>
                        <p>問い合わせ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!--end first row -->

        <!--second row-->
        <div class="row">
            <div class="row">
                <div class="content-header row-title" ><h3>全部</h3></div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $numOfClients }}</h3>

                        <p>新規クライアント</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $actionAvgRate }}<sup style="font-size: 20px">%</sup></h3>

                        <p>アクションのレート平均</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $numOfUsers }}</h3>

                        <p>新規ユーザー</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h6>対応済み: <strong>{{ $numOfContactChecked }}</strong></h6>
                        <h6>未対応: <strong>{{ $numOfContactUncheck }}</strong></h6>
                        <p>問い合わせ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!--end second row -->


        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <h3>先月xのメッセージ</h3>
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">メッセージ</span>
                        <span class="info-box-number">{{$last_month_messages}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <h3>今月のメッセージ</h3>
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">メッセージ</span>
                        <span class="info-box-number">{{$numOfCurrentMonthmessages}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
