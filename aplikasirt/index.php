<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Warga RT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Warga RT</h2>
    <form method="GET" action="">
        <input type="text" name="cari" placeholder="Cari nama..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        <input type="submit" value="Cari">
        <a class="button" href="tambah.php">+ Tambah Warga</a>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>KK</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $sql = "SELECT * FROM warga";
        if (isset($_GET['cari'])) {
            $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
            $sql .= " WHERE nama_lengkap LIKE '%$cari%'";
        }
        $data = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_lengkap'] ?></td>
            <td><?= $row['nomor_kk'] ?></td>
            <td><?= $row['nik'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>