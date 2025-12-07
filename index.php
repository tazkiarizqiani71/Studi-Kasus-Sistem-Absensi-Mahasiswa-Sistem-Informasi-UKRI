<?php 
include 'koneksi.php';

// Search
$cari = "";
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $query = mysqli_query($koneksi, "SELECT * FROM absensi_ukri 
        WHERE nama_mahasiswa LIKE '%$cari%' 
        OR npm LIKE '%$cari%' 
        ORDER BY id DESC");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM absensi_ukri ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Absensi Mahasiswa UKRI</title>
</head>
<body>

<h2>ABSENSI MAHASISWA UKRI</h2>

<form method="GET" action="">
    <input type="text" name="cari" placeholder="Cari Nama / NPM" value="<?= $cari ?>">
    <button type="submit">Cari</button>
</form>

<br>

<a href="tambah.php">+ Tambah Absensi</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Status</th>
        <th>Bukti Foto</th>
        <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    while ($data = mysqli_fetch_array($query)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['npm']; ?></td>
            <td><?= $data['nama_mahasiswa']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['status_kelas']; ?></td>
            <td>
                <?php if ($data['bukti_kehadiran']) { ?>
                    <img src="uploads/<?= $data['bukti_kehadiran']; ?>" width="70">
                <?php } else {
                    echo "-";
                } ?>
            </td>
            <td>
                <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
