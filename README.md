# 🌱 Seedstead - E-commerce Bibit Tanaman

**Seedstead** adalah proyek akhir kelas 10 SMK Telkom Banjarbaru yang dikembangkan oleh tim kami untuk membangun situs **e-commerce jual beli bibit/benih tanaman**. Tujuan utama dari proyek ini adalah untuk menyediakan platform penjualan bibit tanaman secara daring dengan tampilan yang sederhana, intuitif, dan mudah digunakan oleh admin maupun user.

Aplikasi ini dibuat dengan menggunakan **PHP Native**, serta dukungan **HTML, CSS, dan JavaScript** tanpa menggunakan framework eksternal. Dashboard disediakan secara terpisah untuk **pengguna (user)** dan **administrator (admin)** agar pengelolaan dan pemantauan transaksi lebih efisien.

> ⚠️ Proyek ini **belum 100% sempurna** dan **masih dalam tahap pengembangan**. Beberapa fitur belum responsif penuh di layar kecil, dan Saya berencana untuk terus menyempurnakan proyek ini ke depannya, termasuk peningkatan desain UI/UX, keamanan, dan skalabilitas.

---

## 🔥 Fitur Utama

### 💼 Halaman Publik
- `index.php` → Beranda (About & Banner)
- `products.php` → Daftar semua produk bibit
- `login.php` dan `register.php` → Form login dan pendaftaran user
- Fitur **searching produk**
- Fitur **filter berdasarkan kategori produk**

### 👤 Dashboard User (Setelah Login)
- Home Dashboard (navigasi ke semua fitur)
- **Checkout** → Menampilkan produk yang telah dipilih dan menunggu pembayaran
- **Pending Order** → Daftar pesanan yang masih menunggu validasi/pemrosesan oleh admin
- **Completed Orders** → Riwayat pesanan yang sudah selesai
- **Canceled Orders** → Daftar pesanan yang dibatalkan
- **Shopping Cart** → Keranjang belanja pengguna
- **Profile** → Informasi dan data pengguna
- **Logout**

### 🛠️ Dashboard Admin
- **Manajemen Produk** → Tambah, edit, hapus produk
- **Validasi Pesanan** → Melihat & memproses pesanan user
- **Manajemen Status Pesanan** → Melacak pesanan berdasarkan status (checkout, pending, complete, cancel)
- **Manajemen Akun Pengguna**

---

## 🧱 Tech Stack

| Teknologi | Deskripsi                      |
|-----------|--------------------------------|
| PHP       | Backend server-side (native)   |
| MySQL     | Database relasional            |
| HTML5     | Struktur halaman web           |
| CSS3      | Styling dan layout halaman     |
| JavaScript |  interaksi UI untuk Banner    |
| Git       | Version control system         |
| GitHub    | repository dan kolaborasi      |

---


> Beberapa file seperti validasi keamanan dan logika kompleks belum terpisah secara modular — akan disempurnakan di pengembangan berikutnya.



---

## ⚙️ Cara Menjalankan Secara Lokal

1. **Clone repository ini**

```bash
git clone https://github.com/Greatwraith/seedstead.git
```


2. **Pindahkan ke direktori XAMPP**

```bash
C:\xampp\htdocs\seedstead
```


3. **Buat database baru di phpMyAdmin**

Nama database: 
```seedstead```

Import file: ```ujian_blok6.sql```


4. **Atur koneksi database di /database/config.php**

```bash
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'seedstead';
```


5. **Gunakan XAMPP/MAMP/LARAGON**

jalankan server web (Apache), basis data (MySQL/MariaDB), dan bahasa pemrograman (PHP, Perl) 



6. **Akses melalui browser**

http://localhost/seedstead





❗ Kendala Saat Ini

> Responsivitas pada perangkat mobile kecil (HP) belum maksimal

> Tampilan lebih optimal di perangkat minimal seukuran tablet (Galaxy Fold2 atau lebih besar)

> Keamanan dan struktur file akan ditingkatkan di versi selanjutnya




📌 Rencana Pengembangan Selanjutnya

> Notifikasi admin dan user (e.g., status pesanan)
> Desain responsif penuh (mobile-first)
> Duplikat Proyek menggunakan Framework Laravel






🤝 Kontributor

👨‍💻 M. Ardhan Rahman
Role: Programmer | Project Coordinator
GitHub: @Greatwraith
Tugas: IDEA, Leader, Design, Backend, Frontend, Struktur Proyek, GitHub Maintainer, Database Manager

👨‍💻 Ricky Stevan
Role: Programmer
Tugas: IDEA, Design, Frontend, 2nd Leader

👨‍💻 Javaren
Role: Documentation & Presentation Specialist
Tugas: Proposal Writer, Presentation Maker, IDEA, Design

Proyek Akhir Kelas X – SMK Telkom Banjarbaru, Tahun Ajaran 2024/2025




