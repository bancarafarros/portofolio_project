<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <h4 class="ms-3">Update Data Social Media</h4>
                    <?php foreach ($social_medias as $scm) : ?>
                        <form action="<?php echo base_url('cv/CSocialMedia/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group ms-3 me-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $scm->name ?>" required>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $scm->id ?>" required>
                            </div>

                            <div class="form-group ms-3 me-3">
                                <label>URL</label>
                                <input type="text" name="url" class="form-control" value="<?php echo $scm->url ?>" required>
                            </div>

                            <div class="form-group ms-3 me-3">
                                <label>Icon</label>
                                <img class="img-fluid ms-3 me-3" src="<?php echo base_url('./assets/img/icons/') . $scm->icon ?>" border="0" width="100px" height="100px" />
                                <input type="file" name="icon" class="form-control" required>
                                <input type="hidden" name="icon" class="form-control" value="<?php echo $scm->icon ?>">
                            </div>

                            <?php echo anchor('cv/CSocialMedia', '<div class="btn btn-danger ms-3">Kembali</div>') ?>
                            <button type="submit" class="btn btn-primary ms-3">Simpan</button>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>