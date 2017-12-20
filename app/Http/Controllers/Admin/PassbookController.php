<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\UserPoint;
use DB;

class PassbookController extends Controller
{
    public function index()
    {
        $actions = Action::orderBy('created_at', 'desc')->paginate(config('settings.paginate.admin.clients'));
        return view('admin.passbook.index', compact('actions'));
    }
    public function approval(Action $action)
    {
        if ($action->state == config('settings.action.status.pending'))
        {

            DB::transaction(function () use ($action){
                $action->state = config('settings.action.status.approval');
                $action->update();
                $user_point = UserPoint::where('user_id', $action->user_id)->lockForUpdate()->first();
                $user_point->update([
                        'approval_point' => ($user_point->approval_point + $action->point),
                        'pending_point' => ($user_point->pending_point - $action->point)
                    ]);
            });
            return redirect()->back()->with('success', 'アクションを有効とマークしました');

        }
    }

    public function reject(Action $action)
    {
        if ($action->state == config('settings.action.status.pending'))
        {
            DB::transaction(function () use ($action){
                $action->state = config('settings.action.status.reject');
                $action->update();
                $user_point = UserPoint::where('user_id', $action->user->id)->lockForUpdate()->first();
                $user_point->update([
                    'pending_point' => ($user_point->pending_point - $action->point),
                ]);
            });
            return redirect()->back()->with('success', 'アクションを無効とマークしました');

        }
    }
}
