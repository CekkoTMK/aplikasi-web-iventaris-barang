<?php
session_start();
if(!isset($_SESSION['admin'])) {
   header('location:../hack.php');
  
} else
{ 
  echo "gagal login";
}
require_once 'assets/koneksi.php';
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
   
}
?>
<!DOCTYPE html>
<html lang="en">
<!--kepala web----------------------------------------------------------------------------------------------------->    
    <head> 
         <link rel="icon" type="image/png" href="assets/img/icon.png">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iventaris</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
       
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="?page=home">CekkoTMK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar--atas kanan---------------------------------------------------------------------------------------------->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="?page=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-----Nav Bar kiri web site-------------------------->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Anggota
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?page=guru">Guru</a> 
                                    <a class="nav-link" href="?page=siswa">Siswa</a> 
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="?page=peminjaman">Peminjaman</a>  
                                    <a class="nav-link" href="?page=pengembalian">Pengembalian</a> 
                                </nav>
                            </div>
                            <a class="nav-link" href="?page=barang">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Barang
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="?page=about">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tentang Kami
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: Admin</div>
                        Created By Cekko
                    </div>
                </nav>
            </div>
            <!--AKhir navigasi code----------------------------------------------------------------------------------------------------->
            <div id="layoutSidenav_content">
                <main>
                  <!--isi website---------------------------------------------------------------------------------------->  
                    <div class="container-fluid px-4">
                       <?php
$page = $_GET['page'] ?? 'home'; // default 'home' kalau gak ada parameter

