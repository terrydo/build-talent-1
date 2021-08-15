<?php

return [
    'course' => [
        'private' => 0,
        'public' => 1,
        'paginate' => 20,
        'price' => [
            'free' => 0,
            'paid' => 1,
        ],
    ],
    'payment_method' => [
        'banking' => 0,
    ],
    'payment_status' => [
        'pending' => 0,
        'complete' => 1,
        'reject' => 2,
    ],
];
