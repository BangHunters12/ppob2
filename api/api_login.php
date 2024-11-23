<?php
header("Content-Type: application/json");

include('../config/koneksi.php');
$conn = new mysqli($host, $user, $password, $database); // Gunakan variabel sesuai konfigurasi

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Koneksi database gagal']));
}

// Fungsi untuk merespons dalam format JSON
function sendResponse($status, $message, $data = null) {
    echo json_encode([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ]);
}

// Mendapatkan input dari JSON request
// $_POST = file_get_contents('php://input');
// var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($username === '' || $password === '') {
        sendResponse('error', 'Username dan password tidak boleh kosong ');
        exit;
    }

    // Mengamankan input user
    $username = $conn->real_escape_string($username);
    $password = md5($conn->real_escape_string($password)); // Sesuaikan dengan metode hashing Anda

    // Query untuk mencari pengguna di `tb_user`
    $sql = "SELECT * FROM tb_user WHERE user = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Kirim data user 
        sendResponse('success', 'Login berhasil', [
            'user_id' => $user['id'],
            'username' => $user['user'],
            'email' => $user['email'],
            'no_hp' => $user['no_hp']
        ]);
    } else {
        sendResponse('error', 'Username atau password salah');
    }

    $conn->close();
} else {
    sendResponse('error', 'Metode request tidak didukung');
}
?>
