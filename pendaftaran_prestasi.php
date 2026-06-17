<?php
// Menyisipkan file induk abstract class
require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik jalur Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Konstruktor untuk memetakan data dari database ke properti objek
    public function __construct($data) {
        parent::__construct();
        $this->id_pendaftaran         = $data['id_pendaftaran'];
        $this->nama_calon             = $data['nama_calon'];
        $this->asal_sekolah           = $data['asal_sekolah'];
        $this->nilai_ujian             = $data['nilai_ujian'];
        $this->biayaPendaftaranDasar   = $data['biaya_pendaftaran_dasar'];
        
        // Mengisi properti spesifik
        $this->jenisPrestasi          = $data['jenis_prestasi'];
        $this->tingkatPrestasi         = $data['tingkat_prestasi'];
    }

    // =========================================================================
    // METODE QUERY SPESIFIK
    // =========================================================================
    public function getDaftarPrestasi() {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $result = $this->koneksi->query($query);
        
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new PendaftaranPrestasi($row);
            }
        }
        return $daftar;
    }

    // Implementasi wajib dari metode abstrak induk (logika bisnis akan di-override di Tahap 5)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Prestasi: " . $this->jenisPrestasi . " (" . $this->tingkatPrestasi . ")";
    }

    // Fungsi Getter untuk kebutuhan Dashboard View
    public function getId() { return $this->id_pendaftaran; }
    public function getNama() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilai() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }
}
?>