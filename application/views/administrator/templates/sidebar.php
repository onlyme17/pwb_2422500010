<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo base_url('admin'); ?>" class="brand-link">
    <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>
  <div class="sidebar">
    <!-- Panel Pengguna -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">2422500010</a>
      </div>
    </div>
    <!-- Menu Navigasi -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <!-- Menu KATEGORI -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/kategori') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Kategori</p>
          </a>
        </li>

        <!-- Menu PRODUK — Sesuai Gambar -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/produk') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Produk</p>
          </a>
        </li>

        <!-- Menu Starter Pages -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Starter Pages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Active Page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Page</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Menu Logout -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
        
      </ul>
    </nav>
  </div>
</aside>