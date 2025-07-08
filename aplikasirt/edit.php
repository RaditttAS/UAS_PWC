<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM warga WHERE id=$id");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Warga</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" required>
        <label>Nomor KK</label>
        <input type="text" name="nomor_kk" value="<?= $row['nomor_kk'] ?>" required>
        <label>NIK</label>
        <input type="text" name="nik" value="<?= $row['nik'] ?>" required>
        <label>Alamat</label>
        <textarea name="alamat" required><?= $row['alamat'] ?></textarea>
        <label>Status</label>
        <select name="status" required>
            <option value="Kepala Keluarga" <?= $row['status'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
            <option value="Anggota Keluarga" <?= $row['status'] == 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
        </select>
        <input type="submit" name="update" value="Simpan Perubahan">
    </form>
    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_lengkap'];
        $kk = $_POST['nomor_kk'];
        $nik = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];
        $sql = "UPDATE warga SET nama_lengkap='$nama', nomor_kk='$kk', nik='$nik', alamat='$alamat', status='$status' WHERE id=$id";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data diperbarui'); window.location='index.php';</script>";
        } else {
            echo "Gagal: " . mysqli_error($koneksi);
        }
    }
    ?>
</body>
</html>