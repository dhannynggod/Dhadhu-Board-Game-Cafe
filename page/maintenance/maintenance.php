<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Maintenance</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Masuk</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Produsen</th>
							<th>Jumlah Masuk</th>
							<th>Deskripsi</th>
							<th>Pengaturan</th>

						</tr>
					</thead>


					<tbody>
						<?php

						$no = 1;
						$sql = $koneksi->query("select * from maintenance");
						while ($data = $sql->fetch_assoc()) {

						?>

							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data['tanggal'] ?></td>
								<td><?php echo $data['kode_barang'] ?></td>
								<td><?php echo $data['nama_barang'] ?></td>
								<td><?php echo $data['pengirim'] ?></td>
								<td><?php echo $data['jumlah'] ?></td>
								<td><?php echo $data['deskripsi'] ?></td>



								<td>

									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=maintenance&aksi=hapusmaintenance&id=<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="?page=maintenance&aksi=tambahmaintenance" class="btn btn-primary">Tambah</a>
				</tbody>
				</table>
			</div>
		</div>
	</div>

</div>