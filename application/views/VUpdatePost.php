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
                                    <div class="form-group ms-3 me-3">
                                        <label>Featured Image</label>
                                        <img class="img-fluid ms-3 me-3" src="<?php echo base_url('./uploads/') . $pst->featured_image ?>" border="0" width="100px" height="100px" />
                                        <input type="file" name="featured_image" class="form-control">
                                        <input type="hidden" name="featured_image" class="form-control" value="<?php echo $pst->featured_image ?>">
                                    </div>
                                </div>

                                <div class="form-group ps-4 pe-4">
                                    <label>Content</label>
                                    <textarea class="form-control summernote ms-3 me-3" name="content" id="summernote" required><?php echo $pst->content ?></textarea>
                                </div>

                                <div class="col-md-6">
                                    <?php echo anchor('CPost', '<div class="btn btn-danger mb-1 ms-3 me-3">Kembali</div>') ?>
                                    <button type="submit" class="btn btn-primary mb-1 me-3">Simpan</button>
                                </div>
                            </div>
                </div>
                </form>
            <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

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