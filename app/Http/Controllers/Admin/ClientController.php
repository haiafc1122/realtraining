<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
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
        $clients = Client::orderBy('id', 'desc')->paginate(config('settings.paginate.clients'));
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.Client.create',compact('categories'));
    }

    public function store(ClientCreateRequest $request)
    {
        $client = new Client();
        $client->fill($request->all())->save();
        return redirect('admin/clients')->with('success', '作成しました');
    }

    public function edit(Client $client)
    {
        $categories = Category::all();

        return view('admin.client.edit', compact(['client', 'categories']));
    }

    public function update(ClientCreateRequest $request, Client $client)
    {
        $client->fill($request->all())->save();
        return redirect('/admin/clients')->with('success', '更新しました');
    }

    public function destroy(client $client)
    {
        $client->delete();
        return redirect('/admin/clients')->with('success', '削除しました!');
    }

    public function show(Client $client)
    {
        $categories = Category::all();
        return view('admin.client.show', compact(['client', 'categories']));
    }

}
