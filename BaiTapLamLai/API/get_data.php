<?php

// Lay IP cua User
function getUserIP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('HTTP_X_FORWARDED')) {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    } else if (getenv('HTTP_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    } else if (getenv('HTTP_FORWARDED')) {
        $ipaddress = getenv('HTTP_FORWARDED');
    } else if (getenv('REMOTE_ADDR')) {
        $ipaddress = getenv('REMOTE_ADDR');
    } else {
        $ipaddress = 'UNKNOWN';
    }
    
    return $ipaddress;
}
 
//Lay chuoi Json tu server
function sendJsontoServer() {
    // $userIP = getUserIP();
    $userIP="2001:ee0:4baa:5f10:55de:294:f2de:220";
    $access_key = "?access_key=b441c8730ea0df84b0d9c7c6b3af18b2";
    $array_json = "http://api.ipstack.com/" . $userIP . $access_key;
    $array_json = "http://api.ipstack.com/" . $userIP . $access_key;

    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    
    return $obj;
    
}

function getCurrentData($region, $coutry_name, $access_key) {
    $location = $region . "," . $coutry_name . "&units=metric";
    $array_json = "http://api.openweathermap.org/data/2.5/weather?q=" . $location . $access_key;
    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    
    return $obj;
}

function getForcast($city_id, $access_key) {
    $array_json = "http://api.openweathermap.org/data/2.5/forecast?id=" . $city_id . "&units=metric" . $access_key;
    $json = file_get_contents($array_json);
    $obj = json_decode($json);
    
    return $obj;
}
