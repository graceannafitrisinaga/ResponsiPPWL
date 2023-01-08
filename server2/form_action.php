<?php
include 'koneksi.php';

$id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));
$nama_mahasiswa = stripslashes(strip_tags(htmlspecialchars($_POST['nama_mahasiswa'], ENT_QUOTES)));
$jenkel = stripslashes(strip_tags(htmlspecialchars($_POST['jenkel'], ENT_QUOTES)));
$alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
$jurusan = stripslashes(strip_tags(htmlspecialchars($_POST['jurusan'], ENT_QUOTES)));
$tanggal_masuk = stripslashes(strip_tags(htmlspecialchars($_POST['tanggal_masuk'], ENT_QUOTES)));

if ($id == "") {
	try {
		$opt = [
			"location" => "http://www.server1.com/soapServer.php",
			"uri" => "http://www.server1.com/", "trace" => 1
		];

		//membaca API
		$api = new SoapClient(NULL, $opt);

		$komen = $api->tambahData($nama_mahasiswa, $alamat, $jenkel, $tanggal_masuk, $jurusan);
	} catch (SoapFault $ex) {
		echo $api->__getLastResponse();
	}
} else {
	try {
		$opt = [
			"location" => "http://www.server1.com/soapServer.php",
			"uri" => "http://www.server1.com/", "trace" => 1
		];

		//membaca API
		$api = new SoapClient(NULL, $opt);

		$komen = $api->updateData($id, $nama_mahasiswa, $alamat, $jenkel, $tanggal_masuk, $jurusan);
	} catch (SoapFault $ex) {
		echo $api->__getLastResponse();
	}
}


echo json_encode(['success' => 'Sukses']);
