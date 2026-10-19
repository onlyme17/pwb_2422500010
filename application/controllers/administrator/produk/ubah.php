<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/produk') ?>">Produk</a></li>
            <li class="breadcrumb-item active">Ubah</li>
          </ol>
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
              <input type="text" name="nama_produk" class="form-control" value="<?php echo $produk['nama'] ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Kategori Produk</label>
              <select name="kategori_produk" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($list_kategori as $kategori) : ?>
                  <option value="<?php echo $kategori['id_kategori'] ?>" 
                    <?php echo ($produk['kategori_id'] == $kategori['id_kategori']) ? 'selected' : '' ?>>
                    <?php echo $kategori['nama'] ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="number" name="harga_produk" class="form-control" value="<?php echo $produk['harga'] ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Stok Produk</label>
              <input type="number" name="stok_produk" class="form-control" value="<?php echo $produk['stok'] ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Gambar Saat Ini</label>
              <div class="row">
                <?php if (!empty($gambar)): ?>
                  <?php foreach ($gambar as $gb) : ?>
                    <div class="col-md-3 col-6 mb-2">
                      <img src="<?php echo base_url('uploads/produk/'.$gb['nama_gambar']) ?>" class="img-fluid rounded">
                      <a href="<?php echo base_url('admin/produk/hapus_satu_gambar/'.$gb['id_gambar'].'/'.$produk['id_produk']) ?>" 
                         class="btn btn-danger btn-sm w-100 mt-1"
                         onclick="return confirm('Yakin hapus gambar ini?')">Hapus</a>
                    </div>
                  <?php endforeach ?>
                <?php else: ?>
                  <p class="text-muted">Belum ada gambar</p>
                <?php endif ?>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Tambah/Ganti Gambar Baru</label>
              <input type="file" name="gambar_produk[]" class="form-control" multiple>
            </div>

            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi_produk" rows="4" class="form-control"><?php echo $produk['deskripsi'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ubah</button>
            <a href="<?php echo base_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>