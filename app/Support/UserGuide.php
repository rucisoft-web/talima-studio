<?php

namespace App\Support;

/**
 * Isi halaman panduan penggunaan per peran (spesifikasi bagian 3).
 * Langkah bertanda 'available' => true sudah bisa dipakai; selebihnya masih dikembangkan.
 */
class UserGuide
{
    /**
     * @return list<array{
     *     slug: string,
     *     title: string,
     *     summary: string,
     *     steps: list<array{title: string, body: string, available: bool}>,
     *     images: list<array{src: ?string, caption: string}>
     * }>
     */
    public static function roles(): array
    {
        return [
            [
                'slug' => 'guru',
                'title' => 'Guru dan Ustaz/Ustazah',
                'summary' => 'Menyiapkan bahan ajar dengan bantuan AI di TALIMA Studio, lalu mengajarkannya di IFP lewat TALIMA Class, termasuk tanpa internet.',
                'steps' => [
                    ['title' => 'Daftar dan masuk', 'body' => 'Buka halaman Daftar, isi nama, email, dan kata sandi. Setelah itu masuk dengan email dan kata sandi yang sama.', 'available' => true],
                    ['title' => 'Bergabung ke institusi', 'body' => 'Buat institusi sekolah, madrasah, atau pesantren Anda dari dashboard, atau minta admin sekolah menambahkan Anda.', 'available' => true],
                    ['title' => 'Buat proyek lewat wizard', 'body' => 'Pilih jenjang, kelas, mapel, topik, durasi, dan tujuan pembelajaran. Pilih CP/TP serta sumber rujukan yang sah.', 'available' => false],
                    ['title' => 'Tinjau draf dari AI', 'body' => 'AI menyusun modul ajar, slide, LKPD, aktivitas sentuh, soal, kunci, dan rubrik. Periksa dan ubah setiap bagian sebelum dipakai.', 'available' => false],
                    ['title' => 'Simpan versi dan pratinjau', 'body' => 'Tandai versi final. Versi lama tetap tersimpan dan bisa dipulihkan.', 'available' => false],
                    ['title' => 'Ekspor paket offline', 'body' => 'Unduh paket atau salin ke flashdisk, lalu pasang di IFP melalui aplikasi TALIMA Class.', 'available' => false],
                    ['title' => 'Mengajar di kelas', 'body' => 'Gunakan mode Presentasi, Whiteboard, dan Aktivitas. Semua berjalan tanpa internet setelah paket terpasang.', 'available' => false],
                ],
                'images' => [
                    ['src' => '/images/panduan/masuk.png', 'caption' => 'Halaman masuk TALIMA'],
                    ['src' => '/images/panduan/dashboard-guru.png', 'caption' => 'Dashboard guru berisi daftar institusi'],
                    ['src' => null, 'caption' => 'Wizard proyek pembelajaran di TALIMA Studio'],
                    ['src' => null, 'caption' => 'Mode Aktivitas TALIMA Class di IFP'],
                ],
            ],
            [
                'slug' => 'kreator',
                'title' => 'Kreator dan Penjual',
                'summary' => 'Menerbitkan karya pembelajaran ke TALIMA Market, menentukan lisensi dan harga, serta memantau penjualan dan pencairan dana.',
                'steps' => [
                    ['title' => 'Siapkan profil penjual', 'body' => 'Lengkapi profil, verifikasi identitas, dan rekening pencairan.', 'available' => false],
                    ['title' => 'Pilih proyek yang akan diterbitkan', 'body' => 'Isi judul, ringkasan, jenjang, mapel, CP/TP, pratinjau, dan daftar isi.', 'available' => false],
                    ['title' => 'Tentukan lisensi dan harga', 'body' => 'Pilih gratis atau berbayar, serta lisensi personal atau institusi. Pastikan Anda berhak mendistribusikan semua gambar, musik, video, dan kutipan buku.', 'available' => false],
                    ['title' => 'Ajukan untuk moderasi', 'body' => 'Paket diperiksa otomatis lalu ditinjau moderator. Anda akan diberi tahu bila perlu perbaikan.', 'available' => false],
                    ['title' => 'Pantau penjualan dan pencairan', 'body' => 'Lihat statistik, saldo tertunda, saldo tersedia, dan riwayat payout. Terbitkan versi baru untuk memperbarui produk.', 'available' => false],
                ],
                'images' => [
                    ['src' => null, 'caption' => 'Formulir penerbitan produk'],
                    ['src' => null, 'caption' => 'Laporan penjualan dan saldo penjual'],
                ],
            ],
            [
                'slug' => 'pembeli',
                'title' => 'Pembeli',
                'summary' => 'Mencari, membeli atau mengklaim paket pembelajaran, lalu memasangnya di IFP.',
                'steps' => [
                    ['title' => 'Cari materi', 'body' => 'Gunakan pencarian dan filter jenjang, kelas, mapel, topik, dan kurikulum. Lihat pratinjau dan demo sebelum membeli.', 'available' => false],
                    ['title' => 'Beli atau klaim gratis', 'body' => 'Harga final dan biaya ditampilkan sebelum pembayaran. Produk gratis cukup diklaim.', 'available' => false],
                    ['title' => 'Unduh dan pasang', 'body' => 'Produk masuk ke perpustakaan Anda. Unduh paketnya lalu pasang di TALIMA Class, atau impor ke Studio bila lisensinya mengizinkan.', 'available' => false],
                    ['title' => 'Beri ulasan', 'body' => 'Bagikan pengalaman Anda agar guru lain terbantu memilih.', 'available' => false],
                ],
                'images' => [
                    ['src' => null, 'caption' => 'Katalog TALIMA Market'],
                    ['src' => null, 'caption' => 'Perpustakaan materi yang sudah dibeli'],
                ],
            ],
            [
                'slug' => 'admin-sekolah',
                'title' => 'Admin Sekolah, Madrasah, dan Pesantren',
                'summary' => 'Mengelola institusi, anggota guru, lisensi institusi, dan perangkat IFP di lembaga Anda.',
                'steps' => [
                    ['title' => 'Daftarkan institusi', 'body' => 'Dari dashboard, pilih Tambah institusi lalu isi nama, jenis, NPSN, kota, dan provinsi. Pembuat institusi otomatis menjadi admin.', 'available' => true],
                    ['title' => 'Lihat anggota', 'body' => 'Buka halaman institusi untuk melihat daftar anggota beserta perannya. Hanya anggota yang bisa membuka halaman ini.', 'available' => true],
                    ['title' => 'Undang dan atur guru', 'body' => 'Tambahkan guru sebagai anggota dan tentukan perannya.', 'available' => false],
                    ['title' => 'Kelola lisensi dan perangkat', 'body' => 'Bagikan lisensi institusi ke guru dan catat IFP yang dipakai di setiap kelas.', 'available' => false],
                ],
                'images' => [
                    ['src' => '/images/panduan/tambah-institusi.png', 'caption' => 'Formulir tambah institusi'],
                    ['src' => '/images/panduan/anggota-institusi.png', 'caption' => 'Halaman institusi dan daftar anggota'],
                ],
            ],
            [
                'slug' => 'moderator',
                'title' => 'Moderator',
                'summary' => 'Menjaga mutu dan keabsahan konten TALIMA Market.',
                'steps' => [
                    ['title' => 'Tinjau antrean produk', 'body' => 'Periksa hasil pemeriksaan otomatis, isi materi, sumber, atribusi, dan klaim hak distribusi.', 'available' => false],
                    ['title' => 'Putuskan', 'body' => 'Setujui, tolak, atau minta perbaikan. Setiap keputusan wajib disertai alasan dan tercatat.', 'available' => false],
                    ['title' => 'Tangani laporan dan banding', 'body' => 'Tindak lanjuti laporan pelanggaran hak cipta, lakukan takedown bila perlu, dan proses banding kreator.', 'available' => false],
                ],
                'images' => [
                    ['src' => null, 'caption' => 'Antrean moderasi produk'],
                ],
            ],
            [
                'slug' => 'admin-platform',
                'title' => 'Admin Platform',
                'summary' => 'Mengelola pengguna, institusi, katalog, komisi, transaksi, konfigurasi, keamanan, dan audit seluruh platform.',
                'steps' => [
                    ['title' => 'Akses penuh', 'body' => 'Admin platform dapat membuka semua institusi untuk keperluan dukungan dan audit. Peran ini diberikan oleh tim teknis.', 'available' => true],
                    ['title' => 'Kelola pengguna dan institusi', 'body' => 'Cari pengguna, ubah peran, dan nonaktifkan akun yang melanggar ketentuan.', 'available' => false],
                    ['title' => 'Atur komisi dan transaksi', 'body' => 'Tetapkan komisi, rekonsiliasi pembayaran, refund, dan payout.', 'available' => false],
                    ['title' => 'Pantau keamanan dan biaya AI', 'body' => 'Tinjau log audit, pemakaian token AI, dan kuota per paket langganan.', 'available' => false],
                ],
                'images' => [
                    ['src' => null, 'caption' => 'Dashboard admin platform'],
                ],
            ],
            [
                'slug' => 'support',
                'title' => 'Tim Support',
                'summary' => 'Membantu pengguna menyelesaikan kendala dengan akses terbatas sesuai tiket.',
                'steps' => [
                    ['title' => 'Terima tiket', 'body' => 'Baca kendala pengguna dan kumpulkan informasi perangkat, versi aplikasi, dan langkah yang dilakukan.', 'available' => false],
                    ['title' => 'Bantu sesuai izin tiket', 'body' => 'Akses data pengguna hanya sebatas yang dibutuhkan tiket. Semua akses tercatat di log audit.', 'available' => false],
                    ['title' => 'Eskalasi bila perlu', 'body' => 'Teruskan masalah teknis ke tim pengembang, dan masalah konten ke moderator.', 'available' => false],
                ],
                'images' => [
                    ['src' => null, 'caption' => 'Daftar tiket support'],
                ],
            ],
        ];
    }
}
