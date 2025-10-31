<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../assets/koneksi.php';

$nama_pemin = $_POST['nama'] ?? '';
$nama_brg   = $_POST['nama_brg'] ?? '';
$tanggal    = $_POST['tanggal'] ?? date('Y-m-d');

// Simpan data peminjaman
$query = $mysqli->query("INSERT INTO peminjaman (nama_pemin, nama_brg, tanggal)
VALUES ('$nama_pemin', '$nama_brg', '$tanggal')");

if ($query) {
  // Update stok barang (kurangi 1)
  $update = $mysqli->query("UPDATE barang SET stok_brg = stok_brg - 1 WHERE nama_brg = '$nama_brg'");

  if ($update) {
      echo "<script>alert('Barang berhasil dikembalikan dan stok diperbarui!'); window.location='../index.php?page=peminjaman';</script>";
    exit;
  } else {
    echo "Gagal memperbarui stok: " . $mysqli->error;
  }
} else {
  echo "Gagal menambah data: " . $mysqli->error;
}
?>
