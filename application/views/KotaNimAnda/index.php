<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= html_escape($judul); ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Kota</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <?php if ($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success alert-dismissible">
          <?= html_escape($this->session->flashdata('pesan')); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('pesan_error')): ?>
        <div class="alert alert-danger alert-dismissible">
          <?= html_escape($this->session->flashdata('pesan_error')); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?= validation_errors(); ?></div>
      <?php endif; ?>

      <?php if ($form_aksi !== null): ?>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= html_escape($judul); ?></h3>
          </div>
          <form method="post" action="<?= html_escape($form_aksi); ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_kota010">Nama Kota</label>
                <input type="text" id="nama_kota010" class="form-control"
                       name="nama_kota010" maxlength="50" required
                       value="<?= html_escape(set_value('nama_kota010', isset($row_form->nama_kota010) ? $row_form->nama_kota010 : '')); ?>">
              </div>

              <div class="form-group">
                <label for="jenis_kota010">Jenis Kota</label>
                <?php $jenis = set_value('jenis_kota010', isset($row_form->jenis_kota010) ? $row_form->jenis_kota010 : 'Kota'); ?>
                <select id="jenis_kota010" name="jenis_kota010" class="form-control" required>
                  <option value="Kota" <?= $jenis === 'Kota' ? 'selected' : ''; ?>>Kota</option>
                  <option value="Kabupaten" <?= $jenis === 'Kabupaten' ? 'selected' : ''; ?>>Kabupaten</option>
                </select>
              </div>

              <div class="form-group">
                <label for="provinsi010">Provinsi</label>
                <input type="text" id="provinsi010" class="form-control"
                       name="provinsi010" required
                       value="<?= html_escape(set_value('provinsi010', isset($row_form->provinsi010) ? $row_form->provinsi010 : '')); ?>">
              </div>

              <div class="form-group">
                <label for="status010">Status</label>
                <?php $status = set_value('status010', isset($row_form->status010) ? $row_form->status010 : 'Aktif'); ?>
                <select id="status010" name="status010" class="form-control" required>
                  <option value="Aktif" <?= $status === 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                  <option value="Tidak Aktif" <?= $status === 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= site_url('admin/kota'); ?>" class="btn btn-secondary">Batal</a>
            </div>
          </form>
        </div>
      <?php else: ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Kota</h3>
            <div class="card-tools">
              <a href="<?= site_url('admin/kota/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kota
              </a>
            </div>
          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width:60px">No.</th>
                  <th>Nama Kota</th>
                  <th>Jenis</th>
                  <th>Provinsi</th>
                  <th>Status</th>
                  <th style="width:160px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($kota)): $no = 1; foreach ($kota as $item): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= html_escape($item->nama_kota010); ?></td>
                    <td><?= html_escape($item->jenis_kota010); ?></td>
                    <td><?= html_escape($item->provinsi010); ?></td>
                    <td>
                      <span class="badge <?= $item->status010 === 'Aktif' ? 'badge-success' : 'badge-secondary'; ?>">
                        <?= html_escape($item->status010); ?>
                      </span>
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm"
                         href="<?= site_url('admin/kota/ubah/' . (int) $item->id_kota010); ?>">Ubah</a>
                      <a class="btn btn-danger btn-sm"
                         href="<?= site_url('admin/kota/hapus/' . (int) $item->id_kota010); ?>"
                         onclick="return confirm('Yakin ingin menghapus data kota ini?');">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; else: ?>
                  <tr><td colspan="6" class="text-center">Belum ada data kota.</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
</div>
