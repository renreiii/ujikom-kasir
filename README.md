### A. Pendahuluan

- Judul projek: "Aplikasi Point of Sales menggunakan Framework Laravel"

-------------------------

### B. Persiapan

- Software dan teknologi yang digunakan:
  - Framework Laravel 8
  - Visual Studio Code
  - Laragon (PHP 7.4.33, 8.1.10)
  - DBMS MySQL 8.0.30
  - Bootstrap
  - Git dan GitHub
  - Brave browser
  - Composer
  - AJAX
  - Chart.JS
  - Milon Barcode
  - Datatables
  - Dompdf
-------------------------

### C. Modelling/Database

- Model data dan Schema Migration dibuat menggunakan ORM Eloquent Laravel.
- Menggunakan DBMS MySQL dengan tools phpMyAdmin.

-------------------------

### D. MOCKUP

- Menggunakan Template Admin LTE v2.

-------------------------
### E. Features

- **Login:**
  - Super Admin
  - Kasir
  - Menggunakan 1 halaman login
  - Remember me menggunakan cookie

- **Dashboard:**
  - Box dashboard menggunakan Bootstrap
  - Grafik penjualan menggunakan Chart.JS
  - Riwayat Transaksi Terbaru

- **Kategori Produk:**
  - CRUD Kategori Produk
  - Berfungsi sebagai relasi kategori dalam menu Produk.

- **Produk:**
  - CRUD Produk
  - List produk yang dijual dalam transaksi
  - Stok

- **Member:**
  - CRUD Member
  - Diskon konstan yang dikonfigurasi dalam setting sistem kasir
  - Cetak kartu member

- **Supplier:**
  - Berfungsi sebagai penyedia produk

- **Pembelian Produk:**
  - Pembelian melalui supplier untuk menambah stok

- **Penjualan:**
  - Record penjualan yang bertambah sesuai jumlah transaksi
  - Berkurangnya stok melalui fitur ini

- **Transaksi:**
  - Fitur transaksi antara kasir/adminstrator dengann pembeli
  - Transaksi aktif / transaksi terakhir untuk mengantisipasi kesalahan transaksi dengan cara redirect kembali ke halaman transaksi

- **Laporan:**
  - Laporan penjualan, pembelian, pendapatan yang dikonversi menjadi PDF

- **Pengaturan Profil Pengguna:**
  - Mengatur profil (Super Admin)

- **Pengaturan Profil Toko:**
  - Mengatur identitas toko

- **Manage User (Super Admin):**
  - Memanage user yang ada dalam sistem, yaitu kasir

-------------------------

### F. Instalasi

install dependencies <br>
`composer install`

generate .env dari .env.example <br>
`cp .env.example .env`

generate app key <br>
`php artisan key:generate`

konfigurasi .env sesuai dengan database anda <br>

jalankan migrate dan seeding <br>
`php artisan migrate --seed`

jalankan aplikasi dengan command <br>
`php artisan serve`

-------------------------

# LOGIN INFORMATION:

### Account for admin:
Email: admin@gmail.com <br>
Pass: 123456

### Account for user:
Email: kasir1@gmail.com <br>
Pass: 123456

-------------------------
