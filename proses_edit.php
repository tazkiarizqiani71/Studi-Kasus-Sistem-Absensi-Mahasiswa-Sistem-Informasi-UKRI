<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_mahasiswa'];
$npm = $_POST['npm'];
$kelas = $_POST['kelas'];
$status = $_POST['status_kelas'];

$foto = $_FILES['bukti_kehadiran']['name'];
$tmp = $_FILES['bukti_kehadiran']['tmp_name'];

if ($foto != "") {
    $nama_baru = time() . "_" . $foto;
    move_uploaded_file($tmp, "uploads/" . $nama_baru);

    mysqli_query($koneksi, "UPDATE absensi_ukri SET 
        nama_mahasiswa='$nama',
        npm='$npm',
        kelas='$kelas',
        status_kelas='$status',
        bukti_kehadiran='$nama_baru'
        WHERE id='$id'");
} else {
    mysqli_query($koneksi, "UPDATE absensi_ukri SET 
        nama_mahasiswa='$nama',
        npm='$npm',
        kelas='$kelas',
        status_kelas='$status'
        WHERE id='$id'");
}

header("Location: index.php");
?>
