<?php
include 'koneksi.php';

$nama = $_POST['nama_mahasiswa'];
$npm = $_POST['npm'];
$kelas = $_POST['kelas'];
$status = $_POST['status_kelas'];

$foto = $_FILES['bukti_kehadiran']['name'];
$tmp = $_FILES['bukti_kehadiran']['tmp_name'];

$nama_foto = "";

if ($foto != "") {
    $nama_foto = time() . "_" . $foto;
    move_uploaded_file($tmp, "uploads/" . $nama_foto);
}

$query = mysqli_query($koneksi, "INSERT INTO absensi_ukri (nama_mahasiswa, npm, kelas, status_kelas, bukti_kehadiran)
VALUES ('$nama', '$npm', '$kelas', '$status', '$nama_foto')");

header("Location: index.php");
?>
