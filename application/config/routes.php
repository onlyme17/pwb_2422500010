<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rute Utama Admin
$route['admin'] = 'administrator/Admin_dashboard_controller/index';
$route['admin/login'] = 'administrator/Admin_auth_controller/index';
$route['admin/logout'] = 'administrator/Admin_auth_controller/logout';

// Rute Kategori — K = BESAR, sesuaikan Controller
$route['admin/kategori'] = 'administrator/Kategori_controller/index';
$route['admin/kategori/tambah'] = 'administrator/Kategori_controller/tambah';
$route['admin/kategori/ubah/(:num)'] = 'administrator/Kategori_controller/ubah/$1';
$route['admin/kategori/hapus/(:num)'] = 'administrator/Kategori_controller/hapus/$1';

// Rute Produk
$route['admin/produk'] = 'administrator/Produk_controller/index';
$route['admin/produk/tambah'] = 'administrator/Produk_controller/tambah_produk';
$route['admin/produk/ubah/(:num)'] = 'administrator/Produk_controller/ubah_produk/$1';
$route['admin/produk/hapus/(:num)'] = 'administrator/Produk_controller/hapus_produk/$1';
$route['admin/produk/hapus_satu_gambar/(:num)/(:num)'] = 'administrator/Produk_controller/hapus_satu_gambar/$1/$2';

// Alias login untuk URL /login; login utama tetap tersedia di /admin/login.
$route['login'] = 'administrator/Admin_auth_controller/index';

// Master Kota sesuai tugas.
$route['admin/kota'] = 'KotaNimAnda_controller/index';
$route['admin/kota/tambah'] = 'KotaNimAnda_controller/tambah';
$route['admin/kota/ubah/(:num)'] = 'KotaNimAnda_controller/ubah/$1';
$route['admin/kota/hapus/(:num)'] = 'KotaNimAnda_controller/hapus/$1';

// URL controller langsung juga tetap bisa dipakai.
$route['KotaNimAnda_controller'] = 'KotaNimAnda_controller/index';
$route['KotaNimAnda_controller/tambah'] = 'KotaNimAnda_controller/tambah';
$route['KotaNimAnda_controller/ubah/(:num)'] = 'KotaNimAnda_controller/ubah/$1';
$route['KotaNimAnda_controller/hapus/(:num)'] = 'KotaNimAnda_controller/hapus/$1';
