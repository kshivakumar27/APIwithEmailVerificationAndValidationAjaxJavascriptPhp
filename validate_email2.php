<?php

$userEmail = $_GET['userEmail'];

if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
    
    exit("invalid format");
    
}

$api_key = "";

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.quickemailverification.com/v1/verify?email=$userEmail&apikey=$api_key",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);


print_r($data);
print_r($response);


//echo "email address is valid";

 //$decode=json_decode($data);

?>