<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default guard
    |--------------------------------------------------------------------------
    |
    | This is the default guard that Spatie will use when assigning
    | and checking roles/permissions if you don’t specify one.
    |
    */
    'default_guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Guards
    |--------------------------------------------------------------------------
    |
    | These must match the guards you defined in config/auth.php.
    | Example: web (browser sessions), api (Laravel Sanctum for SPA/mobile).
    |
    */
    'guards' => ['web', 'api'],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | You can override the default models for Role and Permission here.
    |
    */
    'models' => [
        'permission' => Spatie\Permission\Models\Permission::class,
        'role'       => Spatie\Permission\Models\Role::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Table names
    |--------------------------------------------------------------------------
    |
    | Tables used by Spatie Permission. You can rename them if needed,
    | but you must also update the migrations if you change these.
    |
    */
    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Column names
    |--------------------------------------------------------------------------
    |
    | Define the column name for storing model IDs. Defaults to "model_id".
    |
    */
    'column_names' => [
        'model_morph_key' => 'model_id',
    ],

    /*
    |--------------------------------------------------------------------------
    | Teams (Multi-tenancy)
    |--------------------------------------------------------------------------
    |
    | Set this to true if you want roles/permissions scoped per team/tenant.
    |
    */
    'teams' => false,

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Spatie caches role/permission lookups for performance.
    |
    */
    'cache' => [
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'store' => 'default',
    ],
];
