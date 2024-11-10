<?php
include '../db.php';

if (isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];
    $sql = "DELETE FROM siswa WHERE nisn = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nisn]);

    header("Location: index.php");
}
?>
