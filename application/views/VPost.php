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
                        <?php echo $this->session->flashdata('content'); ?>
                        <table id="table" class="table table-hover table-striped table-bordered align-items-center text-center">
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Featured Image</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Updated At</th>
                                    <th>Updated By</th>
                                    <th>Aksi</th>
                                    <!-- <th colspan="2">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                $no = 1;
                                foreach ($posts as $pst) :
                                ?> 
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $pst->title ?></td>
                                        <td><?php echo $pst->content ?></td>
                                        <td><?php echo '<center><img src="' . base_url('./uploads/' . $pst->featured_image) . '" border="0" width="70px" height="70px"> </center>'; ?></td>
                                        <td><?php echo $pst->created_at ?></td>
                                        <td><?php echo $pst->created_by ?></td>
                                        <td><?php echo $pst->updated_at ?></td>
                                        <td><?php echo $pst->updated_by ?></td>
                                        <td>
                                            <?php echo anchor(
                                                'CPost/halamanUpdate/' . $pst->id,
                                                '<div class="btn btn-warning"><i class="fa fa-edit"></i></div>'
                                            ) ?>
                                        </td>
                                        <td>
                                            <buttton class="btn btn-danger" data-id-category="<?= $pst->id ?>" onclick="deleteConfirm('<?= $pst->id ?>')">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('CPost/fungsiTambah') ?>" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                
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

                                
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control summernote" name="content" id="summernote" cols="30" rows="10" required></textarea>
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
        button.href = "<?= base_url('CPost/fungsiDelete/') ?>" + id;
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

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            colReorder: true,
            stateSave:  true,
            rowReorder: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= site_url('CPost/dataTable') ?>",
                type: "POST"
            },

            columns: [{
                    data: 'no'
                },
                {
                    data: 'title'
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
            
            "columnDefs": [
                {
                    "targets": 3,
                    "render": function(data, type, row, meta) {
                        return '<center><img src="<?= base_url('./uploads/') ?>' + row.featured_image + '" border="0" width="70px" height="70px"></center>';
                    }
                },

                {
                    "targets": 8,
                    "render": function(data, type, row, meta) {
                        return '<a class="btn btn-warning me-3" href="<?= base_url('CPost/halamanUpdate/') ?>' + row.id + '"><i class="fa fa-edit"></i></a>' +
                                '<buttton class="btn btn-danger" data-id-category="' + row.id + '" onclick="deleteConfirm(' + row.id + ')"><i class="fa fa-trash"></i></button>';
                            }
                }
            ],

            // rowReorder: {
            //     selector: 'tr'
            // },
        });
    });
</script>