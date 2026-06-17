<?php
require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($data) {
        parent::__construct(); 
        $this->id_pendaftaran         = $data['id_pendaftaran'];
        $this->nama_calon             = $data['nama_calon'];
        $this->asal_sekolah           = $data['asal_sekolah'];
        $this->nilai_ujian             = $data['nilai_ujian'];
        $this->biayaPendaftaranDasar   = $data['biaya_pendaftaran_dasar'];
        $this->pilihanProdi           = $data['pilihan_prodi'];
        $this->lokasiKampus           = $data['lokasi_kampus'];
    }

    public function getDaftarReguler() {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $result = $this->koneksi->query($query);
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new PendaftaranReguler($row);
            }
        }
        return $daftar;
    }

    // =========================================================================
    // METHOD OVERRIDING - JALUR REGULER
    // =========================================================================
    public function hitungTotalBiaya() {
        // Tarif standar murni
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Prodi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }

    public function getId() { return $this->id_pendaftaran; }
    public function getNama() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilai() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }
}
?>