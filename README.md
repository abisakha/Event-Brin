# Event Management BRIN

Aplikasi berbasis web untuk mendukung pengelolaan event secara terintegrasi di lingkungan BRIN, meliputi informasi kegiatan, partisipasi peserta, notifikasi, survey, feedback, serta kebutuhan administrasi event.

---

# Deskripsi Project

Event Management BRIN merupakan aplikasi berbasis web yang dikembangkan untuk membantu proses pengelolaan kegiatan/event secara digital.

Aplikasi ini dirancang untuk mendukung proses pengelolaan event secara lebih efektif, terstruktur, dan terintegrasi dengan menyediakan sistem yang mempermudah pengguna maupun administrator dalam melakukan aktivitas terkait event.

Project ini dikembangkan menggunakan framework Laravel dengan implementasi antarmuka modern menggunakan Laravel Blade dan Tailwind CSS.

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
- GitLab
- OpenProject

---

# Git Workflow

# Commit Convention

Setiap commit wajib menggunakan referensi **OpenProject Work Package ID**.

Format:

```bash
OP-<ID Work Package> | Deskripsi perubahan
```

Contoh:

```bash
OP-13125 | Inisialisasi project Laravel dan konfigurasi dependency
```

```bash
OP-13127 | Konfigurasi template Blade berdasarkan mockup UI
```

```bash
OP-13129 | Implementasi authentication SSO BRIN
```

---

# Keterangan Commit

| Format | Keterangan |
|---|---|
| OP-XXXXX | ID Work Package dari OpenProject |
| Deskripsi perubahan | Penjelasan singkat perubahan yang dilakukan |

Referensi ID diambil dari OpenProject sesuai dengan:

- Epic
- User Story
- Task

---

# Contoh Commit Berdasarkan OpenProject

## Epic

```bash
OP-13050 | Implementasi Laravel Application Foundation
```

---

## User Story

```bash
OP-13123 | Implementasi Laravel Project dan Core Configuration
```

```bash
OP-13128 | Implementasi autentikasi pengguna
```

---

## Task

```bash
OP-13125 | Inisialisasi project Laravel dan konfigurasi dependency
```

```bash
OP-13126 | Konfigurasi koneksi database dan redis
```

```bash
OP-13127 | Konfigurasi template Blade berdasarkan mockup UI
```

```bash
OP-13129 | Implementasi authentication SSO BRIN
```

```bash
OP-13130 | Konfigurasi authentication middleware
```

```bash
OP-13131 | Membuat halaman login menggunakan Blade
```

---

# Aturan Commit Tim

1. Setiap perubahan kode wajib memiliki referensi ID OpenProject.

2. Gunakan ID Task apabila perubahan berasal dari pekerjaan spesifik.

Contoh:

```bash
OP-13127 | Update halaman dashboard berdasarkan desain UI
```

3. Gunakan ID User Story apabila perubahan mencakup beberapa task.

Contoh:

```bash
OP-13128 | Implementasi autentikasi pengguna
```

4. Jangan membuat ID pekerjaan sendiri di luar OpenProject.

5. Satu commit harus menjelaskan satu perubahan utama.

6. Gunakan deskripsi commit yang singkat, jelas, dan mudah dipahami.

7. Hindari commit dengan format:

```bash
update

fix

perbaikan

changes
```

Gunakan:

```bash
OP-13127 | Update template Blade halaman dashboard
```

8. Perbaikan bug tetap menggunakan ID OpenProject terkait.

Contoh:

```bash
OP-13130 | Fix authentication middleware redirect issue
```

9. Refactor kode menggunakan ID pekerjaan yang berkaitan.

Contoh:

```bash
OP-13127 | Refactor struktur template Blade
```

10. Sebelum melakukan merge, pastikan commit sudah memiliki referensi OpenProject.

---

# Development Guidelines

- Jangan commit file `.env`
- Jangan commit folder `vendor`
- Jangan commit folder `node_modules`
- Gunakan branch terpisah untuk setiap pekerjaan
- Pull repository sebelum mulai coding
- Gunakan format commit sesuai OpenProject
- Pastikan perubahan sudah melalui review sebelum merge

---

# Project Information

**Project Name:** Event Management BRIN

**Framework:** Laravel 13

**Programming Language:** PHP 8.3+

**Frontend:** Laravel Blade, Tailwind CSS, JavaScript

**Database:** PostgreSQL

**Project Management:** OpenProject

**Repository Management:** GitLab

Project ini dikembangkan untuk mendukung kebutuhan internal BRIN dalam pengelolaan event secara digital, efektif, dan terintegrasi.

---

# License

Project ini digunakan untuk kebutuhan internal Event Management BRIN.
