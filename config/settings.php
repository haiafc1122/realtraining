<?php
return [
    'paginate'=>[
        'categories'=> 10,
        'users'     => 10,
        'clients'   => 10,
        'actions'   => 9,
        'admin'     => [
          'clients' => 15,
        ],
        'contact'   => 10,
        'messages'  => 30
    ],
    'user'=>[
        'active_true'  =>1,
        'active_false' =>0,
        'status' =>[
            1 => 'アクティブ',
            0 => '非アクティブ'
        ]
    ],
    'category'=>[
        'use_often'  => 1,
        'campaign'    => 2
    ],
    'contact' => [
        'checked' => 1,
        'uncheck' => 0
    ],
    'message' => [
        'group' => 1,
    ],
    'action' => [
        'state' => [
            'started' => '判定中',
            'approval' => '承認',
            'reject' => '却下'
        ],
        'status' => [
            'pending' => 'started',
            'approval'=> 'approval',
            'reject'  => 'reject'
        ]
    ],
    'client'=>[
        'active_true'  =>1,
        'active_false' =>0,
        'status' =>[
            1 => 'Active',
            0 => 'Inactive'
        ]
    ]
];