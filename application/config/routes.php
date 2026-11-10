<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Sesuai materi Pertemuan 9-10: halaman awal adalah front-end pelanggan.
// Halaman administrator tetap diakses melalui /admin dan /admin/produk.
$route['default_controller'] = 'pelanggan_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rute Utama Admin
$route['admin'] = 'administrator/Admin_dashboard_controller/index';
$route['admin/login'] = 'administrator/Admin_auth_controller/index';
$route['admin/logout'] = 'administrator/Admin_auth_controller/logout';

// Alias agar alamat /login yang pernah digunakan tidak 404.
// Login pelanggan menggunakan route /login.

// Master Kota
$route['KotaNimAnda_controller'] = 'KotaNimAnda_controller/index';
$route['KotaNimAnda_controller/tambah'] = 'KotaNimAnda_controller/tambah';
$route['KotaNimAnda_controller/ubah/(:num)'] = 'KotaNimAnda_controller/ubah/$1';
$route['KotaNimAnda_controller/hapus/(:num)'] = 'KotaNimAnda_controller/hapus/$1';

// Rute Kategori
$route['admin/kategori'] = 'administrator/kategori_controller/index';
$route['admin/kategori/tambah'] = 'administrator/kategori_controller/tambah';
$route['admin/kategori/ubah/(:num)'] = 'administrator/kategori_controller/ubah/$1';
$route['admin/kategori/hapus/(:num)'] = 'administrator/kategori_controller/hapus/$1';

// Rute Produk
$route['admin/produk'] = 'administrator/Produk_controller/index';
$route['admin/produk/tambah'] = 'administrator/Produk_controller/tambah_produk';
$route['admin/produk/ubah/(:num)'] = 'administrator/Produk_controller/ubah_produk/$1';
$route['admin/produk/hapus/(:num)'] = 'administrator/Produk_controller/hapus_produk/$1';
$route['admin/produk/hapus_satu_gambar/(:num)/(:num)'] = 'administrator/Produk_controller/hapus_satu_gambar/$1/$2';

// Front-end pelanggan sesuai materi Pertemuan 9-10
$route['beranda'] = 'pelanggan_controller/index';
$route['login'] = 'pelanggan_controller/login';
$route['register'] = 'pelanggan_controller/register';
$route['profil'] = 'pelanggan_controller/profil';
$route['keranjang'] = 'pelanggan_controller/keranjang';
$route['keranjang/tambah/(:num)'] = 'pelanggan_controller/tambah_keranjang/$1';
$route['keranjang/hapus/(:num)'] = 'pelanggan_controller/hapus_keranjang/$1';
$route['logout'] = 'pelanggan_controller/logout';
