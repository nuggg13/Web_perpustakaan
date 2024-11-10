<?php
include '../db.php';

if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];
    $sql = "DELETE FROM buku WHERE isbn = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$isbn]);

    header("Location: index.php");
}
?>
