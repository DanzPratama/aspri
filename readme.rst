# 🚗 ASPRI

### **Aplikasi Sistem Retribusi Parkir**

> Digitalisasi pengelolaan retribusi parkir untuk mendukung administrasi, monitoring, pelaporan, dan transparansi pengelolaan parkir secara terintegrasi.

<p align="center">
  <img src="https://img.shields.io/badge/ASPRI-2.0-6366f1?style=for-the-badge" alt="ASPRI">
  <img src="https://img.shields.io/badge/CodeIgniter-3.x-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white" alt="CodeIgniter">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

---

## ✨ Tentang ASPRI

**ASPRI** merupakan aplikasi berbasis web yang dikembangkan untuk membantu proses administrasi dan pengelolaan **retribusi pelayanan parkir** secara digital.

ASPRI dirancang untuk menggantikan proses administrasi yang sebelumnya banyak dilakukan secara manual menjadi sistem yang lebih:

- ⚡ Cepat
- 📊 Terukur
- 🔎 Mudah dipantau
- 🧾 Terdokumentasi
- 🔐 Terstruktur
- 📱 Responsif

Aplikasi ini digunakan untuk mendukung proses mulai dari **pengelolaan petugas, transaksi setoran, pencatatan retribusi, STS, hingga laporan**.

---

## 🎯 Tujuan

ASPRI dikembangkan dengan beberapa tujuan utama:

```text
Digitalisasi
     ↓
Pencatatan Retribusi
     ↓
Monitoring Transaksi
     ↓
Rekapitulasi Data
     ↓
Pelaporan
     ↓
Transparansi & Akuntabilitas
```

Sistem diharapkan dapat membantu mengurangi kesalahan pencatatan, duplikasi data, serta ketergantungan terhadap proses administrasi manual.

---

## 🚀 Fitur Utama

### 👤 Manajemen Petugas

Pengelolaan data petugas yang terlibat dalam kegiatan retribusi parkir.

- Data petugas
- Identitas juru parkir
- Pengelompokan wilayah/lokasi
- Status petugas
- Pengelolaan target setoran

---

### 💰 Transaksi Setoran

Pencatatan transaksi setoran retribusi parkir secara terstruktur.

- Input setoran
- Detail transaksi
- Riwayat setoran
- Status transaksi
- Pencarian transaksi
- Penghapusan transaksi
- Cetak bukti transaksi

---

### 🧾 STS

Pengelolaan **Surat Tanda Setoran (STS)** secara digital.

- Pembuatan STS
- Detail setoran
- Rekap transaksi
- Cetak dokumen
- Dokumentasi transaksi

---

### 📊 Dashboard

Dashboard memberikan gambaran kondisi data secara cepat.

Contoh informasi yang dapat ditampilkan:

- Total transaksi
- Total setoran
- Jumlah petugas
- Rekap lokasi
- Aktivitas terbaru
- Statistik transaksi

---

### 📑 Rekap & Laporan

Data transaksi dapat direkap berdasarkan kebutuhan administrasi.

- Rekap harian
- Rekap berdasarkan lokasi
- Rekap berdasarkan petugas
- Rekap transaksi
- Laporan setoran
- Filter data
- Pencarian data
- Cetak laporan

---

### 📱 Responsive Design

ASPRI dirancang dengan pendekatan **mobile-first**, sehingga tetap nyaman digunakan melalui:

- 💻 Desktop
- 🖥️ Laptop
- 📱 Smartphone
- 📲 Tablet

---

## 🛠️ Teknologi

ASPRI dibangun menggunakan beberapa teknologi berikut:

| Teknologi | Penggunaan |
|---|---|
| **PHP** | Backend |
| **CodeIgniter 3** | Framework |
| **MySQL / MariaDB** | Database |
| **HTML5** | Struktur halaman |
| **CSS3** | Styling |
| **JavaScript** | Interaksi aplikasi |
| **jQuery** | AJAX & DOM manipulation |
| **Bootstrap** | Komponen UI |
| **Tailwind CSS** | Modern UI |
| **DataTables** | Pengelolaan tabel |
| **Chart.js** | Visualisasi data |

---

## 🏗️ Arsitektur Sederhana

ASPRI menggunakan pendekatan **MVC (Model–View–Controller)** dari CodeIgniter.

```text
                 ┌─────────────────┐
                 │     Browser     │
                 └────────┬────────┘
                          │
                          ▼
                 ┌─────────────────┐
                 │   Controller    │
                 └────────┬────────┘
                          │
             ┌────────────┴────────────┐
             ▼                         ▼
      ┌─────────────┐          ┌─────────────┐
      │    Model    │          │    View     │
      └──────┬──────┘          └─────────────┘
             │
             ▼
      ┌─────────────┐
      │   MySQL DB  │
      └─────────────┘
```

---

## 📂 Struktur Project

Struktur utama aplikasi:

```text
aspri/
│
├── application/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   ├── config/
│   ├── libraries/
│   └── helpers/
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── vendor/
│
├── system/
│
├── uploads/
│
├── index.php
├── .htaccess
└── README.md
```

> Struktur dapat berbeda mengikuti konfigurasi deployment dan kebutuhan aplikasi.

---

