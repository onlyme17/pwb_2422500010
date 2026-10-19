<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Kategori</h5>
                            <p class="card-text">
                                <a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Kategori
                                </a>
                            </p>

                            <?php if ($this->session->flashdata('message')): ?>
                                <?php echo $this->session->flashdata('message'); ?>
                            <?php endif; ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($list_kategori as $k): ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $k['nama']; ?></td>
                                        <td><?php echo $k['deskripsi']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/kategori/ubah/'.$k['id_kategori']) ?>" class="btn btn-sm btn-success">Ubah</a>
                                            <a href="<?php echo base_url('admin/kategori/hapus/'.$k['id_kategori']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>