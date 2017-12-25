<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Cookie;
use Auth;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cookie_val = Cookie::get('logged_user');
        $user_id = Auth::user()->id;
        $categories = Category::all();
        if ($categories->where('id', config('settings.category.use_often'))->first()){
            $client_use_oftens = $categories->where('id', config('settings.category.use_often'))->first()->clients;
        }

        if ($categories->where('id', config('settings.category.campaign'))->first()){
            $campaigns = $categories->where('id', config('settings.category.campaign'))->first()->clients;
        }
        return view('homes.index', compact(['categories', 'clients', 'client_use_oftens', 'campaigns','user_id']));



    }

    public function showClientByCategory(Category $category)
    {
        $categories = Category::all();
        $clients = $category->clients()->paginate(config('settings.paginate.clients'));
        return view('homes.show_client_by_category', compact(['clients', 'category','categories']));

    }


}
