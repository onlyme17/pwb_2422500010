<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="page-banner">
  <div>
    <h1>Login</h1>
    <div class="crumb"><a href="<?php echo base_url(); ?>">Home</a> &nbsp;/&nbsp; <span>login</span></div>
  </div>
</section>
<main class="container-site">
  <section class="form-panel login-panel">
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert"><?php echo html_escape($this->session->flashdata('message')); ?></div>
    <?php endif; ?>
    <?php if (validation_errors()): ?>
      <div class="alert"><?php echo validation_errors(); ?></div>
    <?php endif; ?>
    <?php echo form_open('login'); ?>
      <div class="field">
        <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Alamat Email" aria-label="Alamat Email" required>
      </div>
      <div class="field">
        <input type="password" id="password" name="password" placeholder="Password" aria-label="Password" required>
      </div>
      <label class="remember-row"><input type="checkbox" name="remember" value="1"> Remember me</label>
      <button class="submit-btn" type="submit">Login</button>
      <?php echo form_close(); ?>
      <a class="register-btn" href="<?php echo base_url('register'); ?>">Register</a>
  </section>
</main>
