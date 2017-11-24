<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\ClientCreateRequest;

/*
 * 管理者がクライアントさんの案件　閲覧、作成、編集,削除
 */
class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(config('settings.paginate.clients'));
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.Client.create');
    }

    public function store(ClientCreateRequest $request)
    {
        $client = new Client();
        $client->fill($request->all())->save();
        return redirect('admin/client')->with('success', '作成しました');
    }

    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(ClientCreateRequest $request, Client $client)
    {
        $client->fill($request->all())->save();
        return redirect('/admin/client')->with('success', '更新しました');
    }

    public function destroy(client $client)
    {
        $client->delete();
        return redirect('/admin/client')->with('success', '削除しました!');
    }

}
