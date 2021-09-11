<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12">
                <div class="card card-bordered card-full">
                    <div class="nk-wg1">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">
                                    <?php if ($initiativeData['id'] == 0) {
                                        echo 'Add Initiative';
                                    } else {
                                        echo 'Edit Initiative';
                                    } ?>
                                </h5>
                            </div>
                            <form id="initiativeForm" name="initiativeForm" action="" method="POST" enctype="multipart/form-data" id="faqAddEditForm" class="form-validate is-alter" onsubmit="return validateForm()">
                                <div class="row g-4">
                                    <?php if (isset($errorMessage)) : ?>
                                        <div class="alert alert-icon alert-danger" role="alert">
                                            <em class="icon ni ni-alert-circle"></em>
                                            <strong>Failed.</strong> <?= $errorMessage ?>
                                        </div>
                                    <?php endif ?>

                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Initiative Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $initiativeData['name'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="summary">Initiative Summary</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="summary" name="summary" value="<?= $initiativeData['summary'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Initiative Tags</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags" value="<?= $initiativeData['tags'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Initiative Status</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="status" required>
                                                            <option <?php if ($initiativeData['status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                            <option <?php if ($initiativeData['status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Initiative Home Visual</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="home_view" required>
                                                            <option <?php if ($initiativeData['home_view'] == 1) echo 'selected' ?> value="1">Show on Home</option>
                                                            <option <?php if ($initiativeData['home_view'] == 0) echo 'selected' ?> value="0">Not Shown</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Initiative Content</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control tinymce-basic" rows="8" id="description" name="description"><?= $initiativeData['description'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="serviceImageBlock">
                                            <?php if (!empty($initiativeData['image'])) : ?>
                                                <img src="<?= $initiativeData['image'] ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Initiative Image</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <?php if (!empty($initiativeData['image'])) : ?>
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
                                                <?php if ($initiativeData['id'] == 0) {
                                                    echo 'Add Initiative';
                                                } else {
                                                    echo 'Update Initiative';
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

</div>

<style>
    .customInvalid,
    #customFile-error,

    .customInvalid::before,
    #customFile-error::before {
        border-bottom: 6px solid transparent;
        position: absolute;
        content: '';
        height: 0;
        width: 0;
        border-left: 6px solid #ed756b;
        border-right: 6px solid transparent;
        left: auto;
        right: 10px;
        border-right-color: #ed756b;
        border-left-color: transparent;
        bottom: -4px;
    }
</style>
<!-- Page Container END -->
<?= $this->endSection() ?>