<?php

//uri untuk mengakses webhservice
$opt = [
    "location" => "http://www.server1.com/soapServer.php",
    "uri" => "http://www.server1.com/", "trace" => 1
];
//membaca API
$api = new SoapClient(NULL, $opt);
$data = json_decode($api->ambilData());

?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td></td>
            <td>ID</td>
            <td>Nama Mahasiswa</td>
            <td>Alamat</td>
            <td>Jurusan</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Masuk</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <!-- query untuk mengambil data dari database -->
        <?php
        $i = 1;

        foreach ($data as $d) {
        ?>
            <tr id="<?php echo $d->id; ?>" class="info">
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $d->id; ?>">
                        <label for="checkbox2"></label>
                    </span>
                </td>
                <td><?php echo $d->id; ?></td>
                <td><?php echo $d->nama_mahasiswa; ?></td>
                <td><?php echo $d->alamat; ?></td>
                <td><?php echo $d->jurusan; ?></td>
                <td><?php echo $d->jenis_kelamin; ?></td>
                <td><?php echo $d->tgl_masuk; ?></td>
                <td>
                    <button id="<?php echo $d->id; ?>" class="btn btn-success btn-sm edit_data" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fa fa-edit"></i> Edit </button>
                    <button id="<?php echo $d->id; ?>" class="btn btn-danger btn-sm hapus_data confirmation"><i class="fa fa-trash"></i> Hapus </button>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function reset() {
        document.getElementById("err_nama_mahasiswa").innerHTML = "";
        document.getElementById("err_alamat").innerHTML = "";
        document.getElementById("err_jurusan").innerHTML = "";
        document.getElementById("err_tanggal_masuk").innerHTML = "";
        document.getElementById("err_jenkel").innerHTML = "";
    }

    $(document).on('click', '.edit_data', function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "get_data.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                reset();
                document.getElementById("id").value = response.id;
                document.getElementById("nama_mahasiswa").value = response.nama_mahasiswa;
                document.getElementById("tanggal_masuk").value = response.tgl_masuk;
                document.getElementById("alamat").value = response.alamat;
                document.getElementById("jurusan").value = response.jurusan;
                if (response.jenis_kelamin == "Laki-laki") {
                    document.getElementById("jenkel1").checked = true;
                } else {
                    document.getElementById("jenkel2").checked = true;
                }
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });

    $(document).on('click', '.hapus_data', function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "hapus_data.php",
            data: {
                id: id
            },
            success: function() {
                $('.data').load("data.php");
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });
</script>

<script type="text/javascript">
    $('.confirmation').on('click', function() {
        return confirm('Apakah yakin akan dihapus?');
    });
</script>