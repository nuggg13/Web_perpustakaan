<?php
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Siswa</h2>
        <a href="tambah.php" class="mb-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Siswa</a>
        
        <table class="min-w-full bg-white border mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">NISN</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">Kelas</th>
                    <th class="py-2 px-4 border">Jurusan</th>
                    <th class="py-2 px-4 border">Alamat</th>
                    <th class="py-2 px-4 border">Aksi</th>
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
                    echo "<td class='border px-4 py-2'>";
                    echo "<a href='edit.php?nisn={$row['nisn']}' class='text-blue-500 hover:underline'>Edit</a> | ";
                    echo "<a href='delete.php?nisn={$row['nisn']}' class='text-red-500 hover:underline'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
