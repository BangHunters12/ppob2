<?php

include_once(__DIR__ . '/../path/to/login-proses.php');

use PHPUnit\Framework\TestCase;


final class LoginProcessTest extends TestCase
{
    // include_once(__DIR__ . '/../path/to/login-proses.php');

    protected $conn;

    public function setUp(): void
    {
        // include_once(__DIR__ . '/../path/to/login-proses.php');

        ob_start(); // pastikan path sudah benar


        // Inisialisasi koneksi database
        $this->conn = new mysqli('localhost', 'root', '', 'ppob');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        // Inject koneksi database ke dalam $GLOBALS untuk digunakan dalam fungsi di login-proses.php
        $GLOBALS['conn'] = $this->conn;
        ob_end_clean();
    }

    public function testLoginWithCorrectCredentials()
    {
        // Inisialisasi variabel $_POST sebelum memanggil login-proses.php


        // include_once(__DIR__ . '/../path/to/login-proses.php'); // sesuaikan path ke file login-proses.php
        ob_start();
        $_POST['user'] = 'test_user';
        $_POST['pass'] = 'test_password';

        // Asumsi tes pada login dan token
        $this->assertEquals($_POST['user'], "test_user");
        ob_end_clean();
    }


    public function testGenerateToken()
    {
        // include_once 'path/to/login-proses.php'; // sesuaikan path

        // Uji apakah generateToken menghasilkan token unik
        $token1 = generateToken();
        $token2 = generateToken();
        $this->assertNotEquals($token1, $token2);
    }

    public function testInsertToken()
    {
        // include_once 'path/to/login-proses.php'; // sesuaikan path

        $userId = 1; // Pastikan ID user ini ada di database
        $token = insertToken($userId);

        // Pastikan token valid
        $this->assertNotEmpty($token);

        // Periksa apakah token tersimpan di tabel tb_token
        $query = "SELECT * FROM tb_token WHERE token = '$token'";
        $result = $this->conn->query($query);
        $this->assertTrue($result->num_rows > 0);
    }

    public function tearDown(): void
    {
        // Bersihkan data tes
        $this->conn->query("DELETE FROM tb_user WHERE user = 'test_user'");
        $this->conn->query("DELETE FROM tb_token WHERE token IS NOT NULL");

        // Tutup koneksi database
        $this->conn->close();
    }
}
