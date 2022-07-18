 <?php

	$id_transaksi = $_GET['id_transaksi'];
	$sql = $koneksi->query("delete from transaksi where id_transaksi = '$id_transaksi'");

	if ($sql) {

	?>


 	<script type="text/javascript">
 		alert("Data Berhasil Dihapus");
 		window.location.href = "?page=transaksi";
 	</script>

 <?php

	}

	?>