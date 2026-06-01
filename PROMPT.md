# 🏥 PROJECT CONTEXT — KLINIK DIGITAL (Laravel 12)
> Gunakan prompt ini sebagai konteks di awal setiap sesi baru.

---

## 📌 DESKRIPSI PROYEK

Aplikasi web **Klinik Digital** berbasis Laravel 12 untuk mendigitalisasi klinik kampus.
Stack: Laravel 12, Blade + Tailwind CSS, MySQL (XAMPP), Vite.
Database: `klinikweb` di localhost.

---

## 👥 AKTOR & ROLE

| Role    | Akses                                                      |
|---------|------------------------------------------------------------|
| admin   | Kelola dokter, pasien, jadwal, reservasi, profile          |
| dokter  | Dashboard, jadwal praktek, rekam medis, daftar pasien      |
| pasien  | Booking reservasi, riwayat, lihat rekam medis, profile     |

Role disimpan di kolom `users.role` (enum: admin, dokter, pasien).
Guard: Laravel default (`auth`). Middleware custom: `role` (alias di bootstrap/app.php).

---

## 🗄️ STRUKTUR DATABASE

```
users
  id, name, email, password, nomor_hp, role(enum), jenis_kelamin(enum L/P),
  remember_token, email_verified_at, created_at, updated_at

dokters
  id, user_id(fk→users), spesialis, no_str(unique),
  status(enum: aktif|tidak_aktif|pending), created_at, updated_at

pasiens
  id, user_id(fk→users), tanggal_lahir, alamat, created_at, updated_at

jadwals
  id, dokter_id(fk→dokters), tanggal, jam_mulai, jam_selesai,
  kuota, sisa_kuota, status(enum: tersedia|penuh|tutup), created_at, updated_at

konsultasis
  id, pasien_id(fk→pasiens), dokter_id(fk→dokters), jadwal_id(fk→jadwals),
  keluhan, status(enum: menunggu|dikonfirmasi|berlangsung|selesai|dibatalkan),
  created_at, updated_at

rekam_medis
  id, konsultasi_id(fk→konsultasis), diagnosa, tindakan, resep, catatan,
  created_at, updated_at
```

### Relasi Antar Model:
- User → hasOne Dokter / hasOne Pasien
- Dokter → hasMany Jadwal, hasMany Konsultasi
- Pasien → hasMany Konsultasi
- Jadwal → hasMany Konsultasi
- Konsultasi → hasOne RekamMedis

---

## 📁 STRUKTUR FOLDER PROJECT

