<?php

namespace App\Http\Controllers;

use App\Models\UserPoint;
use App\Models\Client;
use App\Models\Category;
use Auth;

class ClientController extends Controller
{
    public function show(Client $client)
    {
        $categories = Category::all();
        return view('clients.show', compact(['client', 'categories']));
    }

    public function actionClient(Client $client)
    {

            $user = Auth::user();
            $user->actions()->create([
                'client_id' => $client->id,
                'point'     => $client->get_active_points(),
                'state'     => 'started',
            ]);

            if (!$user->userPoint()->lockForUpdate()->first()){
                UserPoint::create(['user_id'=> $user->id])->save();
            }
            $user_point = $user->userPoint()->lockForUpdate()->first();

            $user_point->update([
                'pending_point' => ($user_point->pending_point + $client->get_active_points())
            ]);

        return redirect($client->url);
    }
}
