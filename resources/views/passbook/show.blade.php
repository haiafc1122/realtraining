@extends('layouts.master')
@section('main')
    <div id="content">
        <div class="container">
            <div class="row"></div>
            <div class="row">
                <table class="col-lg-offset-1 col-md-10 striped">
                    <thead class="cf">
                        <tr>
                            <th class="col-md-2">利用日</th>
                            <th class="col-md-7">内容</th>
                            <th class="col-md-1">状態</th>
                            <th class="col-md-2">ポイント数</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (sizeof($actions) > 0)
                            @foreach ($actions as $action)
                                <tr>
                                    <td>{{ $action->created_at }}</td>
                                    <td>{{ $action->client->title }}</td>
                                    <td class="{{ $action->state }}">{{ $action->show_status() }}</td>
                                    <td>{{ $action->point }}</td>
                                </tr>
                            @endforeach
                        @else
                            該当の履歴がありません
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-center" >
                {{ $actions->links() }}
            </div>
        </div>
    </div>
@endsection
@section('bottom_js')
    <script>
        $(document).ready(function () {
            if ($("body").hasScrollBar()) {
                $("#bottom").addClass("footer-fix");
            }
        });

        (function($) {
            $.fn.hasScrollBar = function() {
                return this.get(0).scrollHeight > this.height();
            }
        })(jQuery);
    </script>
@endsection


