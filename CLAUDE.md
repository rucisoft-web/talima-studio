# TALIMA Studio

Laravel 13 + MySQL 8. Antarmuka dan pesan untuk pengguna dalam Bahasa Indonesia.

- Jalankan `vendor/bin/pint` dan `php artisan test` sebelum commit.
- Otorisasi selalu di server: Policy per objek, dan isolasi data antar institusi (`school_members`).
- OpenAI hanya lewat `App\Services\Ai\OpenAiClient`; jangan pernah commit kunci API.
- Warna merek memakai token Tailwind di `resources/css/app.css` (`teal-deep`, `emerald-brand`, `gold`, `ivory`), bukan hex langsung.
