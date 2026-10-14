<?php
include 'koneksi.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

$id = $_GET['id'];

// Ambil data berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM Penghuni WHERE ID = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// Jika tombol update diklik
if (isset($_POST['update'])) {
    $nama      = $_POST['nama'];
    $identitas = $_POST['identitas'];
    $pekerjaan = $_POST['pekerjaan'];
    $telepon   = $_POST['telepon'];

    $query = "UPDATE Penghuni SET Nama='$nama', Identitas='$identitas', Pekerjaan='$pekerjaan', Telepon='$telepon' WHERE ID=$id";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='index.php';</script>";
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
    <title>Edit Data Penghuni</title>
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
        <h2>Form Edit Penghuni Kos</h2>
        <form action="" method="POST">
            <div class="grup-input">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?php echo $row['Nama']; ?>" required>
            </div>
            <div class="grup-input">
                <label>Nomor KTP / Identitas</label>
                <input type="text" name="identitas" value="<?php echo $row['Identitas']; ?>" required>
            </div>
            <div class="grup-input">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" value="<?php echo $row['Pekerjaan']; ?>" required>
            </div>
            <div class="grup-input">
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" value="<?php echo $row['Telepon']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn-submit" style="background-color: #f39c12;">Simpan Perubahan</button>
        </form>
        <br>
        <a href="index.php" class="btn-kembali">Kembali ke Daftar Penghuni</a>
    </main>
    <footer>
        <p>&copy; 2026 Pengelola Kos</p>
    </footer>
</body>
</html>