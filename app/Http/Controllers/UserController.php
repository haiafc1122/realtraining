<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserInfoRequest;
use Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    public function update(UpdateUserInfoRequest $request)
    {
        Auth::user()->fill($request->all())->save();

        return back()->with('success', '情報がアップデートされました');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        if (Auth::attempt(['email' => $user->email, 'password' => $request->old_password])) {
            $user->update([
                'password'  => bcrypt($request->password),
            ]);

            return back()->with('success', 'パスワードがアップデートされました');
        }

        return back()->with('error', '現在のパスワードを正しく入力してください！');
    }

    public function showPassbook()
    {
        $user = Auth::user();
        $actions = $user->actions()->paginate(config('settings.paginate.actions'));
        return view('passbook.show', compact(['actions', 'user']));
    }

}
