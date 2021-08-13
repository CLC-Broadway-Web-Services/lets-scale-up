<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- PACKAGES -->
<section class="section mainAreaBackground">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h3 class="title-heading mt-4"><?= $service['service_title'] ?> - <?= $package['package_name'] ?></h3>
                </div>
            </div>

            <div class="col-lg-12 card">
                <form method="post" action="javascript:void(0);" class="row card-body" id="serviceCheckoutForm">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="contact-lable">First Name</label>
                            <input name="user_firstname" id="user_firstname" class="form-control" type="text" onchange="saveFieldData(this)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="contact-lable">Last Name</label>
                            <input name="user_lastname" id="user_lastname" class="form-control" type="text" onchange="saveFieldData(this)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="contact-lable">Email Address</label>
                            <input name="user_email" id="user_email" class="form-control" type="email" onchange="saveFieldData(this)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label class="contact-lable">Mobile Number</label>
                            <input name="user_mobile" id="user_mobile" class="form-control" type="tel" onchange="saveFieldData(this)">
                        </div>
                    </div>

                    <?php if (count($forms) > 0) { ?>
                        <?php foreach ($forms as $key => $form) { ?>
                            <?php if (count($form['form_fields']) > 0) { ?>
                                <div class="card-header col-12">
                                    <h6 class="title-sub-title mb-0 text-primary f-17"><?= $form['form_heading'] ?></h6>
                                </div>
                                <?php foreach ($form['form_fields'] as $inputs) { ?>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php if ($inputs->input_type == "text") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="text" class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" placeholder="<?= $inputs->label; ?>" maxlength="<?= $inputs->maxlength; ?>" minlength="<?= $inputs->minlength; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "email") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="email" class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "number") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="number" class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" maxlength="<?= $inputs->maxlength; ?>" minlength="<?= $inputs->minlength; ?>" max="<?= $inputs->max; ?>" min="<?= $inputs->min; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "tel") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="tel" class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "date") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="date" class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" value="" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "checkbox") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="checkbox" class="form-check-input" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" value="" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "file") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input style="padding: 17px 5px 0 0;" class="form-control-file" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" type="file" required="<?= $inputs->required; ?>">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "select") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <select class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                            <option disabled selected>Select</option>
                                                            <?php foreach ($inputs->options as $option) { ?>
                                                                <option value="<?= $option; ?>"><?= $option; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type == "textarea") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <textarea rows="5" class="form-control" name="<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" type="file" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)"></textarea>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <div class="col-12 mt-3">
                        <button class="submitBnt btn btn-primary btn-round" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
<!-- PACKAGES -->


<?= $this->endSection() ?>