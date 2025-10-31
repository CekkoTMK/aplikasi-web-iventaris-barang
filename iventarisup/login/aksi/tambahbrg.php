<?php
// include koneksi database
include '../assets/koneksi.php'; // sesuaikan dengan lokasi file koneksi kamu

// cek apakah tombol submit sudah ditekan
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $nama_brg  = $_POST['nama_brg'];
    $jenis_brg = $_POST['jenis_brg'];
    $stok_brg  = $_POST['stok_brg'];

    // amankan input untuk mencegah SQL Injection
    $nama_brg  = mysqli_real_escape_string($mysqli, $nama_brg);
    $jenis_brg = mysqli_real_escape_string($mysqli, $jenis_brg);
    $stok_brg  = mysqli_real_escape_string($mysqli, $stok_brg);

    // query untuk insert data
    $query = "INSERT INTO barang (nama_brg, jenis_brg, stok_brg) 
              VALUES ('$nama_brg', '$jenis_brg', '$stok_brg')";

    // eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // kalau berhasil
        echo "<script>
            alert('Data barang berhasil ditambahkan!');
            window.location.href = '../index.php?page=barang';
        </script>";
    } else {
        // kalau gagal
        echo "<script>
            alert('Gagal menambahkan data: " . mysqli_error($mysqli) . "');
            window.history.back();
        </script>";
    }
} else {
    // kalau akses file tanpa lewat form
    echo "<script>
        alert('Akses tidak valid!');
        window.location.href = '../index.php?page=barang';
    </script>";
}
?>
