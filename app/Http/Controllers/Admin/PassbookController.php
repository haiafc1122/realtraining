<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
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
            $action->state = config('settings.action.status.approval');
            $action->update();
            DB::transaction(function () use ($action){

                    $user_point = $action->user->userPoint->lockForUpdate()->first();
                    $user_point->update([
                        'approval_point' => ($user_point->approval_point + $action->point),
                        'pending_point' => ($user_point->pending_point - $action->point),
                    ]);
            });
            return redirect()->back()->with('success', 'アクションが有効とマークしました');

        }
    }

    public function reject(Action $action)
    {
        if ($action->state == config('settings.action.status.pending'))
        {
            $action->state = config('settings.action.status.reject');
            $action->update();
            DB::transaction(function () use ($action){

                $user_point = $action->user->userPoint->lockForUpdate()->first();
                $user_point->update([
                    'pending_point' => ($user_point->pending_point - $action->point),
                ]);
            });
            return redirect()->back()->with('success', 'アクションが無効とマークしました');

        }
    }
}
