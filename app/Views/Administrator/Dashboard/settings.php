<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>


<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Settings</h3>
            <!-- <div class="nk-block-des">
                <p>You have full control to manage your own account setting.</p>
            </div> -->
        </div>
    </div>
    <div class="nk-block">
        <div class="card card-bordered">
            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link <?= !$activeTab ? 'active' : ($tabName == 'general' ? 'active' : '') ?>" data-toggle="tab" href="#general"><em class="icon ni ni-setting-fill"></em><span>General</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activeTab && $tabName == 'footer' ? 'active' : '' ?>" data-toggle="tab" href="#footer"><em class="icon ni ni-activity-round-fill"></em><span>Footer</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activeTab && $tabName == 'profile' ? 'active' : '' ?>" data-toggle="tab" href="#profile"><em class="icon ni ni-user-fill-c"></em><span>Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activeTab && $tabName == 'password' ? 'active' : '' ?>" data-toggle="tab" href="#password"><em class="icon ni ni-security"></em><span>Change Password</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activeTab && $tabName == 'smtp' ? 'active' : '' ?>" data-toggle="tab" href="#smtp"><em class="icon ni ni-lock-alt-fill"></em><span>SMTP</span></a>
                </li>
            </ul>
            <!-- <form class="card-inner card-inner-lg tab-content" id="settingsForm" action="" method="post" enctype="multipart/form-data"> -->
            <div class="card-inner card-inner-lg tab-content">
                <form class="tab-pane <?= !$activeTab ? 'active' : ($tabName == 'general' ? 'active' : '') ?>" id="general" action="" method="post" enctype="multipart/form-data">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Site General Settings</h4>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                            <div class="data-head mb-3">
                                <h6 class="overline-title">Site settings</h6>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site_name">Site Name</label>
                                        <span class="form-note">Specify the name of your website.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="site_name" id="site_name" value="<?= $settings['site_name'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site_url">Site Url</label>
                                        <span class="form-note">Specify the url of your website.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="site_url" id="site_url" value="<?= $settings['site_url'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site_email">Site Email</label>
                                        <span class="form-note">Specify the email address of your website, where you recieve notifications.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control" id="site_email" name="site_email" value="<?= $settings['site_email'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <form class="tab-pane <?= $activeTab && $tabName == 'footer' ? 'active' : '' ?>" id="footer" action="" method="post" enctype="multipart/form-data">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Site Footer Settings</h4>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                            <div class="data-head mb-3">
                                <h6 class="overline-title">Footer general settings</h6>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_email">Email</label>
                                        <span class="form-note">Specify the email to be shown on the footer.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control" name="footer_email" id="footer_email" value="<?= $settings['footer_email'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_toll_free">Toll free</label>
                                        <span class="form-note">Specify the toll free number shown on the footer bar.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="tel" class="form-control" name="footer_toll_free" id="footer_toll_free" value="<?= $settings['footer_toll_free'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_customer_care">Customer care number</label>
                                        <span class="form-note">Specify the customer care number shown on the footer bar.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="tel" class="form-control" name="footer_customer_care" id="footer_customer_care" value="<?= $settings['footer_customer_care'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_copyright_year">Copyright year</label>
                                        <span class="form-note">Copyright year starting from.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" min="2000" max="<?= date('Y') ?>" minlength="4" maxlength="4" class="form-control" name="footer_copyright_year" id="footer_copyright_year" value="<?= $settings['footer_copyright_year'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_copyright">Copyright text</label>
                                        <span class="form-note">Write some copyright text you want shown on the website bottom.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="footer_copyright" id="footer_copyright" value="<?= $settings['footer_copyright'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- call to action block settings -->
                        <div class="nk-data data-list data-list-s2">
                            <div class="data-head mb-3">
                                <h6 class="overline-title">Footer CTA settings</h6>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_more_questions_block_enable">CTA enabled ?</label>
                                        <span class="form-note">Please specify all below fields before enable the CTA BLOCK.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-select" name="footer_more_questions_block_enable" id="footer_more_questions_block_enable">
                                                <option <?= !$settings['footer_more_questions_block_enable'] ? 'selected' : '' ?> value="0">No</option>
                                                <option <?= $settings['footer_more_questions_block_enable'] ? 'selected' : '' ?> value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_more_questions_block_email">CTA email</label>
                                        <span class="form-note">Email address to be shown on the CTA block if the block is enabled.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control" name="footer_more_questions_block_email" id="footer_more_questions_block_email" value="<?= $settings['footer_more_questions_block_email'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_more_questions_block_phone">CTA Contact</label>
                                        <span class="form-note">Contact numner to be shown on the CTA block if the block is enabled.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="tel" class="form-control" name="footer_more_questions_block_phone" id="footer_more_questions_block_phone" value="<?= $settings['footer_more_questions_block_phone'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- footer social settings -->
                        <div class="nk-data data-list data-list-s2">
                            <div class="data-head mb-3">
                                <h6 class="overline-title">Footer social media icons</h6>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_social_linkedin">Linkedin</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="footer_social_linkedin" id="footer_social_linkedin" value="<?= $settings['footer_social_linkedin'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_social_facebook">Facebook</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="footer_social_facebook" id="footer_social_facebook" value="<?= $settings['footer_social_facebook'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_social_twitter">Twitter</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="footer_social_twitter" id="footer_social_twitter" value="<?= $settings['footer_social_twitter'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_social_instagram">Instagram</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="footer_social_instagram" id="footer_social_instagram" value="<?= $settings['footer_social_instagram'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="footer_social_youtube">Youtube</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="footer_social_youtube" id="footer_social_youtube" value="<?= $settings['footer_social_youtube'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <form class="tab-pane <?= $activeTab && $tabName == 'profile' ? 'active' : '' ?>" id="profile" action="<?= route_to('admin_profile_update') ?>" method="post" enctype="multipart/form-data">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Your Profile</h4>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site_name">Site Name</label>
                                        <span class="form-note">Specify the name of your website.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="site_name" id="site_name" value="<?= $settings['site_name'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center" hidden>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site_url">Site Url</label>
                                        <span class="form-note">Specify the url of your website.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="url" class="form-control" name="site_url" id="site_url" value="<?= $settings['site_url'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site_email">Site Email</label>
                                        <span class="form-note">Specify the email address of your website, where you recieve notifications.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control" id="site_email" value="<?= $settings['site_email'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="button" onclick="updateProfile()" class="btn btn-primary">Update profile</button>
                    </div>
                </form>
                <form class="tab-pane <?= $activeTab && $tabName == 'password' ? 'active' : '' ?>" id="password" action="<?= route_to('admin_password_update') ?>" method="post" enctype="multipart/form-data">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Change Password</h4>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="old_password">Old password</label>
                                        <span class="form-note">Specify your old password.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="old_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="new_password">New password</label>
                                        <span class="form-note">Specify your new password.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="new_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="confirm_password">Confirm password</label>
                                        <span class="form-note">Confirm your new password.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="confirm_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="button" onclick="changePassword()" class="btn btn-primary">Update profile</button>
                    </div>
                </form>
                <form class="tab-pane <?= $activeTab && $tabName == 'smtp' ? 'active' : '' ?>" id="smtp" action="" method="post" enctype="multipart/form-data">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">SMTP settings</h4>
                            <div class="nk-block-des">
                                <p>Only enable if need to use any third party email service e.g:- gmail OR sendgrid</p>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="smtp_enabled">ENABLED ?</label>
                                        <span class="form-note">Please specify all below fields before enable the SMTP.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-select" name="smtp_enabled" id="smtp_enabled">
                                                <option <?= !$settings['smtp_enabled'] ? 'selected' : '' ?> value="0">No</option>
                                                <option <?= $settings['smtp_enabled'] ? 'selected' : '' ?> value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="smtp_host">HOST</label>
                                        <span class="form-note">Specify the url OR the IP of your SMTP service.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="smtp_host" id="smtp_host" value="<?= $settings['smtp_host'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="smtp_user">Username</label>
                                        <span class="form-note">Specify the username of your SMTP service.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="smtp_user" id="smtp_user" value="<?= $settings['smtp_user'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="smtp_pass">Password</label>
                                        <span class="form-note">Specify your SMTP password.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="password" class="form-control" name="smtp_pass" id="smtp_pass" value="<?= $settings['smtp_pass'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="smtp_port">PORT</label>
                                        <span class="form-note">Your smtp PORT e.g: 25/465.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="number" maxlength="3" minlength="2" class="form-control" name="smtp_port" id="smtp_port" value="<?= $settings['smtp_port'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="smtp_ssl">SSL Enabled</label>
                                        <span class="form-note">Choose if SSL/TLS enabled or not.</span>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="smtp_ssl" id="smtp_ssl" value="<?= $settings['smtp_ssl'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>