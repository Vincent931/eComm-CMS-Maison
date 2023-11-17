<?php
$url = 'https://www.wsj.com/market-data/quotes/fx/EURUSD';
//  Initiate curl
     $ch = curl_init();

// Will return the response, if false it print the response
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the url
     curl_setopt($ch, CURLOPT_URL,$url);

// Execute
     $result=curl_exec($ch);

// Closing
     curl_close($ch);

var_dump($result);



?>