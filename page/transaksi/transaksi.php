<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Id Transaksi</th>
							<th>Tanggal Transaksi</th>
							<th>Pengaturan</th>

						</tr>
					</thead>


					<tbody>
						<?php

						$no = 1;
						$sql = $koneksi->query("select * from transaksi");
						while ($data = $sql->fetch_assoc()) {

						?>

							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data['id_transaksi'] ?></td>
								<td><?php echo $data['tanggal'] ?></td>

								<td>

									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=transaksi&aksi=hapustransaksi&id_transaksi=<?php echo $data['id_transaksi'] ?>" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="?page=transaksi&aksi=tambahtransaksi" class="btn btn-primary">Tambah</a>
				</tbody>
				</table>
			</div>
		</div>
	</div>

</div>