<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor_anggota = $_POST['nomor_anggota'];
    $isbn = $_POST['isbn'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $stmt = $pdo->prepare("INSERT INTO peminjaman (nomor_anggota, isbn, tanggal_peminjaman, tanggal_pengembalian, denda) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nomor_anggota, $isbn, $tanggal_peminjaman, $tanggal_pengembalian, $denda]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Peminjaman</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="nomor_anggota" class="block text-sm font-medium text-gray-600">Nomor Anggota</label>
                <input type="text" name="nomor_anggota" id="nomor_anggota" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-600">ISBN Buku</label>
                <input type="text" name="isbn" id="isbn" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-600">Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-600">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="denda" class="block text-sm font-medium text-gray-600">Denda</label>
                <input type="number" name="denda" id="denda" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Simpan</button>
        </form>
    </div>
</body>
</html>
