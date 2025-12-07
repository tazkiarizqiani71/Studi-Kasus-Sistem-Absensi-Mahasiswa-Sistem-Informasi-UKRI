<!DOCTYPE html>
<html>
<head>
    <title>Tambah Absensi</title>
</head>
<body>

<h2>Tambah Absensi Mahasiswa</h2>

<form action="proses_tambah.php" method="POST" enctype="multipart/form-data">

    Nama:
    <input type="text" name="nama_mahasiswa" required><br><br>

    NPM:
    <input type="text" name="npm" required><br><br>

    Kelas:
    <input type="text" name="kelas" required><br><br>

    Status Kehadiran:
    <select name="status_kelas" required>
        <option value="hadir">Hadir</option>
        <option value="alpa">Alpa</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
    </select><br><br>

    Bukti Foto (Selfie / Surat):
    <input type="file" name="bukti_kehadiran"><br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>
