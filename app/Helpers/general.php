<?php
use Illuminate\Support\Facades\Http;

define('PAGINATION_COUNT', 10);

function getFolder()
{

    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

if (!function_exists('upload_file')) {
    function upload_file($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/" . $imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}

if (!function_exists('random4DigitNumberGenerator')) {
    function random4DigitNumberGenerator()
    {
        $digits = 10;
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while ($i < $digits) {
            //generate a random number between 0 and 9.
            $pin .= mt_rand(1, 9);
            $i++;
        }
        return $pin;
    }
}

if (!function_exists('sendFirebaseNotification')) {
    function sendFirebaseNotification($token, $title, $body)
    {
        $serverKey = config('services.firebase.server_key'); // Set this in .env and config/services.php

        Http::withHeaders([
            'Authorization' => 'key=' . $serverKey,
            'Content-Type'  => 'application/json',
        ])->post('https://fcm.googleapis.com/fcm/send', [
            'to' => $token,
            'notification' => [
                'title' => $title,
                'body'  => $body,
                'sound' => 'default',
            ],
            'priority' => 'high',
        ]);
    }
}
