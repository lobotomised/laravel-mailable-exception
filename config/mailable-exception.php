<?php

return [
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],
    'to' => [
        'address' => 'your@example.com',
    ],
    'subject' => "An exception has occurred",
    'allowed_environments' => ['production'],
];
