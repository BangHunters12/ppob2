<?php
header("Content-Type: application/json");
include('config/koneksi.php'); // Sesuaikan dengan file koneksi Anda

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Koneksi database gagal']));
}

function sendResponse($status, $message, $data = null) {
    echo json_encode([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ]);
}

// $_POST = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    $total = isset($_POST['total']) ? intval($_POST['total']) : 0;
    $transaksi = isset($_POST['transaksi']) ? $conn->real_escape_string($_POST['transaksi']) : '';

    if ($user_id <= 0 || $total <= 0 || $transaksi === '') {
        sendResponse('error', 'Data transaksi tidak valid');
        exit;
    }

    // Insert transaksi ke tabel `tb_transaksi`
    $kd_transaksi = uniqid('TRX'); // Membuat kode transaksi unik
    $sql = "INSERT INTO tb_transaksi (kd_transaksi, date, transaksi, total, saldo, userID) VALUES ('$kd_transaksi', NOW(), '$transaksi', $total, 0, $user_id)";

    if ($conn->query($sql) === TRUE) {
        sendResponse('success', 'Transaksi berhasil diproses', ['kd_transaksi' => $kd_transaksi]);
    } else {
        sendResponse('error', 'Gagal memproses transaksi');
    }

    $conn->close();
} else {
    sendResponse('error', 'Metode request tidak didukung');
}
?>
