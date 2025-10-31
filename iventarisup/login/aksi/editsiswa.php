<?php
include "../assets/koneksi.php"; // Pastikan path benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_peminjam = $_POST['id_peminjam'];
    $nama    = $_POST['nama'];
    $nis    = $_POST['nis'];
    $kelas    = $_POST['kelas'];

    // (Opsional) Enkripsi password kalau perlu, misal:
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // Jalankan query update
    $query = $mysqli->query("UPDATE anggota SET 
    nama='$nama',
    nis='$nis',
    kelas='$kelas'
    WHERE id_anggota='$id_peminjam'
    ");

    if ($query) {
        // Kalau sukses, kembali ke halaman utama
        echo "<script>
                alert('Data berhasil diupdate!');
                window.location='../index.php?page=siswa';
              </script>";
    } else {
        // Kalau gagal
        echo "<script>
                alert('Gagal mengupdate data!');
                window.history.back();
              </script>";
    }
} else {
    // Jika file diakses langsung tanpa POST
    header('Location: ../index.php?page=siswa');
    exit;
}
?>
