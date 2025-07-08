<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM warga WHERE id=$id");
echo "<script>alert('Data dihapus'); window.location='index.php';</script>";
?>