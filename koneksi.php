<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_absensi_ukri");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
