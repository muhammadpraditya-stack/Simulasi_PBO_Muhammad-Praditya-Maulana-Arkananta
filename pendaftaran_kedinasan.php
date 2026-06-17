<?php
require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($data) {
        parent::__construct();
        $this->id_pendaftaran         = $data['id_pendaftaran'];
        $this->nama_calon             = $data['nama_calon'];
        $this->asal_sekolah           = $data['asal_sekolah'];
        $this->nilai_ujian             = $data['nilai_ujian'];
        $this->biayaPendaftaranDasar   = $data['biaya_pendaftaran_dasar'];
        $this->skIkatanDinas          = $data['sk_ikatan_dinas'];
        $this->instansiSponsor         = $data['instansi_sponsor'];
    }

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

    // =========================================================================
    // METHOD OVERRIDING - JALUR KEDINASAN
    // =========================================================================
    public function hitungTotalBiaya() {
        // Biaya dasar dikenakan tambahan 25%
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Sponsor: " . $this->instansiSponsor . " | No SK: " . $this->skIkatanDinas;
    }

    public function getId() { return $this->id_pendaftaran; }
    public function getNama() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilai() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }
}
?>