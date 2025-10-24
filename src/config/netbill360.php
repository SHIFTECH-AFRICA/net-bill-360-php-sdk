<?php

/**
 * ------------------------------------
 * Define all the request options here
 * ------------------------------------
 */
return [
    /**
     * --------------------------------------------------------------
     * set the base endpoint and urls here https://netbill360.com/
     * --------------------------------------------------------------
     */
    'url' => [
        'endpoint' => env('NET_BILL_360_BASE_URI', 'https://api.netbill360.com/api/v1/'),

        'users' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{account}',    // requires account
            'update' => 'update/{account}',  // requires account
            'delete' => 'delete/{account}',  // requires account
            'restore' => 'restore/{account}', // requires account
        ],

        'nas' => [
            'types' => 'types',
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{id}',
            'update' => 'update/{id}',
            'delete' => 'delete/{id}',
        ],

        'wire-guards' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{id}',
            'status' => 'show/{id}',
            'update' => 'update/{id}',
            'delete' => 'delete/{id}',
        ],

        'wire-guard-peers' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{id}',
            'config' => 'config/{id}',
            'update' => 'update/{id}',
            'delete' => 'delete/{id}',
        ],

        'customers' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{username}', // uses username not ID
            'delete' => 'delete/{username}', // uses username not ID
            'update' => 'update',
        ],

        'subscriptions' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{username}',
            'update' => 'update',
        ],

        'plans' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{id}',
            'update' => 'update/{id}',
            'delete' => 'delete/{id}',
        ],

        'pools' => [
            'index' => 'index',
            'show' => 'show/{id}',
        ],

        'tokens' => [
            'index' => 'index',
            'store' => 'store',
            'show' => 'show/{account}',
            'delete' => 'delete/{account}',
        ],
    ],

    /**
     * ---------------------------------------------------------------
     * Set the account username, this is for applicable for super user
     * ---------------------------------------------------------------
     */
    'net_bill_360_username' => env('NET_BILL_360_USERNAME', 'netbill360'),

    /**
     * ---------------------------------------------------------------
     * Set the account password, this is for applicable for super user
     * ---------------------------------------------------------------
     */
    'net_bill_360_password' => env('NET_BILL_360_PASSWORD', 'secret'),

    /**
     * ---------------------------------------------------------------
     * This should be the api account token that is generated in the
     * account.
     * ---------------------------------------------------------------
     */
    'net_bill_360_token' => env('NET_BILL_360_API_TOKEN', 'bm9kZTw+c2VjcmV0'),

    /**
     * ---------------------------------------------------------------------------------------------------
     * The timeout is the time given for the response to be given if no response is given
     * in 60 seconds the request is dropped.
     * You are free to set your timeout
     * ---------------------------------------------------------------------------------------------------
     */
    'timeout' => env('TIMEOUT', 60), // Response timeout 60sec

    /**
     * ---------------------------------------------------------------------------------------------------
     * The connection timeout is the time given for the request to acquire full connection to the
     * end point url. So if not connection is made in 60 seconds the request is dropped.
     * Your free to set your own connection timeout.
     * ---------------------------------------------------------------------------------------------------
     */
    'connect_timeout' => env('CONNECTION_TIMEOUT', 60), // Connection timeout 60sec
];
