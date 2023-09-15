<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAADrZV4-Y:APA91bFixmJZ-a9XfU9Ct_fg-JClL2X-YN4lx4k4tC_8qZyFdOsrLqlgjegVonHArh1iIGakeRLtwCAvoQKhnhNhaXNuDYZkVTgogk5z6osgkRnmLzW-i3lr4pWGFiuItWJ005wLbDGP'),
        'sender_id' => env('FCM_SENDER_ID', '63188624358'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
