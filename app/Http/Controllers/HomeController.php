<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $client_use_oftens = $categories->where('id', config('settings.category.use_often'))->first()->clients;
        return view('homes.index', compact(['categories', 'clients', 'client_use_oftens']));
    }

    public function showClientByCategory(Category $category)
    {
        $categories = Category::all();
        $clients = $category->clients()->paginate(config('settings.paginate.clients'));
        return view('homes.show_client_by_category', compact(['clients', 'category','categories']));

    }


}
