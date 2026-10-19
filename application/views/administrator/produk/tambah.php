<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Produk</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
              <label class="form-label">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Kategori Produk</label>
              <select name="kategori_produk" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($list_kategori as $kt): ?>
                  <option value="<?php echo $kt['id_kategori'] ?>"><?php echo $kt['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="number" name="harga_produk" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Stok Produk</label>
              <input type="number" name="stok_produk" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Foto Produk</label>
              <input type="file" name="gambar_produk[]" class="form-control" multiple accept="image/*">
              <small class="text-muted">Nama file otomatis menjadi: <code>produk_1_1.jpg</code></small>
            </div>

            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi_produk" rows="4" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Produk</button>
            <a href="<?php echo base_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>