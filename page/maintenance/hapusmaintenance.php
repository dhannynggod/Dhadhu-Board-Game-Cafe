 <?php

	$id = $_GET['id'];
	$sql = $koneksi->query("delete from maintenance where id = '$id'");

	if ($sql) {

	?>


 	<script type="text/javascript">
 		alert("Data Berhasil Dihapus");
 		window.location.href = "?page=maintenance";
 	</script>

 <?php

	}

	?>