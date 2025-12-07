<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM absensi_ukri WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
</head>
<body>

<h2>Edit Absensi</h2>

<form action="proses_edit.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    Nama:
    <input type="text" name="nama_mahasiswa" value="<?= $data['nama_mahasiswa']; ?>" required><br><br>

    NPM:
    <input type="text" name="npm" value="<?= $data['npm']; ?>" required><br><br>

    Kelas:
    <input type="text" name="kelas" value="<?= $data['kelas']; ?>" required><br><br>

    Status Kehadiran:
    <select name="status_kelas">
        <option value="hadir" <?= $data['status_kelas']=='hadir'?'selected':'' ?>>Hadir</option>
        <option value="alpa" <?= $data['status_kelas']=='alpa'?'selected':'' ?>>Alpa</option>
        <option value="izin" <?= $data['status_kelas']=='izin'?'selected':'' ?>>Izin</option>
        <option value="sakit" <?= $data['status_kelas']=='sakit'?'selected':'' ?>>Sakit</option>
    </select><br><br>

    Bukti Foto:
    <input type="file" name="bukti_kehadiran"><br><br>

    Foto Saat Ini:
    <?php if ($data['bukti_kehadiran']) { ?>
        <img src="uploads/<?= $data['bukti_kehadiran']; ?>" width="80">
    <?php } else { echo "-"; } ?>
    <br><br>

    <button type="submit">Simpan Perubahan</button>

</form>

</body>
</html>