```
klinik_digital_FixBanget/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php           # login, register, logout
│   │   │   ├── AdminController.php          # semua fitur admin
│   │   │   ├── DokterDashboardController.php # semua fitur dokter
│   │   │   ├── DashboardPasienController.php # semua fitur pasien
│   │   │   ├── ReservasiController.php       # booking & riwayat pasien
│   │   │   ├── DokterController.php          # halaman publik list dokter
│   │   │   └── HomeController.php            # halaman landing
│   │   └── Middleware/
│   │       └── RoleMiddleware.php            # middleware cek role user
│   ├── Models/
│   │   ├── User.php
│   │   ├── Dokter.php
│   │   ├── Pasien.php
│   │   ├── Jadwal.php
│   │   ├── Konsultasi.php
│   │   └── RekamMedis.php
│   └── Providers/
│       └── AppServiceProvider.php
│
├── bootstrap/
│   └── app.php                              # daftarkan alias middleware 'role'
│
├── database/
│   ├── migrations/
│   │   ├── ..._create_users_table.php       # + kolom role, nomor_hp, jenis_kelamin
│   │   ├── ..._create_dokters_table.php
│   │   ├── ..._create_pasiens_table.php
│   │   ├── ..._create_jadwals_table.php
│   │   ├── ..._create_konsultasis_table.php
│   │   └── ..._create_rekam_medis_table.php
│   └── seeders/
│       └── DatabaseSeeder.php               # 1 admin, 3 dokter, 2 pasien + jadwal
│
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   └── views/
│       ├── index.blade.php                  # landing page publik
│       ├── Dokter.blade.php                 # halaman publik list dokter
│       │
│       ├── layouts/
│       │   ├── home.blade.php               # layout landing page
│       │   ├── auth.blade.php               # layout login/register
│       │   ├── admin.blade.php              # layout dashboard admin
│       │   ├── dokter.blade.php             # layout dashboard dokter
│       │   └── pasien.blade.php             # layout dashboard pasien
│       │
│       ├── components/
│       │   ├── navbar.blade.php             # navbar publik
│       │   ├── footer.blade.php             # footer publik
│       │   ├── button.blade.php
│       │   ├── card.blade.php
│       │   ├── stats.blade.php
│       │   │
│       │   ├── admin/
│       │   │   ├── stats-card.blade.php     # kartu statistik dashboard admin
│       │   │   ├── menu-card.blade.php      # menu cepat admin
│       │   │   ├── dokter-pending.blade.php # tabel dokter pending verifikasi
│       │   │   └── aktivitas-jadwal.blade.php
│       │   │
│       │   ├── dokter/
│       │   │   ├── navbar.blade.php
│       │   │   ├── status-card.blade.php    # card status aktif/nonaktif dokter
│       │   │   ├── jadwal-card.blade.php    # card jadwal dokter
│       │   │   ├── pasien-list.blade.php    # daftar pasien hari ini
│       │   │   ├── rekam-medis-table.blade.php
│       │   │   ├── form-rekam-medis.blade.php   # form buat rekam medis baru
│       │   │   ├── form-edit-rekam-medis.blade.php
│       │   │   ├── modal-jadwal.blade.php   # modal tambah jadwal
│       │   │   └── modal-detail-pasien.blade.php
│       │   │
│       │   └── pasien/
│       │       ├── navbar.blade.php
│       │       ├── footer.blade.php
│       │       ├── welcome-card.php
│       │       ├── stats-card.blade.php
│       │       ├── menu-card.blade.php
│       │       ├── janji-temu-card.blade.php
│       │       ├── rekomendasi-dokter.blade.php
│       │       ├── riwayat-card.blade.php
│       │       ├── riwayat-table.blade.php
│       │       ├── rekam-medis-table.blade.php
│       │       ├── form-reservasi.blade.php  # form booking (AJAX jadwal)
│       │       └── tips-card.blade.php
│       │
│       └── pages/
│           ├── auth/
│           │   ├── login.blade.php
│           │   └── register.blade.php
│           │
│           ├── admin/
│           │   ├── dashboard.blade.php
│           │   ├── dokter.blade.php          # tabel manajemen dokter
│           │   ├── pasien.blade.php          # tabel manajemen pasien
│           │   ├── jadwal.blade.php          # tabel manajemen jadwal
│           │   ├── reservasi.blade.php       # tabel manajemen reservasi
│           │   ├── profile.blade.php
│           │   └── settings.blade.php
│           │
│           ├── dokter/
│           │   ├── Dashboard.blade.php       # ⚠️ huruf D kapital
│           │   ├── pasien.blade.php
│           │   ├── pasien-detail.blade.php
│           │   └── rekam-medis/
│           │       ├── index.blade.php
│           │       ├── create.blade.php
│           │       └── edit.blade.php
│           │
│           └── pasien/
│               ├── dashboard.blade.php
│               ├── reservasi.blade.php
│               ├── reservasi-success.blade.php
│               ├── riwayat-reservasi.blade.php
│               └── rekam-medis.blade.php
│
├── routes/
│   └── web.php                              # semua route dengan middleware
│
└── .env                                     # DB_DATABASE=klinikweb, DB_USERNAME=root
```

---

## 🛣️ ROUTE STRUCTURE

```
GET  /                          → home (publik)
GET  /dokter                    → list dokter publik

GET/POST /login                 → AuthController (guest only)
GET/POST /register              → AuthController (guest only)
POST     /logout                → AuthController (auth)

# ADMIN — middleware: auth, role:admin
GET  /admin/dashboard
GET  /admin/dokter              → index, create, edit
POST /admin/dokter/store
PUT  /admin/dokter/update/{id}
DEL  /admin/dokter/delete/{id}
GET  /admin/dokter/verify/{id}
GET  /admin/dokter/reject/{id}
(sama untuk /admin/pasien/...)
GET  /admin/jadwal
GET  /admin/reservasi

# DOKTER — middleware: auth, role:dokter
GET  /dokter/dashboard
POST /dokter/update-jadwal      → tambah slot jadwal
POST /dokter/update-status
GET  /dokter/pasien
GET  /dokter/pasien/detail/{id}
GET  /dokter/rekam-medis
GET  /dokter/rekam-medis/create
POST /dokter/rekam-medis/store
PUT  /dokter/rekam-medis/update/{id}
DEL  /dokter/rekam-medis/delete/{id}
POST /dokter/konsultasi/mulai/{id}
GET  /dokter/konsultasi/selesai/{id}

# PASIEN — middleware: auth, role:pasien
GET  /pasien/dashboard
GET  /pasien/reservasi          → form booking
POST /pasien/reservasi          → simpan booking
GET  /pasien/reservasi/jadwal   → AJAX: jadwal by dokter_id
GET  /pasien/reservasi/batal/{id}
GET  /pasien/riwayat
GET  /pasien/rekam-medis
```

