<?php
include '../../db.php';
session_start();

if (!isset($_SESSION['nomor_anggota'])) {
    header("Location: ../login.php");
    exit;
}

// Mendapatkan data anggota yang login berdasarkan nomor anggota
$nomor_anggota = $_SESSION['nomor_anggota'];
$stmt = $pdo->prepare("SELECT * FROM anggota WHERE nomor_anggota = ?");
$stmt->execute([$nomor_anggota]);
$anggota = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white text-center p-4">
        <h1 class="text-2xl font-bold">Profil Anggota</h1>
    </header>

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold mb-4">Data Profil Anggota</h2>
            <table class="min-w-full bg-white border">
                <tr>
                    <th class="py-2 px-4 border">Nomor Anggota</th>
                    <td class="py-2 px-4 border"><?php echo $anggota['nomor_anggota']; ?></td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border">NISN</th>
                    <td class="py-2 px-4 border"><?php echo $anggota['nisn']; ?></td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border">Masa Berlaku</th>
                    <td class="py-2 px-4 border"><?php echo $anggota['masa_berlaku']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
