# TALIMA Studio

**Cerdas Mengajar, Berkah Berkarya.**

Backend dan aplikasi web TALIMA (Studio, dan nanti Market) berbasis Laravel 13 + MySQL 8.
TALIMA Class (player IFP Android) dibangun terpisah dan membaca paket yang diekspor dari sini.

## Kebutuhan

- PHP 8.3+ (ekstensi `pdo_mysql`, `mbstring`, `intl`, `zip`)
- Composer 2
- MySQL 8
- Node.js 22+

## Menjalankan secara lokal

```bash
git clone https://github.com/rucisoft-web/talima-studio.git
cd talima-studio
composer install
cp .env.example .env
php artisan key:generate

# buat database kosong "talima_studio" di MySQL, sesuaikan DB_* di .env
php artisan migrate --seed

npm install
npm run build        # atau `npm run dev` saat pengembangan
php artisan serve
```

Akun contoh dari seeder (kata sandi `password`):

| Email | Peran |
|---|---|
| `admin@talima.test` | Admin platform |
| `guru@talima.test` | Guru, admin di "SMP Contoh TALIMA" |

## OpenAI

AI hanya dipanggil dari backend melalui `App\Services\Ai\OpenAiClient` (structured output JSON Schema).
Isi `OPENAI_API_KEY` dan `OPENAI_MODEL` di `.env` server. **Jangan commit kunci asli.**
Setiap panggilan dicatat di tabel `ai_usage_logs` (model, versi prompt, token, durasi, status).

## Peran dan hak akses

- **Peran institusi** (`school_members.role`): `admin`, `teacher`. Diperiksa lewat `SchoolPolicy`.
- **Peran platform** (spatie/laravel-permission): `platform-admin`, `moderator`, `support`.
  `platform-admin` melewati semua policy lewat `Gate::before`.
- Guru, kreator, dan pembeli adalah kemampuan akun biasa, bukan peran terpisah.

## Pengujian

```bash
php artisan test     # memakai SQLite in-memory secara default
vendor/bin/pint      # format kode
```

CI (GitHub Actions) menjalankan Pint dan seluruh test terhadap MySQL 8.

## Identitas merek

Token warna ada di `resources/css/app.css`:
Deep Teal `#123C52`, Emerald `#167F78`, Warm Gold `#D7B46A`, Ivory `#F6F4EC`.
Logo (ikon saja, tanpa tulisan) ada di `resources/views/components/logo.blade.php` dan `public/favicon.svg`: ikon "book-open-check" dari Lucide (lisensi ISC), emas di latar gelap dan emerald di latar terang.
