<?php


namespace App\Helpers;
use Twilio\Rest\Client;

class SMSHelper
{
    public static function send($contact, $message)
    {
        $client = new Client(env('TWILIO_SID', 'AC91616ae9a37cf5253a01b9d6bc0eb045'), env('TWILIO_AUTH_TOKEN'));
        return $client->messages->create("+225".$contact, [
            "body"=>$message,
            "from"=>env('TWILIO_NUMBER')
        ]);
    }
}
