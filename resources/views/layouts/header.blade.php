<header id="header">
    <div class="container white-text">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="navigation" class="right_absolute button-collapse"><i class="material-icons">menu</i></a>
                <ul class="nav_desktop right_absolute hide-on-med-and-down text-uppercase">
                    @foreach($categories as $category)
                        <li><a href="{{ route('show_clients_by_category', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
                <ul id="navigation" class="side-nav">
                    @if(Auth::user())
                    <li><div class="userView">
                            <div class="background">
                                <img src="{{ asset('images/bg_natural_sougen.png') }}">
                            </div>

                                <a class="user_menu" href="{{ route('passbook') }}"><span>{{ Auth::user()->userPoint ? Auth::user()->userPoint->approval_point : 0 }}pt
                                </span>(判定中<span>{{ Auth::user()->userPoint ? Auth::user()->userPoint->pending_point : 0 }}pt</span>)
                                </a>

                            <ul>
                                <a href=""><span class="name"><u>{{ Auth::user()->name }}</u></span></a>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img src="https://png.icons8.com/logout-rounded-up/nolan/25/000000">ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ route('user.update') }}"><img src="https://png.icons8.com/customer/nolan/25/000000">プロフィール</a>

                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @foreach($categories as $category)
                        <li><a href="{{ route('show_clients_by_category', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
            </div>
        </nav>
    </div>
</header>