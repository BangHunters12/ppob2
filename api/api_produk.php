<?php
header("Content-Type: application/json");
include('../config/koneksi.php'); // Sesuaikan dengan file koneksi Anda

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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT id, title, harga_jual, image, kategori FROM tb_produk WHERE status = 1"; // Hanya produk aktif
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $produk = [];
        while ($row = $result->fetch_assoc()) {
            $produk[] = $row;
        }
        sendResponse('success', 'Data produk berhasil diambil', $produk);
    } else {
        sendResponse('error', 'Tidak ada produk yang tersedia');
    }

    $conn->close();
} else {
    sendResponse('error', 'Metode request tidak didukung');
}
?>
