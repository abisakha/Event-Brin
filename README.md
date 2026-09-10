# Event Management BRIN

Aplikasi berbasis web untuk pengelolaan event yang mencakup informasi kegiatan, partisipasi peserta, notifikasi, dan feedback pengguna.

## Deskripsi Project

Event Management BRIN merupakan aplikasi berbasis Laravel yang dikembangkan untuk mempermudah proses pengelolaan event secara terintegrasi.

Saat ini project berada pada tahap **Frontend Development** menggunakan Laravel Blade dan Tailwind CSS. Tampilan User Interface telah dikembangkan, sedangkan backend, database, dan business logic akan dikembangkan oleh tim selanjutnya.

---

# Status Pengembangan

## Frontend (Completed)

Fitur yang sudah tersedia:

- Landing page event
- Navbar dan footer
- Halaman daftar dan detail event
- Halaman notifikasi pengguna
- Halaman profile pengguna
- Halaman survey dan feedback
- Halaman riwayat event
- Responsive design

## Backend (On Development)

Fitur yang akan dikembangkan:

- Database dan migration
- Model dan relationship
- Authentication
- Role user dan admin
- Event management CRUD
- Registrasi event
- Notification system
- Survey dan feedback
- Admin dashboard

---

# Teknologi

## Backend
- Laravel 13
- PHP 8.3+

## Frontend
- Laravel Blade
- Tailwind CSS
- JavaScript

## Database
- PostgreSQL

## Tools
- Composer
- Node.js
- NPM
- Git
- GitHub

---

# Cara Menjalankan Project

## 1. Clone Repository

```bash
git clone <url-repository>

cd event-management-BRIN
```

## 2. Install Dependency

Laravel:

```bash
composer install
```

Frontend:

```bash
npm install
```

## 3. Konfigurasi Environment

Copy file `.env.example` menjadi `.env`

Windows:

```bash
copy .env.example .env
```

Linux/Mac:

```bash
cp .env.example .env
```

Generate key:

```bash
php artisan key:generate
```

## 4. Konfigurasi Database

Atur database pada file `.env`, kemudian jalankan:

```bash
php artisan migrate
```

## 5. Jalankan Project

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

Akses:

```
http://127.0.0.1:8000
```

---

# Struktur Project

```
event-management-BRIN

├── app
├── database
├── public
├── resources
│   └── views
│       ├── user
│       └── admin
├── routes
├── storage
├── composer.json
└── package.json
```

---

# Git Workflow

Gunakan branch sesuai fitur:

```
feature/frontend-survey
feature/frontend-profile
feature/backend-event
feature/backend-auth
fix/responsive-navbar
```

Format commit:

```
type: deskripsi perubahan
```

## Feature

```bash
git commit -m "feat: create user survey interface"
```

## Style/UI

```bash
git commit -m "style: improve profile page layout"
```

## Bug Fix

```bash
git commit -m "fix: resolve navbar responsive issue"
```

## Documentation

```bash
git commit -m "docs: update README"
```

---

# Aturan Tim

- Jangan commit `.env`
- Jangan commit `vendor`
- Jangan commit `node_modules`
- Gunakan branch untuk setiap fitur
- Pull repository sebelum mulai coding
- Gunakan commit message yang jelas
- Lakukan review sebelum merge

---

# License

Project ini dikembangkan untuk kebutuhan internal Event Management BRIN.
