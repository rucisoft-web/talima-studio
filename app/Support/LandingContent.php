<?php

namespace App\Support;

/**
 * Isi landing page: tantangan guru saat menyiapkan bahan ajar untuk IFP dan jawaban TALIMA.
 */
class LandingContent
{
    /**
     * @return list<array{problem: string, cause: string, solution: string, module: string}>
     */
    public static function challenges(): array
    {
        return [
            [
                'problem' => 'IFP hanya dipakai untuk menayangkan PDF atau PPT',
                'cause' => 'Bahan ajar dibuat dengan alat untuk proyektor, dan konten interaktif siap pakai untuk IFP masih langka.',
                'solution' => 'Mode Presentasi, Whiteboard, dan Aktivitas sentuh: seret-lepas, menjodohkan, mengurutkan, memberi label, dan kuis.',
                'module' => 'Class',
            ],
            [
                'problem' => 'Waktu menyiapkan bahan ajar sangat terbatas',
                'cause' => 'Modul ajar, slide, LKPD, soal, dan rubrik dibuat terpisah dari nol dan harus selaras dengan CP/TP.',
                'solution' => 'Wizard dan AI menyusun draf modul ajar, alur kegiatan, slide, LKPD, soal, kunci, dan rubrik sekaligus.',
                'module' => 'Studio',
            ],
            [
                'problem' => 'Sulit membuat aktivitas interaktif sendiri',
                'cause' => 'Alat pembuat konten interaktif umumnya rumit, berbahasa Inggris, atau menuntut keterampilan teknis.',
                'solution' => 'Templat aktivitas tanpa coding dan komponen per mapel: garis bilangan, bidang koordinat, peta, linimasa.',
                'module' => 'Studio',
            ],
            [
                'problem' => 'Materi gagal tampil karena internet putus',
                'cause' => 'Video, situs, dan aplikasi web bergantung pada koneksi yang di sekolah sering tidak stabil.',
                'solution' => 'Paket offline dipasang lewat unduhan atau flashdisk, dan tetap tersedia setelah IFP dinyalakan ulang.',
                'module' => 'Class',
            ],
            [
                'problem' => 'File dari laptop tampil berantakan di IFP',
                'cause' => 'IFP memakai Android, sehingga animasi PowerPoint, font, dan format video sering tidak didukung.',
                'solution' => 'Format paket khusus IFP Android dengan tombol besar dan media yang dikompres ke ukuran aman.',
                'module' => 'Class',
            ],
            [
                'problem' => 'Ragu pada kualitas materi dari internet atau AI',
                'cause' => 'Materi tersebar tanpa sumber jelas, dan AI bisa keliru atau mengarang rujukan.',
                'solution' => 'AI merujuk sumber kurikulum yang sah dan menampilkan sumbernya. Guru selalu meninjau dan menyimpan versi.',
                'module' => 'Studio',
            ],
            [
                'problem' => 'Karya guru sulit dibagikan dan kurang dihargai',
                'cause' => 'Belum ada wadah berbagi yang tertata, berlisensi jelas, dan memberi imbalan.',
                'solution' => 'Terbitkan, bagikan, atau jual paket pembelajaran dengan lisensi jelas dan dapatkan penghasilan.',
                'module' => 'Market',
            ],
            [
                'problem' => 'Sulit melibatkan seluruh kelas',
                'cause' => 'Kelas besar, waktu terbatas, dan penilaian formatif masih manual.',
                'solution' => 'Kuis, timer, spotlight, tantangan kelompok, dan exit ticket di IFP dengan hasil tersimpan di perangkat.',
                'module' => 'Class',
            ],
        ];
    }

    /**
     * @return list<array{title: string, body: string}>
     */
    public static function workflow(): array
    {
        return [
            ['title' => 'Isi wizard', 'body' => 'Jenjang, kelas, mapel, topik, durasi, dan tujuan.'],
            ['title' => 'Pilih rujukan', 'body' => 'CP/TP dan sumber yang sah.'],
            ['title' => 'Terima draf AI', 'body' => 'Modul, slide, aktivitas, soal, dan rubrik.'],
            ['title' => 'Tinjau dan sesuaikan', 'body' => 'Guru mengedit dan menyimpan versi final.'],
            ['title' => 'Ekspor paket offline', 'body' => 'Unduh atau salin ke flashdisk.'],
            ['title' => 'Mengajar di IFP', 'body' => 'Jalankan di TALIMA Class tanpa internet.'],
            ['title' => 'Bagikan karya', 'body' => 'Terbitkan ke TALIMA Market.'],
        ];
    }
}
