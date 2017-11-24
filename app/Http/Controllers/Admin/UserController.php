<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(config('settings.paginate.users'));
        return view('admin.user.index', compact('users'));
    }

    public function toggle_active_status(User $user)
    {
        if ($user->is_active == config('settings.user.active_true'))
        {
            $user->is_active = config('settings.user.active_false');
            $user->update();
            return redirect()->back()->with('success', 'ユーザーが無効とマークしました');
        } else {
            $user->is_active = config('settings.user.active_true');
            $user->update();
            return redirect()->back()->with('success', 'ユーザーが有効とマークしました');
        }
    }

}
