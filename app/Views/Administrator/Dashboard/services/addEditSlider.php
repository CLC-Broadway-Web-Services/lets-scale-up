<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title d-inline">Slide</h4>
                    <?php if ($slider['id'] !== 0) { ?>
                        <a type="button" href="<?= route_to('admin_press_release_index') ?>" class="btn btn-sm btn-primary float-right">
                            Add New
                        </a>
                    <?php } ?>
                    <?php if (isset($sessionData['serviceStatusMessage'])) : ?>
                        <div class="alert alert-icon alert-danger" role="alert">
                            <em class="icon ni ni-alert-circle"></em>
                            <strong>Failed.</strong> <?= $sessionData['serviceStatusMessage'] ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="card card-bordered card-full">
                <div class="nk-wg1">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">
                                <?php if ($slider['id'] == 0) {
                                    echo 'Add Slide';
                                } else {
                                    echo 'Edit Slide';
                                } ?>
                            </h5>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data" id="faqAddEditForm">
                            <div class="row g-4">
                                <?php if (isset($errorMessage)) : ?>
                                    <div class="alert alert-icon alert-danger" role="alert">
                                        <em class="icon ni ni-alert-circle"></em>
                                        <strong>Failed.</strong> <?= $errorMessage ?>
                                    </div>
                                <?php endif ?>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" maxlength="100" class="form-control" id="title" name="title" value="<?= $slider['title'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="category_id">Category</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="category_id" name="category_id" placeholder="Select" required>
                                                <option selected value="">Select</option>
                                                <?php foreach ($categories as $key => $cat) : ?>
                                                    <option <?php if ($slider['category_id'] == $cat['id']) echo 'selected' ?> value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="status" name="status" required>
                                                <option <?php if ($slider['status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                <option <?php if ($slider['status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="content">Content</label>
                                        <div class="form-control-wrap">
                                            <input type="text" maxlength="250" class="form-control" id="content" name="content" value="<?= $slider['content'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Image</label>
                                        <div id="serviceImageBlock">
                                            <?php if (!empty($slider['image'])) : ?>
                                                <img src="<?= $slider['image'] ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <?php if (!empty($slider['image'])) : ?>
                                                    <input type="file" multiple class="custom-file-input" id="customFile" name="image" onchange="previewServiceImage(this)">
                                                <?php else : ?>
                                                    <input type="file" multiple class="custom-file-input" id="customFile" name="image" onchange="previewServiceImage(this)" required>
                                                <?php endif; ?>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            <?php if ($slider['id'] == 0) {
                                                echo 'Add Slide';
                                            } else {
                                                echo 'Update Slide';
                                            } ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Page Container END -->
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>

<script>
    var serviceImageBlock = $('#serviceImageBlock');

    function previewServiceImage(event) {
        var currentFile = event.files[0];
        console.log(currentFile)
        var imageData = URL.createObjectURL(currentFile);
        var imageSrc = '<img src="' + imageData + '">';
        serviceImageBlock.html(imageSrc);
    }
</script>
<?= $this->endSection() ?>