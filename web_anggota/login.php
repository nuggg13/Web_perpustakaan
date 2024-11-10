<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor_anggota = $_POST['nomor_anggota'];
    $nisn = $_POST['nisn'];

    // Verifikasi nomor anggota dan nisn
    $stmt = $pdo->prepare("SELECT * FROM anggota WHERE nomor_anggota = ? AND nisn = ?");
    $stmt->execute([$nomor_anggota, $nisn]);
    $anggota = $stmt->fetch();

    if ($anggota) {
        $_SESSION['nomor_anggota'] = $anggota['nomor_anggota'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Nomor anggota atau NISN salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Login Anggota</h2>
        <?php if (isset($error)) { echo "<p class='text-red-500 text-center'>$error</p>"; } ?>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="nomor_anggota" class="block text-sm font-medium text-gray-600">Nomor Anggota</label>
                <input type="text" name="nomor_anggota" id="nomor_anggota" required class="w-full px-4 py-2 border rounded-lg focus:outline-none">
            </div>
            <div>
                <label for="nisn" class="block text-sm font-medium text-gray-600">NISN</label>
                <input type="text" name="nisn" id="nisn" required class="w-full px-4 py-2 border rounded-lg focus:outline-none">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">Login</button>
        </form>
    </div>
</body>
</html>
