<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div hidden style="display:none;">
    <div id="allParentCategories" hidden><?= json_encode($categories) ?></div>
    <div id="allChildCategories" hidden><?= json_encode($childCategories) ?></div>
</div>

<div class="nk-content-wrap">
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12">
                <div class="card card-bordered card-full">
                    <div class="nk-wg1">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">
                                    <?php if ($serviceData['service_id'] == 0) {
                                        echo 'Add Service';
                                    } else {
                                        echo 'Edit Service';
                                    } ?>
                                </h5>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data" id="serviceAddEditForm">
                                <div class="row g-4">
                                    <?php if (isset($errorMessage)) : ?>
                                        <div class="alert alert-icon alert-danger" role="alert">
                                            <em class="icon ni ni-alert-circle"></em>
                                            <strong>Failed.</strong> <?= $errorMessage ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Main Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="service_cat_parent" required id="parentCategory">
                                                            <option value="0">Select Category</option>
                                                            <?php foreach ($categories as $cat) : ?>
                                                                <option value="<?= $cat['id'] ?>" <?php if ($serviceData['service_cat_parent'] == $cat['id']) echo 'selected' ?>><?= $cat['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="childCategoryBlock" <?php if ($serviceData['service_cat'] == '0') echo 'style="display:none;"' ?>>
                                                <div class="form-group">
                                                    <label class="form-label">Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="service_cat" required id="childCategory">
                                                            <?php foreach ($childCategories as $cat) : ?>
                                                                <option <?php if ($serviceData['service_cat'] == $cat['id']) echo 'selected' ?> value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="service_title">Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="service_title" name="service_title" value="<?= $serviceData['service_title'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="service_benefit_subtitle">Benefits Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="service_benefit_subtitle" name="service_benefit_subtitle" value="<?= $serviceData['service_benefit_subtitle'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="service_documents_subtitle">Required Documents Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="service_documents_subtitle" name="service_documents_subtitle" value="<?= $serviceData['service_documents_subtitle'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="service_faq_subtitle">FAQ Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="service_faq_subtitle" name="service_faq_subtitle" value="<?= $serviceData['service_faq_subtitle'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="service_summary">Summary</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="service_summary" name="service_summary" value="<?= $serviceData['service_summary'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="service_overview_subtitle">Overview Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="service_overview_subtitle" name="service_overview_subtitle" value="<?= $serviceData['service_overview_subtitle'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="service_overview">Overview</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-outlined tinymce-basic" rows="8" id="service_overview" name="service_overview"><?= $serviceData['service_overview'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service Status</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="service_status" required>
                                                            <option <?php if ($serviceData['service_status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                            <option <?php if ($serviceData['service_status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Service Home Visibility</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="service_home_view" required>
                                                            <option <?php if ($serviceData['service_home_view'] == 1) echo 'selected' ?> value="1">Visible on home</option>
                                                            <option <?php if ($serviceData['service_home_view'] == 0) echo 'selected' ?> value="0">Not visible on home</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <?php if ($serviceData['service_id'] == 0) {
                                                    echo 'Add Service';
                                                } else {
                                                    echo 'Update Service';
                                                } ?>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div id="accordion" class="accordion">
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head" data-toggle="collapse" data-target="#accordion-item-2">
                                                            <h6 class="title">Choose Service Icon</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse show" id="accordion-item-2" data-parent="#accordion">
                                                            <div class="accordion-inner row">

                                                                <?php foreach ($icons as $key => $icon) : ?>
                                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="service_icon_<?= $key ?>" value="<?= $icon->icon ?>" <?php if ($serviceData['service_icon'] == $icon->icon) echo 'checked' ?> name="service_icon" class="custom-control-input" required>
                                                                                <label class="custom-control-label" for="service_icon_<?= $key ?>"><i class="bi bi-<?= $icon->icon ?> h4"></i> <small><?= $icon->icon ?></small></label>
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
                                                <?php if ($serviceData['service_id'] == 0) {
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