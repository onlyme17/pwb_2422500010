<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/kategori') ?>">Kategori</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12"> <!-- Penuh seluruh lebar layar -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Ubah Kategori</h5>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?php echo $kategori['nama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_kategori">Deskripsi</label>
                                    <textarea name="deskripsi_kategori" id="deskripsi_kategori" class="form-control" rows="8"><?php echo $kategori['deskripsi']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-check"></i> Perbarui
                                </button>
                                <a href="<?php echo base_url('admin/kategori') ?>" class="btn btn-danger">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>