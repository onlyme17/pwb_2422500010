<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main class="container-site"><section class="form-panel"><h1>Registrasi Pelanggan</h1><p class="muted">Lengkapi data berikut untuk membuat akun.</p>
<?php if ($this->session->flashdata('message')): ?><div class="alert"><?php echo html_escape($this->session->flashdata('message')); ?></div><?php endif; ?>
<?php if (validation_errors()): ?><div class="alert"><?php echo validation_errors(); ?></div><?php endif; ?>
<?php echo form_open('register'); ?><div class="form-grid">
<div class="field"><label for="nama">Nama Lengkap</label><input id="nama" name="nama" value="<?php echo set_value('nama'); ?>" required maxlength="100"></div>
<div class="field"><label for="telepon">No. Telepon</label><input id="telepon" name="telepon" value="<?php echo set_value('telepon'); ?>" required maxlength="20"></div>
<div class="field full"><label for="alamat">Alamat</label><textarea id="alamat" name="alamat" required><?php echo set_value('alamat'); ?></textarea></div>
<div class="field"><label for="kota">Kota</label><input id="kota" name="kota" value="<?php echo set_value('kota'); ?>" required maxlength="100"></div>
<div class="field"><label for="kode_pos">Kode Pos</label><input id="kode_pos" name="kode_pos" value="<?php echo set_value('kode_pos'); ?>" required maxlength="10"></div>
<div class="field"><label for="provinsi">Provinsi</label><input id="provinsi" name="provinsi" value="<?php echo set_value('provinsi'); ?>" required maxlength="100"></div>
<div class="field"><label for="email">Email</label><input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" required maxlength="100"></div>
<div class="field"><label for="password">Password (min. 6 karakter)</label><input type="password" id="password" name="password" required minlength="6"></div>
<div class="field"><label for="konfirmasi_password">Konfirmasi Password</label><input type="password" id="konfirmasi_password" name="konfirmasi_password" required minlength="6"></div>
</div><button class="submit-btn" type="submit">Register</button><?php echo form_close(); ?>
<p class="muted" style="text-align:center;margin:18px 0 0">Sudah memiliki akun? <a href="<?php echo base_url('login'); ?>">Login</a></p></section></main>
