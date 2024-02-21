### A. Pendahuluan

- Judul projek: "Aplikasi Point of Sales menggunakan Framework Laravel"

-------------------------

### B. Persiapan

- Software dan teknologi yang digunakan:
  - Framework Laravel 8
  - Visual Studio Code
  - XAMPP (PHP 7.4.33)
  - Bootstrap 3
  - Git dan GitHub
  - Brave browser
  - Composer 2
  - AJAX
  - Chart.JS
  - Milon Barcode
- Hardware: Laptop Lenovo G4080 dengan OS Windows 10 Pro.

-------------------------

### C. K3LH (Keselamatan, Kesehatan Kerja dan Lingkungan Hidup)

- Prosedur keselamatan dalam lingkungan pekerjaan, termasuk posisi duduk, posisi tubuh, keamanan perangkat keras, dan perlindungan data.

-------------------------

### D. Modelling

- Database menggunakan ORM Eloquent Laravel.
- Menggunakan DBMS MySQL dengan MySQL Workbench dan phpMyAdmin.

-------------------------

### E. MOCKUP

- Menggunakan Template Admin LTE v2.
- Bootstrap 3.

-------------------------

### F. Coding

#### Apps Folder

- Struktur folder aplikasi Laravel.
+ app - Contains all the Eloquent models
+ app/Http/Middleware - Contains the auth, authorize, access level config
+ config - Contains all the application configuration files
+ database/factories - Contains the model factory for all the models
+ database/migrations - Contains all the database migrations
+ database/seeds - Contains the database seeder
+ routes - Contains routes for the application
+ app/Http/Controllers - Contains all app controllers
+ resources/view - Contains all the view ui configuration

#### Features

- **Login:**
  - Super Admin
  - Kasir
  - Menggunakan 1 halaman login
  - Remember me menggunakan cookie

- **Dashboard:**
  - Box dashboard menggunakan Bootstrap
  - Grafik penjualan menggunakan Chart.JS

- **Kategori Produk:**
  - CRUD Kategori Produk
  - Berfungsi sebagai kategori dalam menu Produk.

- **Produk:**
  - CRUD Produk
  - List produk yang dijual dalam transaksi

- **Member:**
  - CRUD Member
  - Diskon konstan yang dikonfigurasi dalam setting sistem kasir
  - Cetak kartu member

- **Supplier:**
  - Menyediakan stok produk
  - Alur antara produk dengan supplier diperbaiki

- **Pembelian Produk:**
  - Pembelian melalui supplier
  - Relational CRUD ke daftar produk dalam sistem

- **Penjualan:**
  - Record penjualan yang bertambah sesuai jumlah transaksi

- **Transaksi:**
  - Fitur transaksi antara kasir dan pembeli
  - UI untuk menambahkan produk
  - Ada transaksi aktif (tersimpan melalui session) dan transaksi baru

- **Laporan:**
  - Laporan penjualan yang dikonversi menjadi PDF

- **Pengaturan Profil Pengguna:**
  - Mengatur profil pengguna di semua level pengguna

- **Pengaturan Profil Toko:**
  - Mengatur identitas toko

- **Manage User (Super Admin):**
  - Memanage user yang ada dalam sistem, yaitu kasir

-------------------------

### G.Instalasi

install dependencies
`composer install`

generate app key
`php artisan key:generate`

generate .env dari .env.example
`cp .env.example .env`

konfigurasi .env sesuai dengan database anda

jalankan migrate dan seeding
`php artisan migrate --seed`

jalankan aplikasi dengan command
`php artisan serve`

buka aplikasi di browser melalui localhost
`localhost`

-------------------------

### EXTRA:

- Mini sidebar
- Pagination

-------------------------
