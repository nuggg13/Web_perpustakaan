<?php
include '../db.php';

if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_peminjaman]);

    header("Location: index.php");
}
?>
