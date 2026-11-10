<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo html_escape(isset($title) ? $title : 'Toko Online'); ?></title>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
<style>
*{box-sizing:border-box}
body{margin:0;background:#f8f9fa;color:#212529;font-family:Arial,Helvetica,sans-serif;font-size:14px}
.topbar{width:calc(100% - 14px);margin:7px auto 0;min-height:36px;background:#212529;color:#fff;display:flex;align-items:center;padding:0 10px;gap:18px}
.topbar a{color:#c7cbd0;text-decoration:none}
.topbar a:hover{color:#fff}
.topbar .site-title{font-size:16px;color:#fff;margin-right:2px}
.topbar .nav-search{margin-left:auto;display:flex;align-items:center}
.topbar .nav-search input{height:28px;width:170px;border:1px solid #ced4da;border-radius:3px;padding:5px 9px;font-size:13px}
.topbar .cart-link{display:inline-flex;align-items:center;gap:5px;padding:6px 10px;border:1px solid #adb5bd;border-radius:3px;color:#fff;text-decoration:none;white-space:nowrap}
.topbar .cart-count{display:inline-block;background:#ffc107;color:#212529;border-radius:12px;min-width:18px;padding:1px 5px;text-align:center;font-size:11px;font-weight:bold}
.search-form{display:flex;align-items:center;gap:0}
.topbar .nav-actions{display:flex;align-items:center;gap:10px}
.topbar .nav-actions a{display:inline-block;padding:6px 11px;border:1px solid #adb5bd;border-radius:3px;color:#fff;line-height:1.2}
.topbar .nav-actions a.register{background:#ffc107;border-color:#ffc107;color:#212529}
.nav-dropdown{position:relative}
.nav-dropdown-menu{display:none;position:absolute;z-index:20;top:100%;left:0;min-width:140px;background:#fff;border:1px solid #ddd;box-shadow:0 3px 8px #0002;padding:5px}
.nav-dropdown:hover .nav-dropdown-menu{display:block}
.nav-dropdown-menu a{display:block;padding:7px;color:#212529}
.page-banner{width:calc(100% - 34px);margin:20px auto 0;background:#f1f3f5;min-height:145px;display:flex;align-items:center;justify-content:center;text-align:center}
.page-banner h1{font-size:21px;font-weight:400;margin:0 0 8px}
.page-banner .crumb{color:#6c757d}
.page-banner .crumb a{color:#0d6efd;text-decoration:none}
.container-site{max-width:1160px;margin:0 auto;padding:22px 20px}
.login-panel{max-width:365px;margin:18px auto 35px;background:transparent;padding:0;border:0;box-shadow:none}
.login-panel h1,.login-panel .muted{display:none}
.field{margin:0 0 12px}
.field label{display:block;margin-bottom:6px;font-weight:600}
.field input,.field textarea{width:100%;height:48px;padding:12px;border:1px solid #ced4da;border-radius:4px;background:#fff;font-size:13px}
.submit-btn{width:100%;height:40px;border:0;background:#198754;color:#fff;border-radius:3px;font-size:14px;cursor:pointer}
.register-btn{display:block;width:100%;height:40px;margin-top:13px;background:#0d6efd;color:#fff;border-radius:3px;text-align:center;text-decoration:none;padding:11px;font-size:14px}
.remember-row{display:flex;align-items:center;gap:5px;margin:0 0 12px;color:#343a40;font-size:13px}
.remember-row input{margin:0}
.alert{padding:10px 12px;background:#fff3cd;border:1px solid #ffecb5;color:#664d03;border-radius:4px;margin:0 0 12px;font-size:13px}
.error-text{color:#bd3333;font-size:12px}
.site-footer{margin-top:55px;background:#212529;color:#e9ecef;padding:28px 20px;text-align:center;font-size:13px}
.product-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:20px}
.product-card{border:1px solid #e8edf2;border-radius:8px;overflow:hidden;background:#fff}
.product-image{height:205px;background:#f2f4f6;display:flex;align-items:center;justify-content:center}
.product-image img{width:100%;height:100%;object-fit:contain}
.product-info{padding:16px}
.product-info h3{font-size:16px;margin:0 0 8px}
.price{font-size:18px;font-weight:800;color:#b77900;margin:10px 0}
.pill{font-size:11px;color:#68717b;background:#f1f3f5;padding:5px 8px;border-radius:20px}
.section-title{display:flex;justify-content:space-between;align-items:end;margin:22px 0 18px}
.section-title h2{margin:0;font-size:25px}
.hero{min-height:330px;background:linear-gradient(90deg,rgba(10,15,20,.84),rgba(10,15,20,.18)),url('<?php echo base_url('uploads/produk/produk_1_1.png'); ?>') center/cover;border-radius:10px;display:flex;align-items:center;padding:45px;color:#fff}
.hero h1{font-size:38px;line-height:1.15;margin:0 0 14px}
.btn-shop{display:inline-block;background:#ffc107;color:#212529;padding:12px 20px;border-radius:5px;text-decoration:none;font-weight:700}
.profile-panel{max-width:760px;margin:24px auto;background:#fff;border:1px solid #e8edf2;border-radius:8px;padding:28px}
.profile-panel h1{font-size:27px;margin:0 0 8px}
.profile-table{width:100%;border-collapse:collapse;margin-top:18px}
.profile-table th,.profile-table td{text-align:left;padding:13px;border-bottom:1px solid #e8edf2}
@media(max-width:620px){.topbar{flex-wrap:wrap;padding:8px;gap:10px}.topbar .nav-search{order:3;margin-left:0}.topbar .nav-actions{margin-left:auto}.page-banner{min-height:120px}.login-panel{max-width:calc(100% - 30px)}}
</style>
</head>
<body>
<nav class="topbar">
<a class="site-title" href="<?php echo base_url(); ?>">Title</a>
<a href="<?php echo base_url(); ?>">Home</a>
<div class="nav-dropdown"><a href="<?php echo base_url('#produk'); ?>">Kategori⌄</a><div class="nav-dropdown-menu"><a href="<?php echo base_url('#produk'); ?>">Semua Kategori</a></div></div>
<form class="nav-search search-form" action="<?php echo base_url(); ?>" method="get">
<input type="search" name="q" value="<?php echo html_escape(isset($keyword) ? $keyword : $this->input->get('q', true)); ?>" placeholder="Search" aria-label="Cari produk">
</form>
<a class="cart-link" href="<?php echo base_url('keranjang'); ?>" aria-label="Keranjang belanja">Keranjang <span class="cart-count"><?php $cart_header = $this->session->userdata('keranjang'); echo is_array($cart_header) ? array_sum($cart_header) : 0; ?></span></a>
<div class="nav-actions">
<?php if (!empty($pelanggan_login)): ?>
<a href="<?php echo base_url('profil'); ?>">Profil</a><a href="<?php echo base_url('logout'); ?>">Logout</a>
<?php else: ?>
<a href="<?php echo base_url('login'); ?>">Login</a><a class="register" href="<?php echo base_url('register'); ?>">Register</a>
<?php endif; ?>
</div>
</nav>
