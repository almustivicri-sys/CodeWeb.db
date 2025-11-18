<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Alumni Sekolah</h2>
    <a href="tambah.php" id="tambahdata">+ Tambah Data</a>
    <!-- FORM PENCARIAN -->
    <form method="GET" style="margin-bottom: 20px;">
        <input type="text" name="cari" placeholder="Cari nama / jurusan / pekerjaan..."
            value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
        <button type="submit">Cari</button>
    </form>

    <?php if (isset($_GET['cari']) && $_GET['cari'] != ''): ?>
    <a href="index.php" style="
        display:inline-block; 
        margin-top:10px; 
        margin-bottom:20px; 
        padding:8px 12px; 
        background:#007BFF; 
        color:#fff; 
        text-decoration:none; 
        border-radius:5px;">
        Kembali
    </a>
    
<?php endif; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tahun Lulus</th>
            <th>Jurusan</th>
            <th>Pekerjaan Saat Ini</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Perubahan</th>
        </tr>
        <?php
        // PENCARIAN
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $result = mysqli_query($conn, "SELECT * FROM rrq 
                WHERE nama LIKE '%$cari%' 
                OR jurusan LIKE '%$cari%' 
                OR pekerjaan_saat_ini LIKE '%$cari%' 
                OR tahun_lulus LIKE '%$cari%' ");
        } else {
            $result = mysqli_query($conn, "SELECT * FROM rrq");
        }
        // TAMPILKAN DATA
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['tahun_lulus']}</td>
                <td>{$row['jurusan']}</td>
                <td>{$row['pekerjaan_saat_ini']}</td>
                <td>{$row['nomor_telepon']}</td>
                <td>{$row['email']}</td>
                <td>{$row['alamat']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
