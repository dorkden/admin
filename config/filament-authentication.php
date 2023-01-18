<?php

use App\Models\User;
use Phpsa\FilamentAuthentication\Pages\Profile;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return [
    'models' => [
        'User'       => User::class,
        'Role'       => Role::class,
        'Permission' => Permission::class,
    ],
    'resources'     => [

    ],
    'pages'         => [
        'Profile' => Profile::class
    ],
    'Widgets'       => [
        'LatestUsers' => [
            'enabled' => false,
            'limit'   => 5,
            'sort'    => 0
        ],
    ],
    'preload_roles' => true,
    'impersonate'   => [
        'enabled'  => true,
        'guard'    => 'web',
        'redirect' => '/'
    ]
];
