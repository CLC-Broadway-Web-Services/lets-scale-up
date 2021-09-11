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
                                    <?php if ($clientData['id'] == 0) {
                                        echo 'Add Client';
                                    } else {
                                        echo 'Edit Client';
                                    } ?>
                                </h5>
                            </div>
                            <form id="clientForm" name="clientForm" action="" method="POST" enctype="multipart/form-data" id="faqAddEditForm" class="form-validate is-alter" onsubmit="return validateForm()">
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
                                                    <label class="form-label" for="name">Client Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="name" name="name" value="<?= $clientData['name'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="summary">Client Summary</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="summary" name="summary" value="<?= $clientData['summary'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Client Tags</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags" value="<?= $clientData['tags'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Client Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="category" data-placeholder="Select Category" required>
                                                            <option selected disabled>Select Category</option>
                                                            <?php foreach ($categories as $category) : ?>
                                                                <option <?php if ($clientData['category'] == $category['id']) echo 'selected' ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Client Status</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="status" required>
                                                            <option <?php if ($clientData['status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                            <option <?php if ($clientData['status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Client Home Visual</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="home_view" required>
                                                            <option <?php if ($clientData['home_view'] == 1) echo 'selected' ?> value="1">Show on Home</option>
                                                            <option <?php if ($clientData['home_view'] == 0) echo 'selected' ?> value="0">Not Shown</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Client Image</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <?php if (!empty($clientData['image'])) : ?>
                                                        <input type="file" multiple class="custom-file-input" id="customFile" name="image" onchange="previewServiceImage(this)">
                                                    <?php else : ?>
                                                        <input type="file" multiple class="custom-file-input" id="customFile" name="image" onchange="previewServiceImage(this)" required>
                                                    <?php endif; ?>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="serviceImageBlock">
                                            <?php if (!empty($clientData['image'])) : ?>
                                                <img src="<?= $clientData['image'] ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Client Page Data</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" rows="8" id="description" name="description"><?= $clientData['description'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <?php if ($clientData['id'] == 0) {
                                                    echo 'Add Client';
                                                } else {
                                                    echo 'Update Client';
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
    #category-error {
        position: absolute;
        left: 0;
        color: #fff;
        font-size: 11px;
        line-height: 1;
        bottom: calc(100% + 4px);
        background: #ed756b;
        padding: .3rem .5rem;
        z-index: 1;
        border-radius: 3px;
        white-space: nowrap;
        font-style: italic;
        left: auto;
        right: 0;
    }

    .customInvalid::before,
    #customFile-error::before,
    #category-error::before {
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