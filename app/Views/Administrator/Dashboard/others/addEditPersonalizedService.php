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
                                    <?php if ($thisData['id'] == 0) {
                                        echo 'Add Service';
                                    } else {
                                        echo 'Edit Service';
                                    } ?>
                                </h5>
                            </div>
                            <form id="memberForm" name="member_form" action="" method="POST" enctype="multipart/form-data" class="form-validate is-alter" onsubmit="return validateForm()">
                                <div class="row g-4">
                                    <?php if (isset($errorMessage)) : ?>
                                        <div class="alert alert-icon alert-danger" role="alert">
                                            <em class="icon ni ni-alert-circle"></em>
                                            <strong>Failed.</strong> <?= $errorMessage ?>
                                        </div>
                                    <?php endif ?>

                                    <div class="col-md-6 col-12">
                                        <div class="row g-3">
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="title">Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="title" name="title" value="<?= $thisData['title'] ?>" onkeyup="generateSlug(this, 'slug')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="slug">Slug</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $thisData['slug'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="sub_title">Sub Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?= $thisData['sub_title'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="color">Color</label>
                                                    <div class="form-control-wrap">
                                                        <input type="color" class="form-control" id="color" name="color" value="<?= $thisData['color'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Services</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select select2" name="services[]" multiple required>
                                                            <?php foreach ($services as $key => $service) : ?>
                                                                <option <?php if (isset($thisData['services']) && in_array($service['service_id'], $thisData['services'])) echo 'selected' ?> value="<?= $service['service_id'] ?>"><?= $service['service_title'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="status" required>
                                                            <option <?php if ($thisData['status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                            <option <?php if ($thisData['status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- image -->
                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Image</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <?php if (!empty($thisData['image'])) : ?>
                                                        <input type="file" multiple class="custom-file-input" id="image" name="image" onchange="imagePreview(this)">
                                                    <?php else : ?>
                                                        <input type="file" multiple class="custom-file-input" id="image" name="image" onchange="imagePreview(this)" required>
                                                    <?php endif; ?>
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="serviceImageBlock">
                                            <img src="<?= $thisData['image'] ? $thisData['image'] : PLACEHOLDER_JPG ?>" id="image_image" class="border">
                                        </div>
                                    </div>
                                    <!-- content -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="sub_content">Content</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control tinymce_extended" rows="8" id="sub_content" name="sub_content"><?= $thisData['sub_content'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- icons -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div id="accordion" class="accordion">
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head" data-toggle="collapse" data-target="#accordion-item-2">
                                                            <h6 class="title">Choose Service Icon</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-2" data-parent="#accordion">
                                                            <div class="accordion-inner row">

                                                                <?php foreach ($icons as $key => $icon) : ?>
                                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="icon_<?= $key ?>" value="<?= $icon->icon ?>" <?php if ($thisData['icon'] == $icon->icon) echo 'checked' ?> name="icon" class="custom-control-input" required>
                                                                                <label class="custom-control-label" for="icon_<?= $key ?>"><i class="bi bi-<?= $icon->icon ?> h4"></i> <small><?= $icon->icon ?></small></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <?php if ($thisData['id'] == 0) {
                                                    echo 'Add Service';
                                                } else {
                                                    echo 'Update Service';
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

<!-- Page Container END -->
<?= $this->endSection() ?>