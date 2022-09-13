<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                </div>
                <div class="card-body px-0 pt-0 pb-2">

                    <h4 class="ms-3">Update Data Category</h4>
                    <?php echo $this->session->flashdata('message'); ?>

                    <?php foreach ($categories as $ctg) : ?>

                        <form action="<?php echo base_url('CCategory/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group ms-3 me-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $ctg->name ?>" required>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $ctg->id ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary ms-3">Simpan</button>
                        </form>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>