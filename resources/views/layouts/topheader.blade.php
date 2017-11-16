<div id="top">
    <div class="container black-text">
        <ul class="left">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo_gendama.png') }}" alt="げん玉" width="181" height="29">
            </a>
        </ul>
        <div class="right">
            <ul>
                <!-- Authentication Links -->
                @guest
                    <a href="{{ route('login') }}" class="waves-effect waves-light btn hide-on-small-only red lighten-1">Login</a>
                    <a href="{{ route('register') }}" class="waves-effect waves-light btn hide-on-small-only red lighten-1">Register</a>
                    @else
                    <!--Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-comments-o"></i>
                                <span class="label label-success count_message">0</span>
                            </a>
                            <ul class="dropdown-menu" style="width: 200px;">
                                <li class="header text-center" id="notify_header">You have <span class="count_message">0</span> messages</li>
                                <li>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                        <ul class="menu" id="message_notify" style="overflow-y: scroll; width: 100%; height: 200px;">
                                        </ul>
                                        <div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                        <div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
                                    </div>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
