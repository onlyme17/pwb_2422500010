<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main class="container-site"><section class="profile-panel"><p class="muted" style="margin:0 0 6px">AKUN PELANGGAN</p><h1>Profil Saya</h1><p class="muted">Berikut adalah data pelanggan yang terdaftar pada akun Anda.</p>
<table class="profile-table"><tbody>
<tr><th>Nama Lengkap</th><td><?php echo html_escape($pelanggan['nama_pelanggan']); ?></td></tr>
<tr><th>Email</th><td><?php echo html_escape($pelanggan['email']); ?></td></tr>
<tr><th>No. Telepon</th><td><?php echo html_escape($pelanggan['telp_pelanggan']); ?></td></tr>
<tr><th>Alamat</th><td><?php echo nl2br(html_escape($pelanggan['alamat'])); ?></td></tr>
<tr><th>Kota</th><td><?php echo html_escape(isset($pelanggan['kota']) ? $pelanggan['kota'] : ''); ?></td></tr>
<tr><th>Kode Pos</th><td><?php echo html_escape(isset($pelanggan['kode_pos']) ? $pelanggan['kode_pos'] : ''); ?></td></tr>
<tr><th>Provinsi</th><td><?php echo html_escape(isset($pelanggan['provinsi']) ? $pelanggan['provinsi'] : ''); ?></td></tr>
</tbody></table><p style="margin:22px 0 0"><a class="btn-shop" href="<?php echo base_url(); ?>">Kembali ke Beranda</a> <a class="nav-btn" style="background:#222" href="<?php echo base_url('logout'); ?>">Logout</a></p></section></main>
