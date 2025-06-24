🔧 IoT Monitoring System — CodeIgniter 3

Proyek ini adalah sistem **monitoring IoT** berbasis web menggunakan **CodeIgniter 3**. Dibuat sebagai tugas bersama untuk latihan real-case project berbasis CRUD dan Role Management, dengan pembagian hak akses berdasarkan level user: **Admin, Operator, dan Viewer**.

---

📌 Fitur Utama

✅ Autentikasi Login  
✅ Manajemen Device (CRUD)  
✅ Log Sensor Otomatis (Simulasi)  
✅ Hak Akses Per Role  
✅ Tampilan Responsive pakai Bootstrap 5  
✅ Sidebar Dinamis  
✅ Statistik Ringan di Dashboard  
✅ Siap dikembangkan dengan AdminLTE

---

👥 Hak Akses Berdasarkan Role

| Role     | Tampilan Menu                                  | Hak Akses                                          |
|----------|-------------------------------------------------|----------------------------------------------------|
| **Admin**    | Semua menu                                      | Full CRUD di semua modul                           |
| **Operator** | Dashboard, Lihat Device, Sensor Log (CRUD sendiri) | Bisa tambah/edit/hapus hanya **log miliknya** |
| **Viewer**   | Dashboard, Lihat Device, Lihat Sensor Log        | Hanya bisa lihat, **tanpa tombol aksi**            |

---

🚀 Cara Menjalankan Proyek Ini

1. Clone Repository

```bash
git clone https://github.com/ahmad-indragiri/iot-monitoring.git
cd iot-monitoring
```

2. Setup XAMPP

- Letakkan folder `iot-monitoring/` di `htdocs`
- Jalankan **Apache** dan **MySQL** di XAMPP Control Panel

---

🛠️ Setup Database ##

1. Buka **phpMyAdmin**
2. Buat database baru: `db_iot_monitoring`
3. Import file SQL:
   - File `.sql` bisa kamu temukan di folder `db/`
   - Atau buat manual berdasarkan struktur berikut:

```sql
CREATE TABLE `user` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nama_user` varchar(100),
  `email` varchar(100) UNIQUE,
  `password` varchar(255),
  `role` enum('admin','operator','viewer')
);

CREATE TABLE `device` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nama_device` varchar(100),
  `tipe_device` varchar(100),
  `lokasi` varchar(100),
  `status` enum('aktif','nonaktif')
);

CREATE TABLE `sensor_log` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `id_device` int,
  `id_user` int,
  `waktu_log` datetime,
  `nilai_sensor` varchar(100),
  `status_log` varchar(100)
);
```

4. Tambahkan 1 user admin via phpMyAdmin langsung (untuk login awal), contoh:

```sql
INSERT INTO user (nama_user, email, password, role) 
VALUES ('Admin', 'admin@gmail.com', '$2y$10$hashed_password', 'admin');
```

> Password di atas harus digenerate pakai `password_hash()` (bisa dari PHP atau pakai fitur login terlebih dulu).

---

⚙️ Konfigurasi

Buka file `application/config/config.php` dan `application/config/database.php`, ubah sesuai:

```php
// config.php
$config['base_url'] = 'http://localhost/iot-monitoring/';

// database.php
$db['default'] = array(
  'hostname' => 'localhost',
  'username' => 'root',
  'password' => '',
  'database' => 'db_iot_monitoring',
  'dbdriver' => 'mysqli',
  ...
);
```

---

💡 Struktur Folder Penting

```
application/
├── controllers/
│   ├── Auth.php
│   ├── Device.php
│   ├── Sensor_log.php
│   └── User.php
├── models/
│   ├── Device_model.php
│   ├── Sensor_log_model.php
│   └── User_model.php
├── views/
│   ├── layouts/
│   │   ├── header.php
│   │   ├── sidebar.php
│   │   └── footer.php
│   ├── device/
│   ├── sensor_log/
│   ├── user/
│   └── dashboard.php
```

---

🧠 Catatan Teknis

- Gunakan **Bootstrap CDN** agar tidak pusing masalah path.
- Sidebar akan otomatis berubah sesuai role saat login.
- Semua kontrol akses dilakukan di controller, bukan di view.
- Tombol **Tambah, Edit, Hapus** akan otomatis hilang jika role tidak punya hak akses.
- Viewer sama sekali tidak bisa mengakses `create`, `edit`, dan `delete` meskipun coba lewat URL.

---

🧪 Pengujian Skenario Login

1. **Login Admin** → harus bisa akses semua menu.
2. **Login Operator** → hanya bisa CRUD log miliknya sendiri.
3. **Login Viewer** → hanya bisa melihat data.

---

✅ Todo Selanjutnya

- [ ] Integrasi dengan sensor IoT nyata (jika ada)
- [ ] Statistik chart (sensor per device)
- [ ] Export PDF & Excel (opsional)
- [ ] Penerapan AdminLTE full

---

🛡️ Lisensi

Proyek ini digunakan untuk keperluan pembelajaran dan tugas kelompok. Jangan digunakan untuk tujuan komersial tanpa izin.
