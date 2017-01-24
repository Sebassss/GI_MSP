<?php


require_once( 'vendor/autoload.php' );
use GuzzleHttp\Client;



$apiKey = '251753439:AAHcySu-8c062FLT7cq2ovx7JdUrpb4418E'; // Put your bot's API key here
$apiURL = "https://api.telegram.org/bot".$apiKey."/";



# The chat_id variable will be provided in the getUpdates result
$url = 'https://api.telegram.org/bot' . $apiKey . '/sendMessage?text=message&chat_id=0';
echo $url;
$result = file_get_contents($url);
$result = json_decode($result, true);

var_dump($result['result']);

?>