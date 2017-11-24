<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adnin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->username }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            {{--Users--}}
            <li class="treeview">
                <a href="{{ url('/admin/user') }}>
                    <i class="fa fa-dashboard" ></i> <span>ユーザー管理</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/user') }}"><i class="fa fa-circle-o"></i>Index</a></li>
                </ul>
            </li>

            {{--Categories--}}
            <li class="treeview">
                <a href="{{ url('/admin/category') }}>
                    <i class="fa fa-dashboard" ></i> <span>カテゴリー</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/category') }}"><i class="fa fa-circle-o"></i>Index</a></li>
                    <li><a href="{{ url('/admin/category/create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
                </ul>
            </li>

            {{--CLients--}}
            <li class="treeview">
                <a href="{{ url('/admin/client') }}>
                    <i class="fa fa-dashboard" ></i> <span>クライアントの案件</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/client') }}"><i class="fa fa-circle-o"></i>Index</a></li>
                    <li><a href="{{ url('/admin/client/create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
