<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Turnstile Keys
    |--------------------------------------------------------------------------
    |
    | This value is the site, and the secret key of your application, after creating an application
    | with Cloudflare turnstile, copy the site key, and use it here, or in the .env
    | file.
    | Note that the secret key should not be publicly accessible.
    |
    | @see: https://developers.cloudflare.com/turnstile/get-started/#get-a-sitekey-and-secret-key
    |
    */
    'turnstile_site_key' => '0x4AAAAAAA0g_o6AFPXo2N78',

    'turnstile_secret_key' => '0x4AAAAAAA0g_gKqXseEeGPcrrhirLhZHeE',

    /*
    |--------------------------------------------------------------------------
    | Error Messages
    |--------------------------------------------------------------------------
    |
    | Here you can find the error messages for the application. You can modify
    | or translate the error message as you like.
    |
    | Note that you can translate the error message directly, without wrapping
    | them in translate helper.
    |
    */
    'error_messages' => [
        'turnstile_check_message' => 'The CAPTCHA thinks you are a robot! Please refresh and try again.',
    ],
];
