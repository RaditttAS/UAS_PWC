<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Warga</h2>
    <form method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required>
        <label>Nomor KK</label>
        <input type="text" name="nomor_kk" required>
        <label>NIK</label>
        <input type="text" name="nik" required>
        <label>Alamat</label>
        <textarea name="alamat" required></textarea>
        <label>Status</label>
        <select name="status" required>
            <option value="">--Pilih Status--</option>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
            <option value="Anggota Keluarga">Anggota Keluarga</option>
        </select>
        <input type="submit" name="simpan" value="Simpan">
    </form>
    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_lengkap'];
        $kk = $_POST['nomor_kk'];
        $nik = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];
        $sql = "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status) VALUES ('$nama', '$kk', '$nik', '$alamat', '$status')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data ditambahkan'); window.location='index.php';</script>";
        } else {
            echo "Gagal: " . mysqli_error($koneksi);
        }
    }
    ?>
</body>
</html>