<?php

$koneksi = new mysqli("localhost", "root", "", "inventori");

$tanggal_masuk = date("Y-m-d");


?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Barang Rusak</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">


				<div class="body">

					<form method="POST" enctype="multipart/form-data">

						<label for="">Tanggal Masuk</label>
						<div class="form-group">
							<div class="form-line">
								<input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?php echo $tanggal_masuk; ?>" />
							</div>
						</div>


						<label for="">Barang</label>
						<div class="form-group">
							<div class="form-line">
								<select name="barang" id="cmb_barang" class="form-control" />
								<option value="">-- Pilih Barang --</option>
								<?php

								$sql = $koneksi->query("select * from gudang order by kode_barang");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[kode_barang].$data[nama_barang]'>$data[kode_barang] | $data[nama_barang]</option>";
								}
								?>

								</select>


							</div>
						</div>

						<label for="">Supplier</label>
						<div class="form-group">
							<div class="form-line">
								<select name="pengirim" class="form-control" />
								<option value="">-- Pilih Supplier --</option>
								<?php

								$sql = $koneksi->query("select * from tb_supplier order by nama_supplier");
								while ($data = $sql->fetch_assoc()) {
									echo "<option value='$data[nama_supplier]'>$data[nama_supplier]</option>";
								}
								?>

								</select>


							</div>
						</div>
						<label for="">Jumlah</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="jumlahmasuk" class="form-control" id="tanggal_masuk" value="<?php echo $jumlah; ?>" />
							</div>
						</div>

						<label for="">Deskripsi</label>
						<div class="form-group">
							<div class="form-line">
								<input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $deskripsi; ?>" />
							</div>
						</div>



						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

					</form>



					<?php

					if (isset($_POST['simpan'])) {
						$tanggal = $_POST['tanggal_masuk'];

						$barang = $_POST['barang'];
						$pecah_barang = explode(".", $barang);
						$kode_barang = $pecah_barang[0];
						$nama_barang = $pecah_barang[1];



						$jumlah = $_POST['jumlahmasuk'];
						$deskripsi = $_POST['deskripsi'];


						$pengirim = $_POST['pengirim'];
						$pecah_nama = explode(".", $nama_supplier);
						$nama_supplier = $pecah_nama[0];





						$sql = $koneksi->query("insert into maintenance (tanggal, kode_barang, nama_barang, jumlah, pengirim, deskripsi) values('$tanggal','$kode_barang','$nama_barang','$jumlah','$pengirim', '$deskripsi')");





						if ($sql) {
					?>
							<script type="text/javascript">
								alert("Simpan Data Berhasil");
								window.location.href = "?page=maintenance";
							</script>
					<?php
						}
					}


					?>