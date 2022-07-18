<?php

$koneksi = new mysqli("localhost", "root", "", "inventori");

$tanggal_masuk = date("Y-m-d");


?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Member</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Tanggal Member</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $tanggal; ?>" />
							</div>
						</div>


						<label for="">NIK / NAMA</label>
						<div class="form-group">
							<div class="form-line">
								<select name="barang" id="cmb_barang" class="form-control" />
								<option value="">-- Pilih Users --</option>
								<?php

								$sql = $koneksi->query("select * from users order by nik");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[nik].$data[nama]'>$data[nik] | $data[nama]</option>";
								}
								?>

								</select>


							</div>
						</div>

						<label for="">TRANSAKSI</label>
						<div class="form-group">
							<div class="form-line">
								<select name="transaksi" id="cmb_barang" class="form-control" />
								<option value="">-- Transaksi --</option>
								<?php

								$sql = $koneksi->query("select * from transaksi order by id_transaksi");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[id_transaksi].$data[tanggal]'>$data[id_transaksi] | $data[tanggal]</option>";
								}
								?>

								</select>


							</div>
						</div>

						<label for="">Poin</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="poin" class="form-control" id="poin" value="<?php echo $poin; ?>" />
							</div>
						</div>



						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {
						$tanggal = $_POST['tanggal'];

						$barang = $_POST['barang'];
						$pecah_barang = explode(".", $barang);
						$nik = $pecah_barang[0];
						$nama = $pecah_barang[1];



						$transaksi = $_POST['transaksi'];
						$poin = $_POST['poin'];





						$sql = $koneksi->query("insert into member (tanggal, nik, nama, transaksi, poin) values('$tanggal','$nik','$nama','$transaksi','$poin')");





						if ($sql) {
					?>
							<script type="text/javascript">
								alert("Simpan Data Berhasil");
								window.location.href = "?page=member";
							</script>
					<?php
						}
					}


					?>