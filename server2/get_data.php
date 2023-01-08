<?php
//uri untuk mengakses webhservice
$opt = [
    "location" => "http://www.server1.com/soapServer.php",
    "uri" => "http://www.server1.com/", "trace" => 1
];
//membaca API
$api = new SoapClient(NULL, $opt);
$h = $api->ambilData();
echo $h;

$db1->close();
