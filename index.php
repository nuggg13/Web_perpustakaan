<?php
include 'db.php';
session_start();
if (!isset($_SESSION['nip'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="relative bg-gray-800 text-white text-center">
        <h1 class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-4xl font-bold">Selamat Datang di Perpustakaan</h1>
        <img src="assets/perpustakaan.png" alt="Gambar Perpustakaan" class="w-full h-64 object-cover opacity-70">
    </header>

    <nav class="bg-gray-900 text-white py-4">
        <div class="container mx-auto text-center">
            <ul class="flex justify-center space-x-4">
                <li><a href="siswa/index.php" class="hover:text-yellow-400">Kelola Siswa</a></li>
                <li><a href="anggota/index.php" class="hover:text-yellow-400">Kelola Anggota</a></li>
                <li><a href="buku/index.php" class="hover:text-yellow-400">Kelola Buku</a></li>
                <li><a href="peminjaman/index.php" class="hover:text-yellow-400">Peminjaman Buku</a></li>
                <li><a href="pustakawan/index.php" class="hover:text-yellow-400">Pustakawan</a></li>
            </ul>
        </div>
    </nav>

    <!-- Section untuk Siswa -->
    <section id="siswa" class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Kelola Siswa</h2>
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">NISN</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">Kelas</th>
                    <th class="py-2 px-4 border">Jurusan</th>
                    <th class="py-2 px-4 border">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM siswa");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>{$row['nisn']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['nama']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['kelas']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['jurusan']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['alamat']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Section untuk Anggota -->
    <section id="anggota" class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Kelola Anggota</h2>
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">Nomor Anggota</th>
                    <th class="py-2 px-4 border">NISN</th>
                    <th class="py-2 px-4 border">Masa Berlaku</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM anggota");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>{$row['nomor_anggota']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['nisn']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['masa_berlaku']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Section untuk Buku -->
    <section id="buku" class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Kelola Buku</h2>
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">ISBN</th>
                    <th class="py-2 px-4 border">Judul</th>
                    <th class="py-2 px-4 border">Penulis</th>
                    <th class="py-2 px-4 border">Penerbit</th>
                    <th class="py-2 px-4 border">Tahun Terbit</th>
                    <th class="py-2 px-4 border">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM buku");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>{$row['isbn']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['judul']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['penulis']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['penerbit']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['tahun_terbit']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['jumlah']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Section untuk Peminjaman -->
    <section id="peminjaman" class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Peminjaman Buku</h2>
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">ID Peminjaman</th>
                    <th class="py-2 px-4 border">Nomor Anggota</th>
                    <th class="py-2 px-4 border">ISBN</th>
                    <th class="py-2 px-4 border">Tanggal Peminjaman</th>
                    <th class="py-2 px-4 border">Tanggal Pengembalian</th>
                    <th class="py-2 px-4 border">Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM peminjaman");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>{$row['id_peminjaman']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['nomor_anggota']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['isbn']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['tanggal_peminjaman']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['tanggal_pengembalian']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['denda']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Section untuk Pustakawan -->
    <section id="pustakawan" class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Pustakawan</h2>
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">NIP</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">Jabatan</th>
                    <th class="py-2 px-4 border">Kontak</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM pustakawan");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>{$row['nip']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['nama']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['jabatan']}</td>";
                    echo "<td class='border px-4 py-2'>{$row['kontak']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
