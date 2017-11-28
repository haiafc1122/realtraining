<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Category;
class ClientController extends Controller
{
    public function show(Client $client)
    {
        $categories = Category::all();
        return view('clients.show', compact(['client', 'categories']));
    }
}
