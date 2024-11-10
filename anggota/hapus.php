<?php
include '../db.php';

if (isset($_GET['nomor_anggota'])) {
    $nomor_anggota = $_GET['nomor_anggota'];
    $sql = "DELETE FROM anggota WHERE nomor_anggota = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nomor_anggota]);

    header("Location: index.php");
}
?>
