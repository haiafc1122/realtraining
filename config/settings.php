<?php
return [
    'paginate'=>[
        'categories'=> 10,
        'users'     => 10,
        'clients'   => 10,
        'actions'   => 10,
        'admin'     => [
          'clients' => 15,
        ],
        'contact'   => 10
    ],
    'user'=>[
        'active_true'  =>1,
        'active_false' =>0,
    ],
    'category'=>[
        'use_often'  => 1,
    ],
    'contact' => [
        'checked' => 1,
        'uncheck' => 0
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
        ],
        'toggle' => [
            'approval' => [
                'started' => '承認',
                'approval'=> '--',
            ],
            'reject' => [
                'started' => '却下',
                'reject'=> '--',
            ]
        ]
    ]
];