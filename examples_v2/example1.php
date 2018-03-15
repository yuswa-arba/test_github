<?php

require('connect/routeros_api.class.php');

$API2 = new routeros_api();
$API2->debug = false;

//step2
if ($API2->connect('192.168.1.1', 'yuswa', 'password')) {

   $API2->write('/ip/address/print');
   
  
   $READ = $API2->read(false);
   $ARRAY = $API2->parseResponse($READ);
   
   echo "<pre>";
   print_r($ARRAY);
   echo "</pre>";
   
   $API2->write('/ip/dhcp-server/lease/print');
   $READ = $API2->read(false);
   $ARRAY = $API2->parseResponse($READ);
   echo "<pre>";
   print_r($ARRAY);
   echo "</pre>";
   
   $API2->write('/interface/pppoe-client/print');
   $READ = $API2->read(false);
   $ARRAY = $API2->parseResponse($READ);
   
   echo 'id pppoe-client = '.$ARRAY[0][".id"];

   $API2->write('/ping', false);
   $API2->write('=address=192.168.5.1', false);
   $API2->write('=count=5');

   $READ = $API2->read(false);
   $ARRAY = $API2->parseResponse($READ);
   echo "<pre>";
   print_r($ARRAY);
   echo "</pre>";

    $API2->write('/ip/address/print');


    $READ = $API2->read(false);
    $ARRAY = $API2->parseResponse($READ);

    echo "<pre>";
    print_r($ARRAY);
    echo "</pre>";

    $API2->write('/ip/address/disable', false);
    $API2->write("=.id=192.168.1.2");


    $READ = $API2->read(false);
    $ARRAY = $API2->parseResponse($READ);

    echo "<pre>";
    print_r($ARRAY);
    echo "</pre>";

    $API2->write('/ip/dhcp-server/lease/print');


    $READ = $API2->read(false);
    $ARRAY = $API2->parseResponse($READ);

    echo "<pre>";
    print_r($ARRAY);
    echo "</pre>";

    $API2->disconnect();
   
   

}
