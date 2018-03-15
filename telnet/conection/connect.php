<?php
require("PHPTelnet.php");

$ip = "192.168.1.1";
$username = "yuswa";
$password = "password";

$API = new PHPTelnet();

$conn = $API->Connect($ip, $username, $password);
if ($conn == 0){
    $API->DoCommand('reboot', $conn);
    echo $conn;
}