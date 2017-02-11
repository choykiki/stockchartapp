<?php
$access_token = 'R7TGOxYe/8F5zt9sUFCnxcS/9GWoEWVuWJ/LamaejZnU7YgI4oK57XALFznSJ5u6vxb6i8h+7MY9Lrcbi8VZ3ycbQI1wHPNTiuYj2uFlOfHeJeYGfBPunxkiqx2Hd+Dsfo2xB6p5hv8sDqkuxAZ9xAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;