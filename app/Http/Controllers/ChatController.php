<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use Redis;
class ChatController extends Controller
{
    public function index(){
        return view('users.group_message');
    }

    public function sendMessage(Request $request ){
        Message::create([
            'content' => $request->message,
            'user_id' => $request->user_id,
            'is_public' => config('settings.message.group')
        ])->save();

        $redis = Redis::connection();

        $data = [
            'message' => $request->message,
            'user_name' => $request->user_name,
            'user_id' => $request->user_id,
        ];
        $redis->publish('message', json_encode($data));

        return response()->json([]);
    }

    public function getOldMessages(Request $request){
        $messages = Message::where('is_public', $request->is_public)
        ->orderBy('created_at', 'desc')
        ->limit(config('settings.paginate.messages'))
        ->with('sender')
        ->get();
    return response()->json($messages);
    }
}
