<?php
header("Content-Type: application/json");
include('config/koneksi.php');

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

$input = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($input['user_id']) ? intval($input['user_id']) : 0;

    if ($user_id <= 0) {
        sendResponse('error', 'User ID tidak valid');
        exit;
    }

    $sql = "SELECT saldo FROM tb_balance WHERE userID = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        sendResponse('success', 'Saldo berhasil diambil', ['saldo' => $row['saldo']]);
    } else {
        sendResponse('error', 'Saldo tidak ditemukan untuk user ini');
    }

    $conn->close();
} else {
    sendResponse('error', 'Metode request tidak didukung');
}
?>
