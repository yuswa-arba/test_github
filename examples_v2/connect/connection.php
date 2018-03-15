<?php
require("routeros_api.class.php");

$ip = "192.168.1.1";
$username = "yuswa";
$password = "password";

$API = new routeros_api();
$API->debug = false;

$conn = $API->connect($ip, $username, $password);
if ($conn){
    return $API;
}