<?php
// Menyisipkan file induk abstract class
require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik jalur Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Konstruktor untuk memetakan data dari database ke properti objek
    public function __construct($data) {
        parent::__construct();
        $this->id_pendaftaran         = $data['id_pendaftaran'];
        $this->nama_calon             = $data['nama_calon'];
        $this->asal_sekolah           = $data['asal_sekolah'];
        $this->nilai_ujian             = $data['nilai_ujian'];
        $this->biayaPendaftaranDasar   = $data['biaya_pendaftaran_dasar'];
        
        // Mengisi properti spesifik
        $this->skIkatanDinas          = $data['sk_ikatan_dinas'];
        $this->instansiSponsor         = $data['instansi_sponsor'];
    }

    // =========================================================================
    // METODE QUERY SPESIFIK
    // =========================================================================
    public function getDaftarKedinasan() {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $result = $this->koneksi->query($query);
        
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new PendaftaranKedinasan($row);
            }
        }
        return $daftar;
    }

    // Implementasi wajib dari metode abstrak induk (logika bisnis akan di-override di Tahap 5)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Sponsor: " . $this->instansiSponsor . " | No SK: " . $this->skIkatanDinas;
    }

    // Fungsi Getter untuk kebutuhan Dashboard View
    public function getId() { return $this->id_pendaftaran; }
    public function getNama() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilai() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }
}
?>