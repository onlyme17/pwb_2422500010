<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rute Utama Admin
$route['admin'] = 'administrator/Admin_dashboard_controller/index';
$route['admin/login'] = 'administrator/admin_auth_controller/index';
$route['admin/logout'] = 'administrator/admin_auth_controller/logout';

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