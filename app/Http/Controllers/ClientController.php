<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if ( !$client->use_possible()) {
            return back()->with('error', 'この案件はすでに無効になりました！利用できなくなります！');
        }

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
    public function searchClient(Request $request)
    {
        $this->validate($request,['keyword'=>'required']);
        $categories = Category::all();
        $keyword = $request->keyword;
        $clients = Client::search($keyword)->paginate(config('settings.paginate.clients'));

        return view('clients.search', compact(['clients', 'categories', 'keyword']));
    }

}
