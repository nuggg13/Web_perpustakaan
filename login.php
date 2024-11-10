<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];

    // Query untuk memeriksa apakah pustakawan dengan NIP dan nama yang diberikan ada di database
    $stmt = $pdo->prepare("SELECT * FROM pustakawan WHERE nip = ? AND nama = ?");
    $stmt->execute([$nip, $nama]);
    $pustakawan = $stmt->fetch();

    if ($pustakawan) {
        $_SESSION['nip'] = $nip;
        $_SESSION['nama'] = $nama;
        header("Location: index.php");
        exit;
    } else {
        $error = "NIP atau Nama tidak valid!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login Pustakawan</h2>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-600">NIP</label>
                <input type="text" name="nip" id="nip" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" name="nama" id="nama" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Login</button>
        </form>
    </div>
</body>
</html>
