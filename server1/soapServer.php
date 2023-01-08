<?php
class Service1
{
    public function ambilData()
    {
        $koneksi = new mysqli('localhost', 'root', '', 'mahasiswa');
        $hasil = $koneksi->query("SELECT * FROM tbl_mahasiswa ORDER BY id DESC");
        while ($rows = $hasil->fetch_array()) {
            $return_brg[] = array(
                'id' => $rows['id'],
                'nama_mahasiswa' => $rows['nama_mahasiswa'],
                'alamat' => $rows['alamat'],
                'jenis_kelamin' => $rows['jenis_kelamin'],
                'tgl_masuk' => $rows['tgl_masuk'],
                'jurusan' => $rows['jurusan'],
            );
        }
        return json_encode($return_brg);
    }

    function tambahData($nama_mahasiswa, $alamat, $jenis_kelamin, $tgl_masuk, $jurusan)
    {
        $koneksi = new mysqli('localhost', 'root', '', 'mahasiswa');
        $sql = "INSERT INTO tbl_mahasiswa(nama_mahasiswa, alamat, jenis_kelamin, tgl_masuk, jurusan) VALUES ('$nama_mahasiswa', '$alamat', '$jenis_kelamin', '$tgl_masuk', '$jurusan')";
        $koneksi->query($sql);
    }

    function updateData($id, $nama_mahasiswa, $alamat, $jenis_kelamin, $tgl_masuk, $jurusan)
    {
        $koneksi = new mysqli('localhost', 'root', '', 'mahasiswa');
        $sql = "UPDATE tbl_mahasiswa SET nama_mahasiswa='$nama_mahasiswa', alamat='$alamat', jurusan='$jurusan', jenis_kelamin='$jenis_kelamin', tgl_masuk='$tgl_masuk' WHERE id='$id'";
        $koneksi->query($sql);
    }

    function hapusData($id)
    {
        $koneksi = new mysqli('localhost', 'root', '', 'mahasiswa');
        $sql = "DELETE FROM tbl_mahasiswa WHERE id = $id";
        $koneksi->query($sql);
    }
}

$opt = ["uri" => "http://www.server1.com/"];
//membuat kelas instan
$serv = new SoapServer(NULL, $opt);
//memanggil kelas
$serv->setClass('Service1');
//start
$serv->handle();
