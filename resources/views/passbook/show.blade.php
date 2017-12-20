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
                                    <td>
                                        <a target="_blank" href="{{ route('client.show', $action->client->id) }}"
                                           class="teal-text text-darken-1"><strong>{{ $action->client->title }}</strong></a>
                                    </td>
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


