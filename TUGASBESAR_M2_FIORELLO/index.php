<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penghuni Kos</title>
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
        <h2>Daftar Penghuni Kos</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Penghuni</a>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor KTP</th>
                    <th>Pekerjaan</th>
                    <th>Nomor Telepon</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM Penghuni");
                while ($row = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $no++; ?></td>
                    <td><?php echo $row['Nama']; ?></td>
                    <td><?php echo $row['Identitas']; ?></td>
                    <td><?php echo $row['Pekerjaan']; ?></td>
                    <td><?php echo $row['Telepon']; ?></td>
                    <td style="text-align: center;">
                        <a href="edit.php?id=<?php echo $row['ID']; ?>" class="btn-edit">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['ID']; ?>" class="btn-edit" style="background-color: #d9534f;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2026 Pengelola Kos</p>
    </footer>
</body>
</html>