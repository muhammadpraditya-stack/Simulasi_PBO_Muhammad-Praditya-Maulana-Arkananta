<?php
// 1. Menyisipkan seluruh file subclass konkrit yang dibutuhkan
require_once 'pendaftaran_reguler.php';
require_once 'pendaftaran_prestasi.php';
require_once 'pendaftaran_kedinasan.php';

// 2. Memanggil static method langsung dari Class-nya tanpa bikin dummy object lagi!
$dataReguler   = PendaftaranReguler::getDaftarReguler();
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi();
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PMB - Pemrograman Berorientasi Objek</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 30px; color: #2d3436; }
        .wrapper { max-width: 1300px; margin: 0 auto; }
        h1 { text-align: center; color: #2c3e50; font-size: 2.2rem; margin-bottom: 5px; }
        .sub-h1 { text-align: center; color: #7f8c8d; margin-bottom: 40px; font-size: 1rem; }
        
        /* Styling Kelompok Judul Tabel */
        .group-header { padding: 12px 20px; color: white; font-weight: bold; font-size: 1.2rem; border-radius: 6px 6px 0 0; margin-top: 35px; }
        .bg-reguler { background-color: #2980b9; }
        .bg-prestasi { background-color: #27ae60; }
        .bg-kedinasan { background-color: #d35400; }

        /* Styling Tabel */
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 0 0 6px 6px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 25px; }
        th, td { padding: 12px 18px; text-align: left; border-bottom: 1px solid #edf2f7; font-size: 0.95rem; }
        th { color: white; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; }
        .th-reguler { background-color: #3498db; }
        .th-prestasi { background-color: #2ecc71; }
        .th-kedinasan { background-color: #e67e22; }
        
        /* Variasi Baris & Efek Hover */
        tr:nth-child(even) { background-color: #fcfcfc; }
        tr:hover { background-color: #f1f2f6; transition: background 0.2s ease; }
        
        /* Badge & Font Utility */
        .info-unik { color: #57606f; font-style: italic; font-weight: 500; }
        .badge-biaya { background-color: #1dd1a1; color: #ffffff; padding: 6px 12px; border-radius: 4px; font-weight: bold; display: inline-block; font-size: 0.9rem; }
        .text-empty { text-align: center; color: #a4b0be; font-style: italic; padding: 25px; }
    </style>
</head>
<body>

<div class="wrapper">
    <h1>🎓 Dashboard Pendaftaran Mahasiswa Baru (PMB)</h1>
    <div class="sub-h1">Sistem Simulasi Implementasi Abstraksi, Pewarisan, dan Polimorfisme Overriding</div>

    <div class="group-header bg-reguler">📂 Jalur Pendaftaran: Reguler</div>
    <table>
        <thead>
            <tr>
                <th class="th-reguler" width="5%">ID</th>
                <th class="th-reguler" width="22%">Nama Calon</th>
                <th class="th-reguler" width="20%">Asal Sekolah</th>
                <th class="th-reguler" width="10%">Nilai Ujian</th>
                <th class="th-reguler" width="15%">Biaya Dasar</th>
                <th class="th-reguler" width="15%">Spesifikasi Jalur (Polimorfik)</th>
                <th class="th-reguler" width="13%">Total Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataReguler)): ?>
                <tr><td colspan="7" class="text-empty">Tidak ada data pendaftar jalur reguler ditemukan.</td></tr>
            <?php else: ?>
                <?php foreach ($dataReguler as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($mhs->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                        <td><?= number_format($mhs->getNilai(), 2); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaDasar(), 0, ',', '.'); ?></td>
                        <td class="info-unik"><?= $mhs->tampilkanInfoJalur(); ?></td>
                        <td><span class="badge-biaya">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="group-header bg-prestasi">📂 Jalur Pendaftaran: Prestasi</div>
    <table>
        <thead>
            <tr>
                <th class="th-prestasi" width="5%">ID</th>
                <th class="th-prestasi" width="22%">Nama Calon</th>
                <th class="th-prestasi" width="20%">Asal Sekolah</th>
                <th class="th-prestasi" width="10%">Nilai Ujian</th>
                <th class="th-prestasi" width="15%">Biaya Dasar</th>
                <th class="th-prestasi" width="15%">Spesifikasi Jalur (Polimorfik)</th>
                <th class="th-prestasi" width="13%">Total Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataPrestasi)): ?>
                <tr><td colspan="7" class="text-empty">Tidak ada data pendaftar jalur prestasi ditemukan.</td></tr>
            <?php else: ?>
                <?php foreach ($dataPrestasi as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($mhs->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                        <td><?= number_format($mhs->getNilai(), 2); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaDasar(), 0, ',', '.'); ?></td>
                        <td class="info-unik"><?= $mhs->tampilkanInfoJalur(); ?></td>
                        <td><span class="badge-biaya" style="background-color: #10ac84;">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="group-header bg-kedinasan">📂 Jalur Pendaftaran: Kedinasan</div>
    <table>
        <thead>
            <tr>
                <th class="th-kedinasan" width="5%">ID</th>
                <th class="th-kedinasan" width="22%">Nama Calon</th>
                <th class="th-kedinasan" width="20%">Asal Sekolah</th>
                <th class="th-kedinasan" width="10%">Nilai Ujian</th>
                <th class="th-kedinasan" width="15%">Biaya Dasar</th>
                <th class="th-kedinasan" width="15%">Spesifikasi Jalur (Polimorfik)</th>
                <th class="th-kedinasan" width="13%">Total Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataKedinasan)): ?>
                <tr><td colspan="7" class="text-empty">Tidak ada data pendaftar jalur kedinasan ditemukan.</td></tr>
            <?php else: ?>
                <?php foreach ($dataKedinasan as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($mhs->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                        <td><?= number_format($mhs->getNilai(), 2); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaDasar(), 0, ',', '.'); ?></td>
                        <td class="info-unik"><?= $mhs->tampilkanInfoJalur(); ?></td>
                        <td><span class="badge-biaya" style="background-color: #ee5253;">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>