<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                </div>
                <div class="card-body px-0 pt-0 pb-2">

                    <h4 class="ms-3">Work Preview</h4>

                    <?php foreach ($works as $wrk) : ?>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php echo base_url('/uploads/' . $wrk->featured_image) ?>" class="card-img-top">
                            </div>

                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td>Title</td>
                                        <td><strong><?php echo $wrk->title ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Year</td>
                                        <td><strong><?php echo $wrk->year ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Content</td>
                                        <td><strong><?php echo $wrk->content ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Created At</td>
                                        <td><strong><?php echo $wrk->created_at ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Created By</td>
                                        <td><strong><?php echo $wrk->created_by ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Updated At</td>
                                        <td><strong><?php echo $wrk->updated_at ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Updated By</td>
                                        <td><strong><?php echo $wrk->updated_by ?></strong></td>
                                    </tr>
                                </table>

                                <?php echo anchor('CWork/', '<div class="btn btn-primary">Kembali</div>') ?>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>