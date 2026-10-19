<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active">Daftar Produk</li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <p class="card-text">
                <i class="fas fa-table me-1"></i>
                Semua Produk
                <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-labeled btn-primary">
                  <span class="btn-label">
                    <i class="fas fa-plus"></i>
                  </span>
                  Produk
                </a>
              </p>

              <?php if ($this->session->flashdata('message')) : ?>
                <?php echo $this->session->flashdata('message') ?>
              <?php endif ?>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($list_produk as $produk) : ?>
                    <tr>
                      <th scope="row"><?php echo $no ?></th>
                      <td><?php echo $produk['pd_nama'] ?></td>
                      <td><?php echo $produk['kt_nama'] ?></td>
                      <td>Rp. <?php echo number_format($produk['harga']) ?></td>
                      <td><?php echo $produk['stok'] ?></td>
                      <td><?php echo $produk['deskripsi'] ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/produk/ubah/' . $produk['id_produk']) ?>" class="badge bg-success">Ubah</a>
                        <a href="<?php echo base_url('admin/produk/hapus/' . $produk['id_produk']) ?>" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                      </td>
                    </tr>
                  <?php $no++;
                  endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>