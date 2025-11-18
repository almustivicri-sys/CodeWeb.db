<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    mysqli_query($conn, "DELETE FROM rrq WHERE id = $id");

    mysqli_query($conn, "SET @num := 0");
    mysqli_query($conn, "UPDATE alumni SET id = @num := @num + 1 ORDER BY id");
    mysqli_query($conn, "ALTER TABLE alumni AUTO_INCREMENT = 1");
}

header("Location: index.php");
exit;
