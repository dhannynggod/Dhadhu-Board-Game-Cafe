<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>TANGGAL</th>
              <th>NIK</th>
              <th>NAMA MEMBER</th>
              <th>TRANSAKSI</th>
              <th>POIN</th>
              <th>AKSI</th>
            </tr>
          </thead>


          <tbody>
            <?php

            $no = 1;
            $sql = $koneksi->query("select * from member");
            while ($data = $sql->fetch_assoc()) {

            ?>

              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['nik'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['transaksi'] ?></td>
                <td><?php echo $data['poin'] ?></td>

                <td>
                  <a href="?page=member&aksi=ubahmember&id=<?php echo $data['id'] ?>" class="btn btn-success">Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?page=member&aksi=hapusmember&id=<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
        <a href="?page=member&aksi=tambahmember" class="btn btn-primary">Tambah</a>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>