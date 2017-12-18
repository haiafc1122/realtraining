<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $currentMonth = $now->month;

        //今月のアクションしたクライアント（案件)
        $currentMonthActions = Action::whereMonth('created_at', '=', $currentMonth)->get();
        $currentMonthClientArr = $this->getClientArr($currentMonthActions);

        //今月のアクションしたクライアント（案件）の平均
        $currentMonthAvgRate = round($currentMonthClientArr->avg('rate'));

        // 今月の新規ユーザー数
        $numOfCurrentMonthUsers = User::whereMonth('created_at', '=', $currentMonth)->count();

        //今月の新規クライアント数
        $numOfCurrentMonthClients = Client::whereMonth('created_at', '=', $currentMonth)->count();

        //今月の問い合わせを対応した数
        $numOfCurrentMonthContactCheck = Contact::whereMonth('created_at', $currentMonth)
                                                         ->where('checked', config('settings.contact.checked'))
                                                         ->count();
        //今月の問い合わせをまだ対応しない数
        $numOfCurrentMonthContactUncheck = Contact::whereMonth('created_at', $currentMonth)
                                                           ->where('checked', config('settings.contact.uncheck'))
                                                           ->count();

        //全部
        $actions = Action::all();
        $ClientArr = $this->getClientArr($actions);
        $actionAvgRate = round($ClientArr->avg('rate'));

        $numOfUsers = User::count();
        $numOfClients = Client::count();
        $numOfContactChecked = Contact::where('checked', config('settings.contact.checked'))->count();
        $numOfContactUncheck = Contact::where('checked', config('settings.contact.uncheck'))->count();

        // グループのメッセージ
        $numOfCurrentMonthmessages = Message::count();

        $last_month =Carbon::now()->startOfMonth()->subMonth()->month;
        $last_month_messages = Message::whereMonth('created_at', $last_month)->count();

        return view('admin.dashboard', compact([
            'currentMonthAvgRate',
            'numOfCurrentMonthUsers',
            'numOfCurrentMonthClients',
            'numOfCurrentMonthContactCheck',
            'numOfCurrentMonthContactUncheck',
            'numOfCurrentMonthmessages',
            'last_month_messages',
            'actionAvgRate',
            'numOfUsers',
            'numOfClients',
            'numOfContactChecked',
            'numOfContactUncheck'
        ]));
    }



    private function getClientArr($actions)
    {
        $clientArr = [];
        foreach ($actions as $action){
            $clientArr = $action->client;
        }
        return $clientArr;
    }


}
