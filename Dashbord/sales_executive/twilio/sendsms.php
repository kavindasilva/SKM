<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC27ec15f6dd1fbe339717aa2204e6ef23';
$token = '8f4c16c23d190278ed5b0a05e2bce4f1';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+94771567974',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+17205718239 ',
        // the body of the text message you'd like to send
        'body' => 'We have replied to your quotation request. please login to your Dunlop account for more details.Thank You'
    )
);

?>