if ($page === 'home') {
 include 'isian.php';
}
elseif ($page === 'guru') {
    include 'guru.php';
}
elseif ($page === 'siswa') {
    include 'siswa.php';
}
elseif ($page === 'peminjaman') {
  include 'peminjaman.php';
}
elseif ($page === 'pengembalian') {
    include 'pengembalian.php';
}
elseif ($page === 'barang') {
    include 'barang.php';
}
elseif ($page === 'about') {
    ?>
    <h2>Tentang Kami</h2>
    <p>saya hanya seorang programer web pemula yang masih di campur adukkan dengan AI</p>
    <?php
}
elseif ($page === 'logout') {
   // logout.php
session_start();

// kosongkan data session
$_SESSION = [];

// hapus cookie session di browser
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// destroy session di server
session_destroy();

// pastikan response tidak di-cache
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

// redirect pakai replace agar tidak masuk history
echo '<script>location.replace("../index.php");</script>';
exit;

}
//haalaman untuk aksi --------------------------------------------------------------------------------------------------
elseif ($page === 'editsiswa') {
///------------------code melakukan edit siswa ------------------------------------------------------------------------
    ?>
        <?php
                  $id_peminjam = $_GET['id_peminjam'];
                  $query = $mysqli->query("SELECT * FROM anggota where id_anggota='$id_peminjam'");

                  while ($qu = mysqli_fetch_array($query)){
                    ?>
                  <!-- form start -->
                   <h2 class="page-header">Edit Data Siswa</h2>
                  <form role="form" action="aksi/editsiswa.php" method="post">
                  <div class = "box-body">
                  <div class ="form-group">
                    <label for="exampleInputEmail1">No</label>
                    <input type="text" disable value="<?php echo $qu['id_anggota'] ?>" name="id_peminjam" class="form-control" placeholder="" disabled>
                    <input type="hidden" value="<?= $qu['id_anggota']; ?>" name="id_peminjam">
                    </div>
                    <div class ="form-group">
                    <label for="exampleInputPassword1">Username </label>
                    <input type="text"  value="<?php echo$qu['nama'] ?>" name="nama"
                    class="form-control" placeholder="" required>
                    </div>
                    <div class ="form-group">
                    <label for="exampleInputPassword1">nis </label>
                    <input type="text"  value="<?php echo$qu['nis'] ?>" name="nis"
                    class="form-control" placeholder="" required>
                    </div>
                    <div class ="form-group">
                      <label for="exampleInputPassword1">Kelas </label>
                      <input type="text" value="<?php echo$qu['kelas'] ?>" name="kelas"
                      class="form-control" placeholder="" required>
                    </div>

                <?php
                }
            ?>

             <div class="box-footer">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="?page=siswa" class="btn btn-primary">kembali</a>
            </div>
            </form>
    <?php
}elseif ($page === 'tambahsiswa') {
    // -----------------------------code tambah siswa-------------------------------------------------------------------------
    ?>
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Tambah Siswa</h2>
          <form role="form1" action="aksi/tambahsiswa.php" method="post">
             
                 <div class = "form-relative">
                   
                    <div class ="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text"  name="nama" class="form-control" placeholder="Username..." required>
                    </div>
                   <div class ="form-group">
                        <label for="exampleInputPassword1">nis</label>
                        <input type="text"   name="nis"
                        class="form-control" placeholder="nis..." required>
                    </div>

                        <label>Kelas</label><div class ="form-group">
                        <input type="text"  name="kelas" class="form-control" placeholder="kelas..." required>
                    </div>

                                            </div>
             <br><br>
                 <button type="submit" class="btn btn-primary">Tambah Data</button>
                
            
                 <a href="?page=siswa" class="btn btn-primary">Kembali</a>
                 
           </div>
        </div>
            </form>
 <?php
}
elseif ($page === 'tambahbrg') {
   //------------------------- form tambah barang ---------------------------------------------------------------------------------------
   ?> 
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Tambah Barang</h2>
          <form role="form1" action="aksi/tambahbrg.php" method="post" enctype="multipart/form-data">  
             <table>
                 <div class = "box-body">

                    <div class ="form-group">
                    <label for="">Nama Barang </label>
                    <input type="text"  name="nama_brg" class="form-control" placeholder="Nama Barang..." required>
                    </div>
                   <div class ="form-group">
                    <label for="">Jenis Barang</label>
                    <input type="text"   name="jenis_brg" 
                    class="form-control" placeholder="Jenis Barang..." required>
                    </div>
                     <div class ="form-group">
                    <label for="">Stok Barang</label>
                    <input type="text"   name="stok_brg" 
                    class="form-control" placeholder="Stok Barang..." required>
                    </div>
                    

              <div class="box=footer">
            </div>
            <tr>
            <td><button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button></td>
            <td><a href="barang.php" class="btn btn-primary">Back</td>
            </tr>
            </div></table></form>
        </div>
        <?php
}elseif ($page === 'editbrg') {
  //--------------------------------------------form edit barang-------------------
  ?>
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit Barang</h1>

              <section class="row">
                <!-- left column -->
                <div class="col-md-12">
                <!-- general form element -->
                <div class="box box-danger">
                <div class="box-header with-border">
                </div><!--/.box-header-->
                <?php
                  $id_brg = $_GET['id_brg'];
                  $query = $mysqli->query("SELECT * FROM barang where id_brg='$id_brg'");
                  while ($qu = mysqli_fetch_array($query)){
                    ?>
                  <!-- form start -->
                  <form role="form" action="aksi/editbrg.php" method="post">
                  <div class = "box-body">
                  <div class ="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" disable value="<?php echo $qu['id_brg'] ?>" name="id_brg" class="form-control" placeholder="" disabled>
                    <input type="hidden" value="<?= $qu['id_brg']; ?>" name="id_brg">
                    </div>
                    <div class ="form-group">
                    <label for="exampleInputPassword1">Nama Barang</label>
                    <input type="text"  value="<?php echo$qu['nama_brg'] ?>" name="nama_brg"
                    class="form-control" placeholder="" required>
                    </div>
                   <div class ="form-group">
                    <label for="exampleInputPassword1">Jenis Barang</label>
                    <input type="text"  value="<?php echo$qu['jenis_brg'] ?>" name="jenis_brg"
                    class="form-control" placeholder="" required>
                    </div>
                     <div class ="form-group">
                    <label for="exampleInputPassword1">Stok Barang</label>
                    <input type="text"  value="<?php echo$qu['stok_brg'] ?>" name="stok_brg"
                    class="form-control" placeholder="" required>
                    </div>

                <?php
                }
            ?>

             <div class="box-footer">
            </div>
            <button type="submit" class="btn btn-danger">Simpan</button>
            <a href="?page=barang" class="btn btn-danger">Back</a>
            </div>
            </form>
            </section><!-- /.content -->

          </div>
        </div>
      </div>

  <?php
}

// akhir halaman aksi -------------------------------------------------------------------------------------------------
else {
    echo "<h1>404</h1><p>Halaman tidak ditemukan!</p>";
}
?>

                    </div>
            <!--akhir isi code website--------------------------------------------------------------------->
                </main>
            
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
