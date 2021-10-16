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
                                    <?php if ($memberData['member_id'] == 0) {
                                        echo 'Add Member';
                                    } else {
                                        echo 'Edit Member';
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

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_name">Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="member_name" name="member_name" value="<?= $memberData['member_name'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_email">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="member_email" name="member_email" value="<?= $memberData['member_email'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_mobile">Mobile</label>
                                            <div class="form-control-wrap">
                                                <input type="tel" class="form-control" id="member_mobile" name="member_mobile" value="<?= $memberData['member_mobile'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_about">About</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="member_about" name="member_about" value="<?= $memberData['member_about'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_position">Position</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="member_position" name="member_position" value="<?= $memberData['member_position'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_linkedin">Linkedin</label>
                                            <div class="form-control-wrap">
                                                <input type="url" class="form-control" id="member_linkedin" name="member_linkedin" value="<?= $memberData['member_linkedin'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_twitter">Twitter</label>
                                            <div class="form-control-wrap">
                                                <input type="url" class="form-control" id="member_twitter" name="member_twitter" value="<?= $memberData['member_twitter'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 pt-2">
                                        <div class="form-group">
                                            <label class="form-label" for="member_facebook">Facebook</label>
                                            <div class="form-control-wrap">
                                                <input type="url" class="form-control" id="member_facebook" name="member_facebook" value="<?= $memberData['member_facebook'] ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="member_status" required>
                                                            <option <?php if ($memberData['member_status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                            <option <?php if ($memberData['member_status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div id="serviceImageBlock">
                                            <?php if (!empty($memberData['member_image'])) : ?>
                                                <img src="<?= $memberData['member_image'] ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Image</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <?php if (!empty($memberData['member_image'])) : ?>
                                                        <input type="file" multiple class="custom-file-input" id="customFile" name="member_image" onchange="previewServiceImage(this)">
                                                    <?php else : ?>
                                                        <input type="file" multiple class="custom-file-input" id="customFile" name="member_image" onchange="previewServiceImage(this)" required>
                                                    <?php endif; ?>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <?php if ($memberData['member_id'] == 0) {
                                                    echo 'Add Member';
                                                } else {
                                                    echo 'Update Member';
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
    #post_category-error {
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
    #post_category-error::before {
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