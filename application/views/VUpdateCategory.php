<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                </div>
                <div class="card-body px-0 pt-0 pb-2">

                    <h3>Update Data Barang</h3>

                    <?php foreach ($categories as $ctg) : ?>

                        <form action="<?php echo base_url('CCategory/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $ctg->name ?>">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $ctg->id ?>">
                            </div>

                            <button type="submit" class="btn btn-primary btn sm mb-1">Simpan</button>
                        </form>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>