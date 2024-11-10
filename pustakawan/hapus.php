<?php
include '../db.php';

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $sql = "DELETE FROM pustakawan WHERE nip = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nip]);

    header("Location: index.php");
}
?>
