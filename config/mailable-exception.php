<?php

return [
    'to' => [
        'address' => 'your@example.com', // Fill in the email address that should receive the exceptions.
    ],
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],
    'subject' => 'An exception has occurred',
    'allowed_environments' => ['production'],
];
