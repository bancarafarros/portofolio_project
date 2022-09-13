<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <buttton class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahData">
                        <i class="fas fa-plus-square me-2"></i>Tambah Data
                    </buttton>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <?php echo $this->session->flashdata('message'); ?>
                        <table class="table table-hover table-striped table-bordered align-items-center text-center">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Name</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($categories as $ctg) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $ctg->name ?></td>
                                        <td>
                                            <?php echo anchor(
                                                'CCategory/halamanUpdate/' . $ctg->id,
                                                '<div class="btn btn-warning"><i class="fa fa-edit"></i></div>'
                                            ) ?>
                                        </td>
                                        <td>
                                            <!-- <?php echo anchor(
                                                'CCategory/fungsiDelete/' . $ctg->id,
                                                '<div class="btn btn-danger"><i class="fa fa-trash"></i></div>'
                                            ) ?> -->
                                            <button type="button" class="btn btn-danger" data-id-category="<?= $ctg->id ?>" onclick="deleteConfirm('<?= $ctg->id ?>')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('CCategory/fungsiTambah') ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Name of Category</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    
    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data yang sudah dihapus tidak bisa dikembalikan</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                        <a href="<?php echo base_url('CWork/fungsiDelete/' . $wrk->id) ?>" class="btn btn-danger ">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang sudah dihapus tidak bisa dikembalikan</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Tidak</button>
                        <a href="#" id="buttonHapus" class="btn btn-danger ">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteConfirm(id) {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {})
        var button = document.getElementById('buttonHapus');
        button.href="<?= base_url('CCategory/fungsiDelete/') ?>" + id;
        console.log(button);
        myModal.toggle();
    }
    </script>