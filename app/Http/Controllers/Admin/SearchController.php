<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchClient(Request $request)
    {
        $this->validate($request,['keyword'=>'required']);
        $categories = Category::all();
        $keyword = $request->keyword;
        $clients = Client::search($keyword)->paginate(config('settings.paginate.clients'));

        return view('admin.client.search', compact(['clients', 'categories', 'keyword']));
    }
}
