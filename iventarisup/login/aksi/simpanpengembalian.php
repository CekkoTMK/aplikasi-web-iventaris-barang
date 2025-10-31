<?php
include '../assets/koneksi.php';

$nama_brg = $_POST['nama_brg'] ?? '';
$nama_pemin = $_POST['nama_pemin'] ?? '';

if ($nama_brg == '' || $nama_pemin == '') {
    echo "<script>alert('Data tidak lengkap!'); window.history.back();</script>";
    exit;
}

// Hapus data dari tabel peminjaman
$stmt = $mysqli->prepare("DELETE FROM peminjaman WHERE nama_brg = ? AND nama_pemin = ?");
$stmt->bind_param("ss", $nama_brg, $nama_pemin);
$hapus = $stmt->execute();

if ($hapus) {
    // Update stok barang +1
    $update = $mysqli->prepare("UPDATE barang SET stok_brg = stok_brg + 1 WHERE nama_brg = ?");
    $update->bind_param("s", $nama_brg);
    $update->execute();
    $update->close();

    echo "<script>alert('Barang berhasil dikembalikan dan stok diperbarui!'); window.location='../index.php?page=pengembalian';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.history.back();</script>";
}

$stmt->close();
$mysqli->close();
?>
