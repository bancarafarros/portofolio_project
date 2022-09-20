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
                        <?php echo $this->session->flashdata('title'); ?>
                        <?php echo $this->session->flashdata('year'); ?>
                        <?php echo $this->session->flashdata('content'); ?>

                        <div class="row mb-1 ms-1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Year</label>
                                    <select class="form-select js-example-basic-single" size="3" name="year">
                                        <?php foreach ($works as $wrk) : ?>
                                            <option value="<?php echo $wrk->year ?>"><?php echo $wrk->year ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select class="form-select js-example-basic-multiple" name="category_id[]" multiple="multiple">
                                        <?php foreach ($categories as $ctg) : ?>
                                            <option value="<?php echo $ctg->id ?>"><?php echo $ctg->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <buttton class="btn btn-primary mt-4" type="submit">
                                    <i class="fas fa-filter me-1"></i>Filter
                                </buttton>
                            </div>
                        </div>

                        <table id="table" class="table table-hover table-striped table-bordered align-items-center text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Updated At</th>
                                    <th>Updated By</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                        $no = 1;
                                        foreach ($works as $wrk) :
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $wrk->title ?></td>
                                        <td><?= $wrk->year ?></td>
                                        <td><?= $wrk->content ?></td>
                                        <td><?= '<center><img src="' . base_url('./uploads/' . $wrk->featured_image) . '" border="0" width="70px" height="70px"> </center>'; ?></td>
                                        <td><?= $wrk->created_at ?></td>
                                        <td><?= $wrk->created_by ?></td>
                                        <td><?= $wrk->updated_at ?></td>
                                        <td><?= $wrk->updated_by ?></td>
                                        <td>
                                            <a class="btn btn-success" target="_blank" href="<?= base_url('CWork/halamanpreview/') . $wrk->id ?>"><i class="fas fa-search-plus"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= base_url('CWork/halamanUpdate/') . $wrk->id ?>"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <buttton class="btn btn-danger" data-id-category="<?= $wrk->id ?>" onclick="deleteConfirm('<?= $wrk->id ?>')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?> -->
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
                    <form action="<?php echo base_url('CWork/fungsiTambah') ?>" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" name="year" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <div class="form-group">
                                        <select class="form-select" name="category_id[]" multiple aria-label="multiple select example">
                                            <?php foreach ($categories as $ctg) : ?>
                                                <option value="<?php echo $ctg->id ?>"><?php echo $ctg->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control summernote" name="content" id="summernote" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
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
        button.href = "<?= base_url('CWork/fungsiDelete/') ?>" + id;
        console.log(button);
        myModal.toggle();
    }
</script>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('.summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>

<!-- DataTables -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
<!-- <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> -->

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            colReorder: true,
            stateSave: true,
            rowReorder: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= site_url('CWork/dataTable') ?>",
                type: "POST"
            },

            columns: [{
                    data: 'no'
                },

                {
                    data: 'title'
                },

                {
                    data: 'year'
                },

                {
                    data: 'content'
                },

                {
                    data: 'featured_image'
                },

                {
                    data: 'created_at'
                },

                {
                    data: 'created_by'
                },

                {
                    data: 'updated_at'
                },

                {
                    data: 'updated_by'
                },
            ],

            // rowReorder: {
            //     selector: 'tr'
            // },
            // columnDefs: [{
            //     targets: 0,
            //     visible: false
            // }]
        });
    });
</script>

<!-- Select2 -->
<!-- single -->
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<!-- multiple -->
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            closeOnSelect: false
        });
    });
</script>