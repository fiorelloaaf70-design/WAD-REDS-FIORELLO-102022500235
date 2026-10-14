<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama      = $_POST['nama'];
    $identitas = $_POST['identitas'];
    $pekerjaan = $_POST['pekerjaan'];
    $telepon   = $_POST['telepon'];

    $query = "INSERT INTO Penghuni (Nama, Identitas, Pekerjaan, Telepon) VALUES ('$nama', '$identitas', '$pekerjaan', '$telepon')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penghuni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Sistem Manajemen Kos & Pengelola</h2>
    </header>
    <nav>
        <a href="index.php">Daftar Penghuni</a>
        <a href="tambah.php">Tambah Data Penghuni</a>
    </nav>
    <main>
        <h2>Form Tambah Penghuni Kos</h2>
        <form action="" method="POST">
            <div class="grup-input">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="grup-input">
                <label>Nomor KTP / Identitas</label>
                <input type="text" name="identitas" placeholder="Masukkan nomor KTP" required>
            </div>
            <div class="grup-input">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" placeholder="Contoh: Mahasiswa, Karyawan" required>
            </div>
            <div class="grup-input">
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" placeholder="Masukkan nomor telepon aktif" required>
            </div>
            <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
        </form>
        <br>
        <a href="index.php" class="btn-kembali">Kembali ke Daftar Penghuni</a>
    </main>
    <footer>
        <p>&copy; 2026 Pengelola Kos</p>
    </footer>
</body>
</html>