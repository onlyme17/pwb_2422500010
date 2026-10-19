<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Ubah Kategori</h5>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?php echo $kategori['nama']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_kategori" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi_kategori" id="deskripsi_kategori" cols="30" rows="5" class="form-control"><?php echo $kategori['deskripsi']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?php echo base_url('admin/kategori') ?>" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>