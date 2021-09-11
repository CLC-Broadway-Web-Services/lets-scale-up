<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>

<?php if ($user) { ?>
    <input id="user_id" value="<?= $user['id'] ?>" hidden>
<?php } else { ?>
    <input id="user_id" value="0" hidden>
<?php } ?>

<!-- PACKAGES -->
<section class="home-section">
    <form class="container" method="post" id="serviceCheckoutForm">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h3 class="title-heading mt-4"><?= $service['service_title'] ?> - <?= $package['package_name'] ?></h3>
                </div>
            </div>

            <!-- <div class="col-lg-12 card mt-3">
                <div class="row card-body">
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
                </div>
            </div> -->

            <?php if (count($forms) > 0) { ?>
                <?php foreach ($forms as $key => $form) { ?>
                    <?php if (count($form['form_fields']) > 0) { ?>
                        <div class="col-lg-12 card mt-3 p-0">
                            <div class="card-header">
                                <h6 class="title-sub-title mb-0 text-primary d-inline"><?= $form['form_heading'] ?></h6>
                            </div>
                            <p hidden style="display:none" class="initial_count" id="more_fields_<?= $form['form_id'] ?>_count"><?= $form['form_inital_number'] ?></p>
                            <div class="card-body">
                                <div class="more_fields_<?= $form['form_id'] ?>_wrapper">
                                    <div class="row max_row_change">
                                        <?php foreach ($form['form_fields'] as $inputs) { ?>
                                            <div class="col-md-4 col-sm-6">
                                                <?php if ($inputs->input_type === "text") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="text" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" placeholder="<?= $inputs->label; ?>" maxlength="<?= $inputs->maxlength; ?>" minlength="<?= $inputs->minlength; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "email") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="email" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "number") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="number" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" maxlength="<?= $inputs->maxlength; ?>" minlength="<?= $inputs->minlength; ?>" max="<?= $inputs->max; ?>" min="<?= $inputs->min; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "tel") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="tel" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "date") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="date" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" value="" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "checkbox") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input type="checkbox" class="form-check-input" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" value="" onchange="saveFieldData(this)">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "file") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <input style="padding: 17px 5px 0 0;" class="form-control-file" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" type="file" required="<?= $inputs->required; ?>">
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "select") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <select class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                            <option disabled selected>Select</option>
                                                            <?php foreach ($inputs->options as $option) { ?>
                                                                <option value="<?= $option; ?>"><?= $option; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "selectstate" || $inputs->input_type === "selectcity") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <select class="form-control <?= $inputs->input_type; ?>" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)">
                                                            <option disabled selected>Select</option>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($inputs->input_type === "textarea") { ?>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label"><?= $inputs->label; ?></label>
                                                        <textarea rows="1" style="height: 40px" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>" id="<?= $inputs->field_name; ?>" type="file" required="<?= $inputs->required; ?>" onchange="saveFieldData(this)"></textarea>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php if ($form['form_is_multiple']) { ?>
                                <div class="card-footer">
                                    <script id="more_fields_<?= $form['form_id'] ?>_template" hidden style="display:none;" type="text/html">
                                        <div class="more_fields_<?= $form['form_id'] ?>_wrapper">
                                            <hr>
                                            <div class="row max_row_change">
                                                <?php foreach ($form['form_fields'] as $inputs) { ?>
                                                    <div class="col-md-4 col-sm-6">
                                                        <?php if ($inputs->input_type === "text") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input type="text" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" placeholder="<?= $inputs->label; ?>" maxlength="<?= $inputs->maxlength; ?>" minlength="<?= $inputs->minlength; ?>" onchange="saveFieldData(this)">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "email") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input type="email" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" onchange="saveFieldData(this)">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "number") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input type="number" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" maxlength="<?= $inputs->maxlength; ?>" minlength="<?= $inputs->minlength; ?>" max="<?= $inputs->max; ?>" min="<?= $inputs->min; ?>" onchange="saveFieldData(this)">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "tel") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input type="tel" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" onchange="saveFieldData(this)">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "date") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input type="date" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" value="" onchange="saveFieldData(this)">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "checkbox") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input type="checkbox" class="form-check-input" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" value="" onchange="saveFieldData(this)">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "file") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <input style="padding: 17px 5px 0 0;" class="form-control-file" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" type="file">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "select") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <select class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" onchange="saveFieldData(this)">
                                                                    <option disabled selected>Select</option>
                                                                    <?php foreach ($inputs->options as $option) { ?>
                                                                        <option value="<?= $option; ?>"><?= $option; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "selectstate" || $inputs->input_type === "selectcity") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <select class="form-control <?= $inputs->input_type; ?>" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" onchange="saveFieldData(this)">
                                                                    <option disabled selected>Select</option>
                                                                </select>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($inputs->input_type === "textarea") { ?>
                                                            <div class="form-group mt-3">
                                                                <label class="form-label"><?= $inputs->label; ?></label>
                                                                <textarea rows="1" style="height: 40px" class="form-control" name="<?= $form['form_id']; ?>__<?= $inputs->field_name; ?>_{0}" id="<?= $inputs->field_name; ?>_{0}" required="<?= $inputs->required ?>" type="file" onchange="saveFieldData(this)"></textarea>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                <button type="button" class="btn btn-sm btn-danger delete_more_form_fields"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </script>
                                    <div class="row justify-content-end">
                                        <div class="col text-end">
                                            <button type="button" id="more_fields_<?= $form['form_id'] ?>" class="btn btn-sm btn-success add_more_form_fields"><i class="bi bi-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <div class="col-12 mt-3">
                <?php if ($user) { ?>
                    <button class="submitBnt btn btn-primary btn-round" type="submit">Submit</button>
                <?php } else { ?>
                    <button class="submitBnt btn btn-primary btn-round" type="button" onclick="openLogin()">Login / Signup to continue</button>
                <?php } ?>
            </div>
        </div>
    </form>
</section>
<!-- PACKAGES -->

<style>
    .max_row_change {
        margin-right: 30px;
        position: relative;
    }

    .delete_more_form_fields {
        position: absolute;
        right: -30px;
        width: auto;
        bottom: 0;
    }
</style>


<?= $this->endSection() ?>