<?php
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Peminjaman Buku</h2>
        <a href="tambah.php" class="mb-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Peminjaman</a>
        
        <table class="min-w-full bg-white border mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">ID Peminjaman</th>
                    <th class="py-2 px-4 border">Nomor Anggota</th>
                    <th class="py-2 px-4 border">ISBN</th>
                    <th class="py-2 px-4 border">Tanggal Peminjaman</th>
                    <th class="py-2 px-4 border">Tanggal Pengembalian</th>
                    <th class="py-2 px-4 border">Denda</th>
                    <th class="py-2 px-4 border">Aksi</th>
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
                    echo "<td class='border px-4 py-2'>";
                    echo "<a href='edit.php?id_peminjaman={$row['id_peminjaman']}' class='text-blue-500 hover:underline'>Edit</a> | ";
                    echo "<a href='delete.php?id_peminjaman={$row['id_peminjaman']}' class='text-red-500 hover:underline'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
