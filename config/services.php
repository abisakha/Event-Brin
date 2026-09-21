<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'sso' => [
        'client_id'     => env('OAUTH2_CLIENT_ID'),
        'client_secret' => env('OAUTH2_CLIENT_SECRET'),
        'redirect'      => env('OAUTH2_URL_REDIRECT_URI'),
        'authorize_url' => env('OAUTH2_URL_AUTHORIZE'),
        'token_url'    => env('OAUTH2_URL_ACCESSTOKEN'),
        'userinfo_url' => env('OAUTH2_URL_USERINFO'),
        'logout_url'   => env('OAUTH2_URL_LOGOUT'),
    ],

];
