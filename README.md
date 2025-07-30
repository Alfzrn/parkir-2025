# 🚗 Sistem Parkir Digital - Laravel 12 + Filament

Sistem ini dibuat untuk mengelola data pelanggan, kendaraan, dan transaksi pembayaran parkir secara digital menggunakan Laravel 12 dan Filament Admin Panel.

---

## 📌 Fitur Utama

- Manajemen Data Pelanggan (Customer)
- Manajemen Kendaraan (Vehicle)
- Pencatatan Waktu Masuk dan Keluar Kendaraan
- Perhitungan dan Pembayaran Otomatis Biaya Parkir
- Dashboard Ringkasan Harian

---

## 🧠 Analisis Sistem

### 🎯 Tujuan Sistem
Membangun sistem parkir modern yang mencatat:
- Data pelanggan (Customer)
- Data kendaraan (Vehicle)
- Riwayat dan pembayaran transaksi parkir
- Antrian atau histori kendaraan yang masuk dan keluar

---

### 📦 Struktur Entitas

| Entitas     | Deskripsi |
|-------------|-----------|
| **Customer** | Pemilik kendaraan |
| **Vehicle**  | Kendaraan yang diparkir, dimiliki oleh customer |
| **Payment**  | Transaksi pembayaran parkir berdasarkan waktu masuk dan keluar |

---

### 🧩 Struktur Data dan Algoritma

| Struktur Data | Penggunaan |
|---------------|------------|
| **Array**     | Menyimpan list histori kendaraan |
| **Queue**     | Antrian kendaraan masuk (FIFO) |
| **Stack**     | Jika parkir bertumpuk, sistem LIFO |
| **Tree**      | Jika ada klasifikasi kendaraan berdasarkan kategori |
| **Search**    | Untuk pencarian kendaraan (berdasarkan plat/jenis/customer) |
| **MVC**       | Laravel menggunakan Model, View (Filament), Controller |

---

## 🧪 Studi Kasus

### 🅰️ Studi Kasus: Masuk dan Keluar Parkir

**Langkah-langkah:**
1. Customer datang dan didaftarkan (jika belum).
2. Data kendaraan dimasukkan (plat, jenis).
3. Sistem mencatat `entry_time`.
4. Saat keluar, sistem mencatat `exit_time` dan menghitung biaya parkir.
5. Customer membayar, data disimpan di tabel `payments`.

**Alur Data:**


---

### 🅱️ Studi Kasus: Laporan Harian Parkir

**Tujuan:**
Menampilkan laporan jumlah kendaraan hari ini dan total pendapatan.

**Contoh Query:**
```php
// Total kendaraan hari ini
Vehicle::whereDate('created_at', now())->count();

// Total pendapatan hari ini
Payment::whereDate('created_at', now())->sum('fee');

// Kendaraan yang masih parkir
Payment::whereNull('exit_time')->get();


# Clone repositori
git clone git@github.com:kamu/parkir.git
cd parkir

# Install dependency
composer install

# Buat file .env dan generate key
cp .env.example .env
php artisan key:generate

# Jalankan migrasi
php artisan migrate

# Jalankan server
php artisan serve
