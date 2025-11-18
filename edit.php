<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rrq WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Alumni</h2>
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
        
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" value="<?= $data['tahun_lulus'] ?>" required>
        
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="RPL" <?= $data['jurusan'] == 'RPL' ? 'selected' : '' ?>>RPL</option>
            <option value="TKJ" <?= $data['jurusan'] == 'TKJ' ? 'selected' : '' ?>>TKJ</option>
            <option value="TJAT" <?= $data['jurusan'] == 'TJAT' ? 'selected' : '' ?>>TJAT</option>
            <option value="ANIMASI" <?= $data['jurusan'] == 'ANIMASI' ? 'selected' : '' ?>>ANIMASI</option>
        </select>
        
        <label>Pekerjaan Saat Ini</label>
        <input type="text" name="pekerjaan_saat_ini" value="<?= $data['pekerjaan_saat_ini'] ?>" required>
        
        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="<?= $data['nomor_telepon'] ?>" required>
        
        <label>Email</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" required>
        
        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
        
        <button type="submit" name="update">Update Data</button>
        <a href="index.php" style="margin-left: 10px;">Batal</a>
    </form>
    <?php
    if (isset($_POST['update'])) {
        $sql = "UPDATE rrq SET
            nama='$_POST[nama]',
            tahun_lulus='$_POST[tahun_lulus]',
            jurusan='$_POST[jurusan]',
            pekerjaan_saat_ini='$_POST[pekerjaan_saat_ini]',
            nomor_telepon='$_POST[nomor_telepon]',
            email='$_POST[email]',
            alamat='$_POST[alamat]'
            WHERE id=$id";
        mysqli_query($conn, $sql);
        echo "<p>Data berhasil diupdate! <a href='index.php'>Kembali</a></p>";
    }
    ?>
</body>
</html>
