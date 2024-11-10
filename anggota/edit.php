<?php
include '../db.php';

$nomor_anggota = $_GET['nomor_anggota'];
$stmt = $pdo->prepare("SELECT * FROM anggota WHERE nomor_anggota = ?");
$stmt->execute([$nomor_anggota]);
$anggota = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $masa_berlaku = $_POST['masa_berlaku'];

    $stmt = $pdo->prepare("UPDATE anggota SET nisn = ?, masa_berlaku = ? WHERE nomor_anggota = ?");
    $stmt->execute([$nisn, $masa_berlaku, $nomor_anggota]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Anggota</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="nisn" class="block text-sm font-medium text-gray-600">NISN</label>
                <input type="text" name="nisn" id="nisn" value="<?php echo $anggota['nisn']; ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="masa_berlaku" class="block text-sm font-medium text-gray-600">Masa Berlaku</label>
                <input type="date" name="masa_berlaku" id="masa_berlaku" value="<?php echo $anggota['masa_berlaku']; ?>" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
