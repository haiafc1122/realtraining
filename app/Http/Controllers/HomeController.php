<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $now = Carbon::now();
        $categories = Category::all();
        if ($categories->where('id', config('settings.category.use_often'))->count()== 1){
            $whereData = [
                ['category_id', config('settings.category.use_often')],
                ['started_date', '<=', $now],
                ['end_date', '>=', $now],
                ['is_active', '=', config('settings.client.active_true')]
            ];
            $client_use_oftens =  Client::where($whereData)->get();
        }

        if ($categories->where('id', config('settings.category.campaign'))->count() == 1){
            $whereData = [
                ['category_id', config('settings.category.campaign')],
                ['started_date', '<=', $now],
                ['end_date', '>=', $now],
                ['is_active', '=', config('settings.client.active_true')]
            ];
            $campaigns = Client::where($whereData)->limit(3)->get();
        }
        return view('homes.index', compact(['categories', 'clients', 'client_use_oftens', 'campaigns']));



    }

    public function showClientByCategory(Category $category)
    {
        $whereData = [
            ['started_date', '<=', $now],
            ['end_date', '>=', $now],
            ['is_active', '=', config('settings.client.active_true')]
        ];
        $categories = Category::all();
        $clients = $category
            ->clients()
            ->where($whereData)
            ->paginate(config('settings.paginate.clients'));
        return view('homes.show_client_by_category', compact(['clients', 'category','categories']));

    }


}
