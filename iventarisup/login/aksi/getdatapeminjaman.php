<?php
header('Content-Type: application/json');
include "../assets/koneksi.php";

if ($mysqli->connect_errno) {
    echo json_encode(["error" => "Gagal koneksi DB"]);
    exit;
}

// ambil semua nama barang unik dari tabel peminjaman
$query = $mysqli->query("SELECT DISTINCT nama_brg FROM peminjaman ORDER BY nama_brg ASC");

$data = [];
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama_brg'];
}

echo json_encode($data);
?>
