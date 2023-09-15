<?php

return [
    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'requests' => 'c,r,u,d',
            'items' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'logs' => 'c,r,u,d',
            'hse_manager' => 'r,u',
            'it_manager' => 'r,u',
            'stock_manager' => 'r,u',
            'asset_manager' => 'r,u',
            'cost_control_manager' => 'r,u',
            'commercial_sector_manager' => 'r,u',
            'general_manager_notes' => 'r,u',
            'cto_manager_notes' => 'r,u',
            'signature_notes' => 'r,u',
            'stock_manager_notes' => 'r,u',
            'asset_manager_notes' => 'r,u',

        ],



    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
