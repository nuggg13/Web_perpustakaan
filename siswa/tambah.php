<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $stmt = $pdo->prepare("INSERT INTO siswa (nisn, nama, kelas, jurusan, alamat) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nisn, $nama, $kelas, $jurusan, $alamat]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Siswa</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="nisn" class="block text-sm font-medium text-gray-600">NISN</label>
                <input type="text" name="nisn" id="nisn" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="nama" id="nama" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-600">Kelas</label>
                <input type="text" name="kelas" id="kelas" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="jurusan" class="block text-sm font-medium text-gray-600">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                <input type="text" name="alamat" id="alamat" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Simpan</button>
        </form>
    </div>
</body>
</html>
