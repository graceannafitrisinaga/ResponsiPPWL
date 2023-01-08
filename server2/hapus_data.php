<?php
$id = $_POST['id'];

//uri untuk mengakses webhservice
try {
    $opt = [
        "location" => "http://www.server1.com/soapServer.php",
        "uri" => "http://www.server1.com/", "trace" => 1
    ];

    //membaca API
    $api = new SoapClient(NULL, $opt);

    $komen = $api->hapusData($id);
} catch (SoapFault $ex) {
    echo $api->__getLastResponse();
}

echo '<script type="text/javascript">
alert("Data berhasil dihapus!");
location="index.php";
</script>';
