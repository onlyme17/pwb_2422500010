<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$list_kategori = isset($list_kategori) && is_array($list_kategori) ? $list_kategori : array();
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('message')): ?>
                <?php echo $this->session->flashdata('message'); ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Kategori</h3>
                    <div class="card-tools">
                        <a href="<?php echo base_url('admin/kategori/tambah'); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:60px;">No.</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th style="width:150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($list_kategori)): ?>
                            <?php $no = 1; foreach ($list_kategori as $item): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo html_escape(isset($item['nama']) ? $item['nama'] : ''); ?></td>
                                    <td><?php echo html_escape(isset($item['deskripsi']) ? $item['deskripsi'] : ''); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/kategori/ubah/' . (int) $item['id_kategori']); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Ubah
                                        </a>
                                        <a href="<?php echo base_url('admin/kategori/hapus/' . (int) $item['id_kategori']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center">Belum ada data kategori.</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
