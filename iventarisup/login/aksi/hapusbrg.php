<?php
include '../assets/koneksi.php';
$id_brg = $_GET['id'];
$hapus = $mysqli->query("DELETE FROM barang WHERE id_brg=$id_brg");
if($hapus){
	header("location:../index.php?page=barang");
}else{
	echo"gagal menghapus data";
}
?>