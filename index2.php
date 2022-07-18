<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();



$koneksi = new mysqli("localhost", "root", "", "inventori");

if (empty($_SESSION['member'])) {

  header("location:login.php");
}





?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Inventaris Barang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index2.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-2">DHADHU CAFE BOARD GAME</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <?php
      if ($_SESSION['member']) {
        $user = $_SESSION['member'];
      }
      $sql = $koneksi->query("select * from users where id='$user'");
      $data = $sql->fetch_assoc();
      ?>



      <!--sidebar start-->

      <li class="d-flex align-items-center justify-content-center">
        <a class="nav-link">
          <img src="img/<?php echo $data['foto'] ?>" class="img-circle" width="80" alt="User" /></a>
      <li class="d-flex align-items-center justify-content-center">
      </li>
      </li>
      <li class="nav-item ">
        <a class="nav-link">
          <div class="d-flex align-items-center justify-content-center" class="name"> <?php echo  $data['nama']; ?></div>
          </font>
          <div class="d-flex align-items-center justify-content-center" class="email"><strong><?php echo $data['level']; ?></strong></div>
        </a>
      </li>




      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="?page=home2">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pilih Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item active">
        <a class="nav-link" href="?page=user">
          <i class="fas fa-fw fa-home"></i>
          <span>Transaksi</span></a>
      </li>



      <!-- Heading -->



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <div class="top-menu">
                <ul class="nav pull-right top-menu">

                  <li><a onclick="return confirm('Apakah anda yakin akan logout?')" class="btn btn-danger" class="logout" href="logout.php">Keluar</a></li>
                </ul>
              </div>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <section class="content">


            <?php
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];





            if ($page == "member") {
              if ($aksi == "") {
                include "page/member/member.php";
              }
            }





            if ($page == "") {
              include "home2.php";
            }
            if ($page == "home2") {
              include "home2.php";
            }
            ?>


          </section>


        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; 2019 . Sistem Inventaris Barang</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!--script for this page-->
  <script>
    jQuery(document).ready(function($) {
      $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'page/barangmasuk/get_barang.php', // File yang akan memproses data
          data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
          success: function(data) { // Jika berhasil
            $('.tampung').html(data); // Berikan hasil ke id kota
          }


        });
      });
    });
  </script>









</body>

</html>