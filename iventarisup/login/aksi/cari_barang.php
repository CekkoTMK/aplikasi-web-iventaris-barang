<?php
include "../assets/koneksi.php";
if (isset($_GET['type']) && isset($_GET['q'])) {
    $q = $mysqli->real_escape_string($_GET['q']);
    $type = $_GET['type'];

    if ($type === 'nama') {
        // Cari nama peminjam
        $result = $mysqli->query("SELECT nama FROM anggota WHERE nama LIKE '%$q%' LIMIT 8");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='suggestion-item' onclick=\"pilihData('nama','{$row['nama']}','suggestions_peminjam')\">{$row['nama']}</div>";
        }
        if ($result->num_rows === 0)
            echo "<div class='suggestion-item' style='color:#777;'>Tidak ditemukan</div>";
    }

    if ($type === 'nama_brg') {
        // 🔹 Perubahan utama di sini:
        // hanya ambil barang yang stoknya masih > 0
        $result = $mysqli->query("SELECT nama_brg FROM barang WHERE nama_brg LIKE '%$q%' AND stok_brg > 0 LIMIT 8");

        while ($row = $result->fetch_assoc()) {
            echo "<div class='suggestion-item' onclick=\"pilihData('nama_brg','{$row['nama_brg']}','suggestions_barang')\">{$row['nama_brg']}</div>";
        }
        if ($result->num_rows === 0)
            echo "<div class='suggestion-item' style='color:#777;'>Tidak ditemukan atau stok habis</div>";
    }
}
?>
