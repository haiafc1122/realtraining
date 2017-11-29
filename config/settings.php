<?php
return [
    'paginate'=>[
        'categories'=> 10,
        'users'     => 10,
        'clients'   => 10,
        'actions'   => 10,
    ],
    'user'=>[
        'active_true'  =>1,
        'active_false' =>0,
    ],
    'category'=>[
        'use_often'  => 1,
    ],
    'action' => [
        'state' => [
            'started' => '判定中',
            'approval' => '承認',
            'reject' => '却下'
        ]

    ]
];