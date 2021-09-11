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
                                    <?php if ($benefitData['id'] == 0) {
                                        echo 'Add Benefit Block';
                                    } else {
                                        echo 'Edit Benefit Block';
                                    } ?>
                                </h5>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data" id="benefitBlockAddEditForm">
                                <div class="row g-4">
                                    <?php if (isset($errorMessage)) : ?>
                                        <div class="alert alert-icon alert-danger" role="alert">
                                            <em class="icon ni ni-alert-circle"></em>
                                            <strong>Failed.</strong> <?= $errorMessage ?>
                                        </div>
                                    <?php endif ?>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Services</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" name="service_id" required>
                                                    <option <?php if ($benefitData['service_id'] == 0) echo 'selected' ?> disabled value="">Select Service</option>
                                                    <?php foreach ($allServices as $service) : ?>
                                                        <option <?php if ($service['service_id'] == $benefitData['service_id']) echo 'selected' ?> value="<?= $service['service_id'] ?>"><?= $service['service_title'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Benefit Block Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="title" name="title" value="<?= $benefitData['title'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="summary">Benefit Block Summary</label>
                                            <div class="form-control-wrap">
                                                <textarea type="text" rows="5" class="form-control" id="summary" name="summary" required><?= $benefitData['summary'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Block Status</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" name="status" required>
                                                    <option <?php if ($benefitData['status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                    <option <?php if ($benefitData['status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div id="accordion" class="accordion">
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2">
                                                            <h6 class="title">Choose Service Icon</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-2" data-parent="#accordion">
                                                            <div class="accordion-inner row">

                                                                <?php foreach ($icons as $icon) : ?>
                                                                    <div class="col-md-2 col-sm-3 col-lg-1">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="icon_<?= $icon ?>" <?php if ($benefitData['icon'] == $icon) echo 'checked' ?> value="<?= $icon ?>" name="icon" class="custom-control-input" required>
                                                                                <label class="custom-control-label" for="icon_<?= $icon ?>"><i class="mdi mdi-<?= $icon ?> h4"></i></label>
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
                                                <?php if ($benefitData['service_id'] == 0) {
                                                    echo 'Add Benefit Block';
                                                } else {
                                                    echo 'Update Benefit Block';
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