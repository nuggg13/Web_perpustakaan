<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kontak = $_POST['kontak'];

    $stmt = $pdo->prepare("INSERT INTO pustakawan (nip, nama, jabatan, kontak) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nip, $nama, $jabatan, $kontak]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pustakawan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Pustakawan</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-600">NIP</label>
                <input type="text" name="nip" id="nip" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="nama" id="nama" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="jabatan" class="block text-sm font-medium text-gray-600">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="kontak" class="block text-sm font-medium text-gray-600">Kontak</label>
                <input type="text" name="kontak" id="kontak" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Simpan</button>
        </form>
    </div>
</body>
</html>
