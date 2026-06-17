<?php

class Database {
    private $host     = "localhost";
    private $username = "root";
    private $password = ""; // Sesuaikan dengan password database Anda jika ada
    private $database = "DB_SIMULASI_PBO_TI 1C_Muhammad Praditya Maulana Arkananta";
    public $koneksi;

    // Constructor untuk otomatis mengaktifkan koneksi database
    public function __construct() {
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa apakah koneksi gagal
        if ($this->koneksi->connect_error) {
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
        
        // Sengaja tidak memakai echo sukses agar tampilan dashboard bersih nantinya
    }
}
?>