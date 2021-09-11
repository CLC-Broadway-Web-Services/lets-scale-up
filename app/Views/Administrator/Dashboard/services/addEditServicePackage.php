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
                                    <?php if ($packageData['package_id'] == 0) {
                                        echo 'Add Package';
                                    } else {
                                        echo 'Edit Package';
                                    } ?>
                                </h5>
                            </div>
                            <form action="" method="POST" class="col-12" enctype="multipart/form-data" id="packageAddEditForm">
                                <div class="row g-4">
                                    <?php if (isset($errorMessage)) : ?>
                                        <div class="alert alert-icon alert-danger" role="alert">
                                            <em class="icon ni ni-alert-circle"></em>
                                            <strong>Failed.</strong> <?= $errorMessage ?>
                                        </div>
                                    <?php endif ?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Services</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" name="service_id" required>
                                                    <option <?php if ($packageData['service_id'] == 0) echo 'selected' ?> disabled value="">Select Service</option>
                                                    <?php foreach ($allServices as $service) : ?>
                                                        <option <?php if ($service['service_id'] == $packageData['service_id']) echo 'selected' ?> value="<?= $service['service_id'] ?>"><?= $service['service_title'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="package_name">Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Title or Heading of the Package" value="<?= $packageData['package_name'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4>Package Pricing scheme</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Total Price</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-inr"></em>
                                                </div>
                                                <input type="number" class="form-control pricingInput" min="0.00" step="0.01" id="package_price" name="package_price" value="<?= $packageData['package_price'] ?>" placeholder="ex: 1500" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Govt Fee</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-inr"></em>
                                                </div>
                                                <input type="number" class="form-control pricingInput" min="0.00" step="0.01" id="package_gov_fee" name="package_gov_fee" value="<?= $packageData['package_gov_fee'] ?>" placeholder="ex: 1500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Shipping Charges</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-inr"></em>
                                                </div>
                                                <input type="number" class="form-control pricingInput" min="0.00" step="0.01" id="package_shipping" name="package_shipping" value="<?= $packageData['package_shipping'] ?>" placeholder="ex: 50">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Discount Amount</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-inr"></em>
                                                </div>
                                                <input type="number" class="form-control pricingInput" min="0.00" step="0.01" id="package_discount" name="package_discount" value="<?= $packageData['package_discount'] ?>" placeholder="ex: 1500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">GST (18% auto calculated)</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-inr"></em>
                                                </div>
                                                <input type="number" class="form-control" id="package_gst" name="package_gst" value="<?= $packageData['package_gst'] ?>" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Base Price (auto calculated)</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-inr"></em>
                                                </div>
                                                <input type="number" class="form-control" id="package_basic_price" name="package_basic_price" value="<?= $packageData['package_basic_price'] ?>" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4>Package other details</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" name="package_status" required>
                                                    <option <?php if ($packageData['package_status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                    <option <?php if ($packageData['package_status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Special ?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" name="package_isSpecial" required>
                                                    <option <?php if ($packageData['package_isSpecial'] == 1) echo 'selected' ?> value="1">Yes</option>
                                                    <option <?php if ($packageData['package_isSpecial'] == 0) echo 'selected' ?> value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="encoded_package_details" hidden><?= json_encode($packageData['package_details']) ?></div>
                                    <input type="number" class="form-control" id="package_details_count" name="package_details_count" value="<?= $packageData['package_details_count'] ?>" hidden required>
                                    <script id="template_package_details" type="text/html">
                                        <div class="form-control-wrap package_detail_input_wrapper mt-2">
                                            <div class="form-icon form-icon-right btn btn-icon btn-sm btn-danger delete_this">
                                                <em class="icon ni ni-trash"></em>
                                            </div>
                                            <input type="text" class="form-control package_details" id="package_details_{0}" name="package_details[]" required>
                                        </div>
                                    </script>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="package_details">Details (list of points)</label>
                                            <div class="form-control-wrap package_detail_input_wrapper" id="package_detail_input_wrapper">
                                                <div class="form-icon form-icon-right btn btn-icon btn-sm btn-success add_more">
                                                    <em class="icon ni ni-plus"></em>
                                                </div>
                                                <input type="text" class="form-control package_details" id="package_details_0" name="package_details[]" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="number" hidden id="package_isSpecial" name="package_isSpecial" value="<?= $packageData['package_isSpecial'] ?>">
                                    <div class="col-12" id="addPackageButtonDiv">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <?php if ($packageData['service_id'] == 0) {
                                                    echo 'Add Package';
                                                } else {
                                                    echo 'Update Package';
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
    .package_detail_input_wrapper .form-icon .icon {
        color: #3d3d3d !important;
    }
</style>

<!-- Page Container END -->
<?= $this->endSection() ?>