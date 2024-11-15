<?php
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        $this->conn = new mysqli('localhost', 'root', '', 'ppob');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function testDatabaseConnection()
    {
        $this->assertTrue($this->conn->ping());
    }

    public function testSeoDataFetch()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM `tb_seo` WHERE id = 1");
        $this->assertNotEmpty($result, 'Data tidak ditemukan di tb_seo');
    }

    public function testSocialDataFetch()
    {
        $pengguna = 'some_user';
        $result = mysqli_query($this->conn, "SELECT * FROM `tb_social` WHERE user = '$pengguna'");
        $this->assertNotEmpty($result, 'Data tidak ditemukan di tb_social');
    }

    protected function tearDown(): void
    {
        $this->conn->close();
    }
}