## ⚙️ Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/aspri.git
```

Masuk ke direktori project:

```bash
cd aspri
```

---

### 2. Siapkan Server

ASPRI dapat dijalankan menggunakan environment seperti:

- XAMPP
- WAMP
- Laragon
- Apache + PHP
- Hosting berbasis cPanel

Pastikan PHP dan MySQL/MariaDB telah tersedia.

---

### 3. Konfigurasi Database

Buat database baru:

```sql
CREATE DATABASE aspri;
```

Kemudian sesuaikan konfigurasi database pada:

```text
application/config/database.php
```

Contoh:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'aspri',
    'dbdriver' => 'mysqli'
);
```

Import database menggunakan file SQL yang tersedia pada repository.

---

### 4. Konfigurasi Base URL

Sesuaikan:

```text
application/config/config.php
```

Contoh:

```php
$config['base_url'] = 'http://localhost/aspri/';
```

---

### 5. Jalankan Aplikasi

Jika menggunakan XAMPP/WAMP/Laragon, akses:

```text
http://localhost/aspri/
```

---

## 🔐 Keamanan

Beberapa hal yang perlu diperhatikan sebelum deployment production:

- Jangan commit password database.
- Jangan menyimpan API key di repository.
- Gunakan `.env` atau konfigurasi environment.
- Pastikan folder upload memiliki permission yang sesuai.
- Gunakan HTTPS pada production.
- Batasi akses halaman administrasi.
- Validasi seluruh input pengguna.
- Gunakan query yang aman terhadap SQL Injection.

Tambahkan file berikut ke `.gitignore` jika diperlukan:

```gitignore
.env
.env.*
/uploads/*
/application/logs/*
/application/cache/*
```

---

## 🔄 Development Workflow

Alur pengembangan ASPRI:

```text
        Development
             │
             ▼
        Local Testing
             │
             ▼
        Git Commit
             │
             ▼
        Git Repository
             │
             ▼
       Testing / Review
             │
             ▼
         Production
```

Contoh workflow Git:

```bash
git status

git add .

git commit -m "update: improve transaction module"

git push origin main
```

---

## 📌 Roadmap

### ASPRI 2.0

Pengembangan ASPRI diarahkan menuju sistem yang semakin terintegrasi.

- [x] Digitalisasi transaksi
- [x] Dashboard
- [x] Rekap transaksi
- [x] Riwayat setoran
- [x] Cetak bukti transaksi
- [x] STS
- [x] Responsive mobile UI
- [ ] Sinkronisasi data lokal & server
- [ ] Offline-first transaction
- [ ] Automatic synchronization
- [ ] API integration
- [ ] Advanced analytics
- [ ] Audit log
- [ ] Role & permission yang lebih granular
- [ ] Peningkatan keamanan
- [ ] Integrasi layanan eksternal

---

## 🧭 Prinsip Pengembangan

ASPRI dikembangkan dengan prinsip:

> **Simple enough to use.  
> Powerful enough to manage.**

Fokus utama bukan hanya membuat aplikasi yang berjalan, tetapi membuat sistem yang dapat digunakan dalam proses administrasi sehari-hari.

### Prioritas

```text
Usability
    ↓
Reliability
    ↓
Data Accuracy
    ↓
Security
    ↓
Scalability
```

---

## 📈 Future Direction

ASPRI diarahkan menjadi ekosistem digital yang dapat menghubungkan:

```text
                 ┌──────────────┐
                 │    PETUGAS   │
                 └──────┬───────┘
                        │
                        ▼
                 ┌──────────────┐
                 │    ASPRI     │
                 └──────┬───────┘
                        │
          ┌─────────────┼─────────────┐
          ▼             ▼             ▼
      Transaksi       STS          Laporan
          │             │             │
          └─────────────┼─────────────┘
                        ▼
                ┌───────────────┐
                │    DATABASE   │
                └───────┬───────┘
                        │
                        ▼
                 ┌──────────────┐
                 │   ANALYTICS  │
                 └──────────────┘
```

Target akhirnya adalah menciptakan proses pengelolaan retribusi yang **lebih cepat, transparan, terdokumentasi, dan mudah dipantau**.

---

## 🖼️ Preview

> Tambahkan screenshot aplikasi di bagian ini.

Contoh:

```markdown
![Dashboard ASPRI](docs/screenshots/dashboard.png)

![Transaksi ASPRI](docs/screenshots/transaksi.png)

![Mobile ASPRI](docs/screenshots/mobile.png)
```

Struktur:

```text
docs/
└── screenshots/
    ├── dashboard.png
    ├── transaksi.png
    └── mobile.png
```

---

## 👨‍💻 Development

ASPRI dikembangkan secara bertahap berdasarkan kebutuhan operasional dan proses bisnis pengelolaan retribusi parkir.

Teknologi dan struktur aplikasi dapat terus berkembang mengikuti kebutuhan sistem.

---

## 📄 License

Project ini dikembangkan untuk kebutuhan internal/operasional dan pengembangan sistem informasi.

Penggunaan, distribusi, maupun modifikasi source code mengikuti kebijakan dan kewenangan pemilik sistem.

---

<p align="center">

### 🚗 ASPRI

**Digital Parking Retribution System**

Built with Danz Dev ❤️ for better administration, better data, and better service.

</p>

<p align="center">
  <sub>ASPRI • Sistem Informasi Retribusi Parkir</sub>
</p>
