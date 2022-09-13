<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <h4 class="ms-3">Update Data Post</h4>
                    <?php foreach ($posts as $pst) : ?>
                        <form action="<?php echo base_url('CPost/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ms-3 me-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $pst->title ?>">
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $pst->id ?>">
                                    </div>

                                    <div class="form-group ms-3 me-3">
                                        <label>Content</label>
                                        <input type="text" name="content" class="form-control" value="<?php echo $pst->content ?>">
                                    </div>
                                    
                                    <?php echo anchor('operator/CKegiatanCRUD/', '<div class="btn btn-danger mb-1 ms-3 me-3">Kembali</div>') ?>
                                    <button type="submit" class="btn btn-primary mb-1 me-3">Simpan</button>
                                </div>

                                <div class="col-md-6">
                                    <img src="<?php echo base_url('./uploads/') . $pst->featured_image ?>" border="0" width="100px" height="100px" />

                                    <div class="form-group ms-3 me-3">
                                        <label>Featured Image</label>
                                        <input type="file" name="featured_image" class="form-control">
                                        <input type="hidden" name="featured_image" class="form-control" value="<?php echo $pst->featured_image ?>">
                                    </div>
                                </div>
                            </div>
                </div>
                </form>
            <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>