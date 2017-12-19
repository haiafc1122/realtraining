<a href="#top"><img src="{{ asset('images/topup.png') }}" class="img_fixed hide-on-small-only"></a>
<footer>
    <div class="container">
        <ul>
            @if(Auth::user())
                <li><a class="white-text tooltipped" data-position="top" data-delay="50" data-tooltip="皆さんと話しましょう" href="{{ route('group.chat') }}"><i class="material-icons">group_add</i>グループ相談</a></li>
            @endif
                <li><a class="white-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="質問しましょう" href="{{ route('contact.create') }}"><i class="tiny material-icons">email</i> 問い合わせ</a></li>
        </ul>
    </div>
</footer>
