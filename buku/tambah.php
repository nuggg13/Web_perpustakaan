<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $jumlah = $_POST['jumlah'];

    $stmt = $pdo->prepare("INSERT INTO buku (isbn, judul, penulis, penerbit, tahun_terbit, jumlah) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$isbn, $judul, $penulis, $penerbit, $tahun_terbit, $jumlah]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Buku</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-600">ISBN</label>
                <input type="text" name="isbn" id="isbn" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="judul" id="judul" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="penulis" class="block text-sm font-medium text-gray-600">Penulis</label>
                <input type="text" name="penulis" id="penulis" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="penerbit" class="block text-sm font-medium text-gray-600">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="tahun_terbit" class="block text-sm font-medium text-gray-600">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-600">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Simpan</button>
        </form>
    </div>
</body>
</html>
