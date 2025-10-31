<?php
include "../assets/koneksi.php";
$id_brg = $_POST['id_brg'];
$nama_brg = $_POST['nama_brg'];
$jenis_brg = $_POST['jenis_brg'];
$stok_brg = $_POST['stok_brg'];


$ganti = "update barang set id_brg='$id_brg', nama_brg='$nama_brg', jenis_brg='$jenis_brg', stok_brg='$stok_brg' where id_brg='$id_brg'";
$update = $mysqli->query($ganti);

if($update) {
	 echo "<script>
            alert('Data barang berhasil diupdate!');
            window.location.href = '../index.php?page=barang';
        </script>";
}else{
	echo $ganti;
	echo "gagal mengubah data";
}
?>