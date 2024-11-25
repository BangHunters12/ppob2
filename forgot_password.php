<?php
include('config/koneksi.php');

$action = $_POST['action'] ?? '';

if ($action === 'validate_user') {
    // Validasi data pengguna
    $fullname = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');

    if ($fullname && $email && $no_hp) {
        // Validasi tambahan
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid']);
            exit;
        }

        if (!preg_match('/^[0-9]{10,15}$/', $no_hp)) {
            echo json_encode(['status' => 'error', 'message' => 'Nomor HP tidak valid']);
            exit;
        }

        // prepared statement untuk mencegah SQL injection
        $stmt = $conn->prepare("SELECT * FROM tb_user WHERE full_name = ? AND email = ? AND no_hp = ?");
        if (!$stmt) {
            error_log('Query Error: ' . $conn->error); // Debug
            echo json_encode(['status' => 'error', 'message' => 'Kesalahan server.']);
            exit;
        }

        $stmt->bind_param("sss", $fullname, $email, $no_hp);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            // menyimpan email di session
            session_start();
            $_SESSION['reset_email'] = $email;
            echo json_encode(['status' => 'success', 'message' => 'Data valid, silakan reset password']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Semua field wajib diisi']);
    }

} elseif ($action === 'reset_password') {
    // Reset password
    session_start();
    if (!isset($_SESSION['reset_email'])) {
        echo json_encode(['status' => 'error', 'message' => 'Session tidak valid. Silakan validasi ulang.']);
        exit;
    }

    $new_password = trim($_POST['new_password'] ?? '');
    $email = $_SESSION['reset_email'];

    if ($new_password) {
        if (strlen($new_password) < 6) {
            echo json_encode(['status' => 'error', 'message' => 'Password harus memiliki minimal 6 karakter']);
            exit;
        }

        // password baru
        $hashed_password = md5($new_password);

        // Update kolom pass dan re_pass
        $stmt = $conn->prepare("UPDATE tb_user SET pass = ?, re_pass = ? WHERE email = ?");
        if (!$stmt) {
            error_log('Query Error: ' . $conn->error); // Debug
            echo json_encode(['status' => 'error', 'message' => 'Kesalahan server.']);
            exit;
        }

        $stmt->bind_param("sss", $hashed_password, $new_password, $email); // Masukkan nilai asli di re_pass
        $result = $stmt->execute();

        if ($result) {
            unset($_SESSION['reset_email']); // Hapus session
            echo json_encode(['status' => 'success', 'message' => 'Password berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan, coba lagi']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Password baru tidak boleh kosong']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Aksi tidak valid']);
}
?>
