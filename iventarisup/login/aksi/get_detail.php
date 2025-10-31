<?php
header('Content-Type: application/json');
include "../assets/koneksi.php";

$nama_brg = $_GET['nama_brg'] ?? '';

$stmt = $mysqli->prepare("SELECT nama_pemin, tanggal FROM peminjaman WHERE LOWER(nama_brg) = LOWER(?) LIMIT 1");
$stmt->bind_param("s", $nama_brg);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc();
echo json_encode($data ?? []);
?>
