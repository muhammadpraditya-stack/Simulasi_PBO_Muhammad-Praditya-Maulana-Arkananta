<?php
require_once 'pendaftaran.php';
// pbo
class PendaftaranPrestasi extends Pendaftaran {
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($data) {
        parent::__construct();
        $this->id_pendaftaran         = $data['id_pendaftaran'];
        $this->nama_calon             = $data['nama_calon'];
        $this->asal_sekolah           = $data['asal_sekolah'];
        $this->nilai_ujian             = $data['nilai_ujian'];
        $this->biayaPendaftaranDasar   = $data['biaya_pendaftaran_dasar'];
        $this->jenisPrestasi          = $data['jenis_prestasi'];
        $this->tingkatPrestasi         = $data['tingkat_prestasi'];
    }

    // DIUBAH MENJADI STATIC FUNCTION
    public static function getDaftarPrestasi() {
        $db = new Database();
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $result = $db->koneksi->query($query);
        
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new PendaftaranPrestasi($row);
            }
        }
        return $daftar;
    }

    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Prestasi: " . $this->jenisPrestasi . " (" . $this->tingkatPrestasi . ")";
    }

    public function getId() { return $this->id_pendaftaran; }
    public function getNama() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilai() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }
}
?>