---

## ⚙️ ATURAN CODING — LARAVEL 12

### Umum
- **Blade templating** untuk semua view, bukan raw PHP
- **Tailwind CSS** untuk styling (sudah ada di project, tidak perlu CDN tambahan kecuali FontAwesome untuk icon)
- Semua form pakai `@csrf` dan method spoofing (`@method('PUT')`) untuk PUT/DELETE
- Validasi dilakukan di **Controller** menggunakan `$request->validate([...])`
- Flash message via `->with('success', '...')` atau `->with('error', '...')`
- Tampilkan flash dengan `@if(session('success'))` di view

### Controller
- Satu controller per domain (Admin, Dokter, Pasien, Auth, Reservasi)
- Query DB pakai **Eloquent**, bukan raw SQL
- Selalu pakai `->with('relasi')` untuk eager loading, hindari N+1
- Gunakan `->findOrFail($id)` bukan `->find($id)` agar auto 404
- Pagination pakai `->paginate(10)` lalu tampilkan `{{ $data->links() }}` di view

### Model
- Setiap model punya `$fillable` yang lengkap
- Relasi ditulis di model masing-masing (hasOne, hasMany, belongsTo, dll)
- Nama tabel: plural snake_case → `rekam_medis`, `konsultasis`, `jadwals`
- Model dengan nama khusus wajib set `protected $table = 'rekam_medis'`

### Middleware & Auth
- Cek login pakai `Auth::check()` atau `auth()->user()`
- Ambil user login: `Auth::user()` atau `auth()->user()`
- Ambil profil dokter login: `Dokter::where('user_id', Auth::id())->firstOrFail()`
- Ambil profil pasien login: `Pasien::where('user_id', Auth::id())->firstOrFail()`
- Route yang butuh login dibungkus `->middleware('auth')`
- Route yang butuh role tertentu: `->middleware(['auth', 'role:admin'])`

### View & Blade
- Layout sistem: `@extends('layouts.X')` + `@section('content')` ... `@endsection`
- Komponen: dipanggil dengan `<x-admin.stats-card />` atau `<x-pasien.form-reservasi />`
- Variabel dari controller dikirim via `compact()` atau `->with()`
- Loop: `@foreach($items as $item)` ... `@endforeach`
- Kondisi: `@if` / `@elseif` / `@else` / `@endif`
- Link route: `{{ route('nama.route') }}` atau `{{ route('nama.route', $id) }}`
- Form action: `action="{{ route('admin.dokter.store') }}"`
- Asset: `{{ asset('images/nama.jpg') }}`

### Naming Convention
| Hal              | Konvensi                          | Contoh                        |
|------------------|-----------------------------------|-------------------------------|
| Controller       | PascalCase + Controller           | `AdminController.php`         |
| Model            | PascalCase singular               | `RekamMedis.php`              |
| Migration        | snake_case deskriptif             | `create_dokters_table.php`    |
| View (page)      | kebab-case                        | `rekam-medis.blade.php`       |
| View (Dashboard) | ⚠️ kapital D                      | `Dashboard.blade.php`         |
| Route name       | dot.notation                      | `admin.dokter.index`          |
| Tabel DB         | plural snake_case                 | `rekam_medis`, `konsultasis`  |

---

## 🔑 AKUN TEST (dari Seeder)

| Role   | Email                        | Password    |
|--------|------------------------------|-------------|
| Admin  | admin@klinik.com             | admin123    |
| Dokter | andi.dokter@klinik.com       | dokter123   |
| Pasien | ahmad@pasien.com             | pasien123   |

---

## ⚠️ CATATAN PENTING

1. View dokter dashboard namanya **Dashboard.blade.php** (D kapital) — jangan lowercase
2. Tabel rekam medis namanya `rekam_medis` (bukan `rekam_medis_s`) — set manual di model
3. Form reservasi pakai **AJAX** untuk load jadwal dinamis berdasarkan dokter yang dipilih
4. Batalkan reservasi harus **kembalikan `sisa_kuota`** di tabel jadwal
5. Saat simpan rekam medis, **update status konsultasi** jadi `selesai`
6. Middleware `role` didaftarkan sebagai alias di `bootstrap/app.php`, bukan di `Kernel.php` (Laravel 12 tidak pakai Kernel)
7. Laravel 12 tidak ada `app/Http/Kernel.php` — middleware alias ada di `bootstrap/app.php`
