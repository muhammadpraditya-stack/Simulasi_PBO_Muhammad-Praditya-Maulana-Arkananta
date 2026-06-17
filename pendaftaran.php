<?php
// Menyisipkan file koneksi database
require_once 'database.php';

abstract class Pendaftaran extends Database {
    // Properti terenkapsulasi (protected) sesuai dengan kolom database
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk mewarisi koneksi dari class Database
    public function __construct() {
        parent::__construct();
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib Diimplementasikan oleh Kelas Anak)
    // =========================================================================
    
    // Untuk menghitung total biaya pendaftaran berdasarkan logika bisnis jalur masing-masing
    abstract public function hitungTotalBiaya();

    // Untuk menampilkan spesifikasi atau atribut unik dari setiap jalur pendaftaran
    abstract public function tampilkanInfoJalur();
}
?>