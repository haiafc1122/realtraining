<header id="header">
    <div class="container white-text">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">
                    <div class="left logo">

                    </div>
                    <div class="right">

                    </div>
                    <div class="clearfix"></div>
                </a>
                <a href="#" data-activates="navigation" class="right_absolute button-collapse"><i class="material-icons">menu</i></a>
                <ul class="nav_desktop right_absolute hide-on-med-and-down text-uppercase">
                    @foreach($categories as $category)
                        <li><a href="{{ route('show_clients_by_category', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
            </div>
        </nav>
    </div>
</header>