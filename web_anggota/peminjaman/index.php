<?php
include '../../db.php';
session_start();

if (!isset($_SESSION['nomor_anggota'])) {
    header("Location: ../login.php");
    exit;
}

$nomor_anggota = $_SESSION['nomor_anggota'];

// Menambahkan peminjaman baru
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['isbn'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    // Generate ID Peminjaman baru
    $stmt = $pdo->prepare("SELECT MAX(id_peminjaman) AS max_id FROM peminjaman");
    $stmt->execute();
    $row = $stmt->fetch();
    $new_id_peminjaman = $row['max_id'] + 1;

    // Insert ke tabel peminjaman
    $stmt = $pdo->prepare("INSERT INTO peminjaman (id_peminjaman, nomor_anggota, isbn, tanggal_peminjaman, tanggal_pengembalian, denda) VALUES (?, ?, ?, ?, ?, 0)");
    $stmt->execute([$new_id_peminjaman, $nomor_anggota, $isbn, $tanggal_peminjaman, $tanggal_pengembalian]);

    header("Location: index.php");
    exit;
}

// Mendapatkan daftar ISBN buku untuk dipilih anggota
$stmt = $pdo->prepare("SELECT isbn, judul FROM buku");
$stmt->execute();
$bukuList = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white text-center p-4">
        <h1 class="text-2xl font-bold">Formulir Peminjaman Buku</h1>
    </header>

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold mb-4">Isi Data Peminjaman</h2>
            <form method="POST" action="">
                <div class="mb-4">
                    <label class="block text-gray-700">Nomor Anggota:</label>
                    <input type="text" name="nomor_anggota" value="<?php echo $nomor_anggota; ?>" readonly class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Pilih ISBN Buku:</label>
                    <select name="isbn" class="w-full px-4 py-2 border rounded-lg" required>
                        <?php foreach ($bukuList as $buku): ?>
                            <option value="<?php echo $buku['isbn']; ?>"><?php echo $buku['judul']; ?> - <?php echo $buku['isbn']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Peminjaman:</label>
                    <input type="date" name="tanggal_peminjaman" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Pengembalian:</label>
                    <input type="date" name="tanggal_pengembalian" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Pinjam Buku</button>
            </form>
        </div>
    </div>
</body>
</html>
