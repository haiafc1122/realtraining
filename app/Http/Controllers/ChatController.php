<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\MessageToSupporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Redis;
class ChatController extends Controller
{
    public function index()
    {
        return view('users.group_message');
    }

    public function getChat()
    {
        $cookie_val = Cookie::get('logged_user');
        //dd($cookie);

        return view('users.private_message', compact('cookie_val'));
    }

    public function sendMessage(Request $request )
    {

        $message = (new Message())->create([
            'content' => $request->message,
            'user_id' => $request->user_id,
            'is_public' => $request->is_public
        ]);

        if (!$request->is_public == config('settings.message.group')){
            MessageToSupporter::create([
                'user_id' => $request->receiverUser,
                'message_id' => $message->id
            ]);
        } else {
            $redis = Redis::connection();

            $data = [
                'message' => $request->message,
                'user_name' => $request->user_name,
                'user_id' => $request->user_id,
            ];
            $redis->publish('message', json_encode($data));
        }

        return response()->json([]);
    }

    public function getOldMessages(Request $request)
    {
        if ($request->is_public == config('settings.message.group')){
            $messages = Message::where('is_public', $request->is_public)
                ->orderBy('created_at', 'desc')
                ->limit(config('settings.paginate.messages'))
                ->with('sender')
                ->get();
            return response()->json($messages);
        } else {
            $messages = Message::where('is_public', '=', $request->is_public)
                ->where(function ($query) use ($request) {
                    $query->whereHas('messageToUser', function ($query) use ($request) {
                        $query->where('user_id', '=', $request->receiverUser);
                    })
                    ->where('user_id', '=', $request->user_id);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->whereHas('messageToUser', function ($query) use ($request) {
                        $query->where('user_id', '=', $request->user_id);
                    })
                        ->where('user_id', '=', $request->receiverUser);
                })
                ->orderBy('created_at', 'desc')
                ->limit(config('settings.paginate.messages'))
                ->with('sender')
                ->with('messageToUser')
                ->get();
            return response()->json($messages);
        }
    }
}
