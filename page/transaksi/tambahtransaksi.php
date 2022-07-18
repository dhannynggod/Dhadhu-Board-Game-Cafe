<?php


$koneksi = new mysqli("localhost", "root", "", "inventori");
$no = mysqli_query($koneksi, "select id_transaksi from transaksi order by id_transaksi desc");
$idtran = mysqli_fetch_array($no);
$kode = $idtran['id_transaksi'];


$urut = substr($kode, 8, 3);
$tambah = (int) $urut + 1;
$bulan = date("m");
$tahun = date("y");

if (strlen($tambah) == 1) {
	$format = "TRU-" . $bulan . $tahun . "00" . $tambah;
} else if (strlen($tambah) == 2) {
	$format = "TRU-" . $bulan . $tahun . "0" . $tambah;
} else {
	$format = "TRU-" . $bulan . $tahun . $tambah;
}



$tanggal_masuk = date("Y-m-d");


?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Id Transaksi</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="id_transaksi" class="form-control" id="id_transaksi" value="<?php echo $format; ?>" readonly />
							</div>
						</div>



						<label for="">Tanggal Masuk</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?php echo $tanggal_masuk; ?>" />
							</div>
						</div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {
						$id_transaksi = $_POST['id_transaksi'];
						$tanggal = $_POST['tanggal_masuk'];





						$sql = $koneksi->query("insert into transaksi (id_transaksi, tanggal) values('$id_transaksi','$tanggal')");





						if ($sql) {
					?>
							<script type="text/javascript">
								alert("Simpan Data Berhasil");
								window.location.href = "?page=transaksi";
							</script>
					<?php
						}
					}


					?>