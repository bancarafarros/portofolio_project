<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <!-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahData">
                        <i class="fas fa-plus-square me-2"></i>Tambah Data
                    </button> -->
                    <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-square me-2"></i>Tambah Data
                    </button> -->
                    <buttton class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahData">
                    <i class="fas fa-plus-square me-2"></i>Tambah Data
                    </buttton>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-hover table-striped table-bordered align-items-center text-center">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Content</th>
                                    <th>Featured Image</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Updated At</th>
                                    <th>Updated By</th>
                                    <th colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($works as $wrk) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $wrk->title ?></td>
                                        <td><?php echo $wrk->year ?></td>
                                        <td><?php echo $wrk->content ?></td>
                                        <td><?php echo $wrk->featured_image ?></td>
                                        <!-- <td><?php echo '<center><img src="' . base_url('./uploads/' . $wrk->featured_image) . '" border="0" width="70px" height="70px"> </center>'; ?></td> -->
                                        <td><?php echo $wrk->created_at ?></td>
                                        <td><?php echo $wrk->created_by ?></td>
                                        <td><?php echo $wrk->updated_at ?></td>
                                        <td><?php echo $wrk->updated_by ?></td>
                                        <td>
                                            <?php echo anchor(
                                                'CWork/halamanDetail/' . $wrk->id,
                                                '<div class="btn btn-success"><i class="fas fa-search-plus"></i></div>'
                                            ) ?>
                                        </td>
                                        <td>
                                            <?php echo anchor(
                                                'CWork/halamanUpdate/' . $wrk->id,
                                                '<div class="btn btn-warning"><i class="fa fa-edit"></i></div>'
                                            ) ?>
                                        </td>
                                        <td>
                                            <buttton class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('operator/CKegiatanCRUD/fungsiTambah') ?>" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Sub Kegiatan</label>
                                    <input type="text" name="sub_kegiatan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Belanja</label>
                                    <input type="text" name="nama_belanja" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Kode Rekening</label>
                                    <div class="form-group">
                                        <select required name="nama_pptk" class="form-control">

                                            <option value="">--Pilih Kode Rekening--</option>
                                            <?php
                                            foreach ($user as $dxd) {

                                                echo "<option value='" . $dxd->kode_rek . "'>" . $dxd->kode_rek . "</option>";
                                            }
                                            echo "
		                                    </select>"
                                            ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pagu Anggaran</label>
                                    <input type="number" name="pagu_anggaran" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nama PPTK</label>
                                    <div class="form-group">
                                        <select required name="nama_pptk" class="form-control">

                                            <option value="">--Pilih PPTK--</option>
                                            <?php
                                            foreach ($user as $dxd) {

                                                echo "<option value='" . $dxd->nama_pengguna . "'>" . $dxd->nama_pengguna . "</option>";
                                            }
                                            echo "
		                                    </select>"
                                            ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Input</label>
                                    <input type="date" name="tanggal_input" class="form-control">
                                </div>
                            </div>
                        </div>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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