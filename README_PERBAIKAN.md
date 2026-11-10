# PWB 2422500010 — Front-end Pelanggan

Proyek ini menggunakan CodeIgniter 3 dan database MySQL `pwb_2422500010`.

## Fitur yang diselesaikan
- Beranda dan daftar produk dari tabel `produk`, `kategori`, dan `produk_gambar`.
- Registrasi pelanggan dengan validasi dan password hash `password_hash()`.
- Login dan logout pelanggan menggunakan session.
- Menu Profil yang hanya dapat dibuka setelah login dan menampilkan data akun yang sedang login.
- Rute bersih: `/`, `/beranda`, `/login`, `/register`, `/profil`, `/logout`.
- Halaman administrator dan rute admin yang sudah ada tetap dipertahankan.

## Cara menjalankan di Laragon atau XAMPP
1. Ekstrak folder `pwb_2422500010` ke `C:\xampp\htdocs\`.
2. Jalankan Apache dan MySQL dari Laragon/XAMPP.
3. Buka phpMyAdmin, buat/import database `pwb_2422500010` menggunakan file `pwb_2422500010.sql` yang ada di folder proyek ini.
   - Jika database lama sudah dipakai dan berisi data, backup dahulu lalu jalankan `database_upgrade_pelanggan.sql` satu kali. Jangan jalankan file upgrade berulang kali.
4. Periksa `application/config/database.php`: username/password MySQL harus sesuai konfigurasi XAMPP Anda (default Laragon/XAMPP umumnya `root` dan password kosong).
5. Periksa `application/config/config.php`: `base_url` harus sesuai nama folder. Default proyek ini `http://localhost/pwb_2422500010/`.
6. Buka `http://localhost/pwb_2422500010/`.

## Pengujian fitur
1. Beranda menampilkan produk dari database.
2. Klik Register, isi seluruh data, lalu simpan.
3. Login dengan email dan password yang baru didaftarkan.
4. Setelah login diarahkan ke Profil; periksa nama, email, telepon, alamat, kota, kode pos, dan provinsi.
5. Klik Logout; akses `/profil` harus mengarahkan kembali ke login.
6. Uji menu administrator melalui `/admin/login`.

## Catatan konfigurasi
- Jika folder proyek diganti, sesuaikan `base_url` pada `application/config/config.php`.
- `database_upgrade_pelanggan.sql` adalah migrasi untuk database lama, sedangkan `pwb_2422500010.sql` adalah dump lengkap untuk instalasi baru.
- Password akun pelanggan baru disimpan sebagai hash, bukan teks biasa.

## Pengumpulan melalui GitHub (sesuai halaman 14)
1. Buat repository baru di GitHub.
2. Buka terminal pada folder proyek `pwb_2422500010`.
3. Jalankan perintah berikut (ganti URL dengan URL repository milik Anda):

```bash
git init
git add .
git commit -m "Menyelesaikan front-end pelanggan PWB"
git branch -M main
git remote add origin https://github.com/USERNAME/NAMA-REPOSITORY.git
git push -u origin main
```

Jangan unggah password database, file konfigurasi rahasia, atau data pribadi pelanggan sungguhan ke repository publik. Setelah push berhasil, kumpulkan tautan repository pada LMS.

## Kompatibilitas PHP 8.2+
Pada `index.php`, environment development tidak menampilkan `E_DEPRECATED` dan
`E_USER_DEPRECATED` dari CodeIgniter 3 lama. Ini mencegah peringatan dynamic
property mencetak output sebelum session dimulai. Peringatan/error lain tetap
ditampilkan. Ini penanganan kompatibilitas sementara; gunakan CodeIgniter 3
versi terbaru yang tersedia dan PHP 8.1 bila lingkungan lokal menyediakan.


## Audit kesesuaian tugas PERTEMUAN 9-10 (14 halaman)
- Halaman 1-3: controller pelanggan menampilkan header, carousel, home, dan footer; aset berada di folder `assets` dan dipanggil dengan `base_url()`.
- Halaman 4-7: rute `/login`, controller dan model pelanggan, serta halaman login tersedia.
- Halaman 8-11: registrasi menyimpan nama, email, password hash, telepon, alamat, kota, kode pos, dan provinsi; validasi dan pengecekan email ganda tersedia.
- Halaman 12-13: logout menghapus session pelanggan; alur registrasi/login/logout perlu diuji menggunakan browser.
- Halaman 14: menu Profil tampil setelah login; halaman `/profil` membaca data pelanggan dari database berdasarkan ID akun yang login.
- Sesuai urutan materi, URL utama `/` menampilkan halaman pelanggan. Admin dikelola terpisah melalui `/admin`, `/admin/kategori`, dan `/admin/produk`.
- Database yang sudah berisi data jangan diimpor ulang. Periksa nama kolom tabel `pelanggan` agar sesuai dengan model: `nama_pelanggan` dan `telp_pelanggan`.
