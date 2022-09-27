<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <h4 class="ms-3">Update Data Experience</h4>
                    <?php foreach ($experiences as $exp) : ?>
                        <form action="<?php echo base_url('cv/CExperience/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ms-3 me-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $exp->name ?>" required>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $exp->id ?>" required>
                                    </div>

                                    <div class="form-group ms-3 me-3">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="<?php echo $exp->start_date ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ms-3 me-3">
                                        <label>Resignated Date</label>
                                        <input type="date" name="resignated_date" class="form-control" value="<?php echo $exp->resignated_date ?>" required>
                                    </div>

                                    <div class="form-group ms-3 me-3">
                                        <label>Description</label>
                                        <input type="text" name="description" class="form-control" value="<?php echo $exp->description ?>" required>
                                    </div>

                                </div>
                            </div>

                            <?php echo anchor('cv/CExperience', '<div class="btn btn-danger ms-3">Kembali</div>') ?>
                            <button type="submit" class="btn btn-primary ms-3">Simpan</button>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>