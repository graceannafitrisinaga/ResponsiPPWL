<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="icon" href="dk.png">
	<title>203110028</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>


	<div class="container">

		<h2>Data Mahasiswa</h2>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
			Tambah
		</button>
		<!-- Modal -->
		<div class="modal fade formini" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="post" class="form-data" id="form-data">
							<div class="row">

								<div class="form-group">
									<label>Nama Mahasiswa</label>
									<input type="hidden" name="id" id="id">
									<input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required="true">
									<p class="text-danger" id="err_nama_mahasiswa"></p>
								</div>


								<div class="form-group">
									<label>Jurusan</label>
									<select name="jurusan" id="jurusan" class="form-control" required="true">
										<option value=""></option>
										<option value="Sistem Informasi">Sistem Informasi</option>
										<option value="Informatika">Informatika</option>
										<option value="Teknik Komputer">Teknik Komputer</option>
										<option value="Rekayasa Perangkat Lunak Aplikasi">Rekayasa Perangkat Lunak Aplikasi</option>
										<option value="Sistem Informasi Akuntansi">Sistem Informasi Akuntansi</option>
										<option value="Teknologi Komputer">Teknologi Komputer</option>
									</select>
									<p class="text-danger" id="err_jurusan"></p>
								</div>

								<div class="form-group">
									<label>Tanggal Masuk</label>
									<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required="true">
									<p class="text-danger" id="err_tanggal_masuk"></p>
								</div>

								<div class="form-group">
									<label>Jenis Kelamin</label><br>
									<input type="radio" name="jenkel" id="jenkel1" value="Laki-laki" required="true"> Laki-laki
									<input type="radio" name="jenkel" id="jenkel2" value="Perempuan"> Perempuan
								</div>
								<p class="text-danger" id="err_jenkel"></p>

							</div>

							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
								<p class="text-danger" id="err_alamat"></p>
							</div>

							<div class="form-group">
								<button type="button" name="simpan" id="simpan" class="btn btn-primary">
									<i class="fa fa-save"></i> Simpan
								</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>


		<hr>

		<div class="data"></div>

	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- DataTable -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {


			$('.data').load("data.php");
			$("#simpan").click(function() {
				var data = $('.form-data').serialize();
				var jenkel1 = document.getElementById("jenkel1").value;
				var jenkel2 = document.getElementById("jenkel2").value;
				var nama_mahasiswa = document.getElementById("nama_mahasiswa").value;
				var tanggal_masuk = document.getElementById("tanggal_masuk").value;
				var alamat = document.getElementById("alamat").value;
				var jurusan = document.getElementById("jurusan").value;

				if (nama_mahasiswa == "") {
					document.getElementById("err_nama_mahasiswa").innerHTML = "Nama Mahasiswa Harus Diisi";
				} else {
					document.getElementById("err_nama_mahasiswa").innerHTML = "";
				}
				if (alamat == "") {
					document.getElementById("err_alamat").innerHTML = "Alamat Mahasiswa Harus Diisi";
				} else {
					document.getElementById("err_alamat").innerHTML = "";
				}
				if (jurusan == "") {
					document.getElementById("err_jurusan").innerHTML = "Jurusan Mahasiswa Harus Diisi";
				} else {
					document.getElementById("err_jurusan").innerHTML = "";
				}
				if (tanggal_masuk == "") {
					document.getElementById("err_tanggal_masuk").innerHTML = "Tanggal Masuk Mahasiswa Harus Diisi";
				} else {
					document.getElementById("err_tanggal_masuk").innerHTML = "";
				}
				if (document.getElementById("jenkel1").checked == false && document.getElementById("jenkel2").checked == false) {
					document.getElementById("err_jenkel").innerHTML = "Jenis Kelamin Harus Dipilih";
				} else {
					document.getElementById("err_jenkel").innerHTML = "";
				}

				if (nama_mahasiswa != "" && tanggal_masuk != "" && alamat != "" && jurusan != "" && (document.getElementById("jenkel1").checked == true || document.getElementById("jenkel2").checked == true)) {
					$.ajax({
						type: 'POST',
						url: "form_action.php",
						data: data,
						success: function() {
							$('.data').load("data.php");
							document.getElementById("id").value = "";
							document.getElementById("form-data").reset();
							$('#staticBackdrop').modal('hide');

						},
						error: function(response) {
							console.log(response.responseText);
						}
					});
				}

			});
		});
	</script>

</body>

</html>