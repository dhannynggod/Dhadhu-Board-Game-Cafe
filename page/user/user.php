<?php
if ($_SESSION['member']) {
    $user = $_SESSION['member'];
}
$sql = $koneksi->query("select * from member where id='$user'");
$data = $sql->fetch_assoc();
?>



<!--sidebar start-->
</li>
<li class="nav-item ">
    <a class="nav-link">
        <div class="d-flex align-items-center justify-content-center" class="nama"> <?php echo  $data['nama']; ?></div>
        </font>
        <div class="d-flex align-items-center justify-content-center" class="transaksi"><strong><?php echo $data['transaksi']; ?></strong></div>
    </a>
</li>