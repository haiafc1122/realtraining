<div class="card-panel" id="search">
    <section id="intro" class="section-intro">
        <div class="overlay">
            <div class="container">
                <div class="main-text">
                    <div class="row search-bar">
                        <div class="col-lg-offset-2">
                            <form class="search-form" method="get" action="{{ route('search.clients') }}">
                                <div class="col-md-6 col-sm-6 search-col">
                                    <div class="form-group is-empty">
                                        <input class="form-control keyword" name="keyword" @if (!empty($keyword)) value="{{ $keyword }}" @endif placeholder=" 検索 " type="text">
                                        <span class="material-input"></span>
                                    </div>
                                    <i class="fa fa-search"></i>
                                </div>
                                <div class="col-md-3 col-sm-6 search-col">
                                    <button type="submit" class="btn btn-common btn-search btn-block"><strong>検索</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
