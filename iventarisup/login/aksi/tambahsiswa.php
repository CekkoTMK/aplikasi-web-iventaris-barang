<?php
include "../assets/koneksi.php"; // naik satu folder dari /aksi ke /projek

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama     = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas    = $_POST['kelas'];

    // Jalankan query INSERT
    $query = $mysqli->query("INSERT INTO anggota (nama, nis, kelas) VALUES ('$nama', '$nis', '$kelas')");

    if ($query) {
        // Jika berhasil, kembali ke halaman siswa
        echo "<script>
                alert('Data siswa berhasil ditambahkan!');
                window.location='../index.php?page=siswa';
              </script>";
    } else {
        // Jika gagal, tampilkan error
        echo "<script>
                alert('Gagal menambahkan data!');
                window.history.back();
              </script>";
    }
} else {
    // Jika file diakses langsung tanpa POST
    header("Location: ../index.php?page=siswa");
    exit;
}
?>
