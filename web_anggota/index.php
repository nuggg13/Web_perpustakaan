<?php
include '../db.php';
session_start();

if (!isset($_SESSION['nomor_anggota'])) {
    header("Location: login.php");
    exit;
}

// Mendapatkan data anggota yang login berdasarkan nomor anggota
$nomor_anggota = $_SESSION['nomor_anggota'];
$stmt = $pdo->prepare("SELECT * FROM anggota WHERE nomor_anggota = ?");
$stmt->execute([$nomor_anggota]);
$anggota = $stmt->fetch();

// Mendapatkan data peminjaman berdasarkan nomor anggota yang login
$stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE nomor_anggota = ?");
$stmt->execute([$nomor_anggota]);
$peminjaman = $stmt->fetchAll();

// Mendapatkan data buku
$stmt = $pdo->prepare("SELECT * FROM buku");
$stmt->execute();
$bukuList = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<header class="relative bg-gray-800 text-white text-center">
        <h1 class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-4xl font-bold">Selamat Datang di Perpustakaan</h1>
        <img src="../assets/perpustakaan.png" alt="Gambar Perpustakaan" class="w-full h-64 object-cover opacity-70">
    </header>

    <nav class="bg-gray-900 p-4 text-white">
        <a href="profil_anggota/index.php" class="mr-4 hover:underline">Profil Anggota</a>
        <a href="peminjaman/index.php" class="hover:underline">Peminjaman Buku</a>
    </nav>

    <div class="container mx-auto p-4">
        <!-- Profil Anggota -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-xl font-semibold mb-4">Profil Anggota</h2>
            <table class="min-w-full bg-white border">
                <tr>
                    <th class="py-2 px-4 border">Nomor Anggota</th>
                    <td class="py-2 px-4 border"><?php echo $anggota['nomor_anggota']; ?></td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border">NISN</th> <!-- Menampilkan NISN -->
                    <td class="py-2 px-4 border"><?php echo $anggota['nisn']; ?></td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border">Masa Berlaku</th>
                    <td class="py-2 px-4 border"><?php echo $anggota['masa_berlaku']; ?></td>
                </tr>
            </table>
        </div>

        <!-- Tabel Peminjaman Buku -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-xl font-semibold mb-4">Peminjaman Buku</h2>
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">ID Peminjaman</th>
                        <th class="py-2 px-4 border">ISBN</th>
                        <th class="py-2 px-4 border">Tanggal Peminjaman</th>
                        <th class="py-2 px-4 border">Tanggal Pengembalian</th>
                        <th class="py-2 px-4 border">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peminjaman as $pinjam): ?>
                    <tr>
                        <td class="py-2 px-4 border"><?php echo $pinjam['id_peminjaman']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $pinjam['isbn']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $pinjam['tanggal_peminjaman']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $pinjam['tanggal_pengembalian']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $pinjam['denda']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Tabel Buku -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold mb-4">Daftar Buku</h2>
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">ISBN</th>
                        <th class="py-2 px-4 border">Judul</th>
                        <th class="py-2 px-4 border">Penulis</th>
                        <th class="py-2 px-4 border">Tahun Terbit</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bukuList as $buku): ?>
                    <tr>
                        <td class="py-2 px-4 border"><?php echo $buku['isbn']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $buku['judul']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $buku['penulis']; ?></td>
                        <td class="py-2 px-4 border"><?php echo $buku['tahun_terbit']; ?></td>
                        <td class="py-2 px-4 border">
                            <a href="peminjaman/index.php?isbn=<?php echo $buku['isbn']; ?>" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Pinjam</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
