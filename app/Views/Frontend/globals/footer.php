<!--begin contact -->
<?php if (!isset($noFooterContact)) : $settings = getSettings();
    $pressReleases = getAllPressReleases(); ?>
    <section class="bg-warning py-4 newsletter-section">
        <div class="container">
            <div class="row align-items-center">
                <h5 class="text-dark">Subscribe to our weekly Newsletter and stay tuned.</h5>
            </div>
            <div class="row align-items-center" id="newsletter-form">
                <div class="col-12" id="newsletterResponseColumn" style="display:none;">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="newsletterResponseAlert">
                        <i class="bi bi-info-circle flex-shrink-0 me-2"></i>
                        <span id="newsletterResponseMessage"></span>
                        <button type="button" id="newsletterResponseClose" class="btn-close"></button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="newsletterFullName" placeholder="Your Full Name">
                        <label for="newsletterFullName">Full Name</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="newsletterEmail" placeholder="name@example.com">
                        <label for="newsletterEmail">Email address</label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="d-grid gap-2">
                        <button class="btn btn-lsu btn-lg" type="button" id="newsletterSubmit">Subscribe to newsletter</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-white medium-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>FEATURED ON</h4>
                    <h2>Media & Recognitions</h2>
                </div>
            </div>
            <div class="row press-release-row">
                <div class="splide" id="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($pressReleases as $press) : ?>
                                <div class="card press-release splide__slide">
                                    <a href="<?= $press['url'] ?>" target="_blank" title="<?= $press['name'] ?>"><img src="<?= $press['image'] ?>" alt="<?= $press['name'] ?>"></a>
                                </div>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-white pb-2 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <p class="contact-info">
                        <i class="bi bi-telephone-fill"></i> <a href="tel:<?= $settings['footer_customer_care'] ? $settings['footer_customer_care'] : PHONE_NUMBER ?>"><?= $settings['footer_customer_care'] ? $settings['footer_customer_care'] : PHONE_NUMBER ?></a>
                    </p>
                </div>
                <div class="col-md-4">
                    <p class="contact-info">
                        <i class="bi bi-envelope-open-fill"></i> <a href="mailto:<?= $settings['footer_email'] ? $settings['footer_email'] : INFO_MAIL ?>"><?= $settings['footer_email'] ? $settings['footer_email'] : INFO_MAIL ?></a>
                    </p>
                </div>
                <?php if (isSocialAvailable()) : ?>
                    <div class="col-md-4">
                        <ul class="footer_social">
                            <!-- <li>Follow us:</li> -->
                            <?php if ($settings['footer_social_facebook']) : ?>
                                <li><a href="<?= $settings['footer_social_facebook'] ?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a></li>
                            <?php endif;
                            if ($settings['footer_social_twitter']) : ?>
                                <li><a href="<?= $settings['footer_social_twitter'] ?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a></li>
                            <?php endif;
                            if ($settings['footer_social_instagram']) : ?>
                                <li><a href="<?= $settings['footer_social_instagram'] ?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a></li>
                            <?php endif;
                            if ($settings['footer_social_linkedin']) : ?>
                                <li><a href="<?= $settings['footer_social_linkedin'] ?>" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a></li>
                            <?php endif;
                            if ($settings['footer_social_youtube']) : ?>
                                <li><a href="<?= $settings['footer_social_youtube'] ?>" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif ?>
<!--end contact-->

<!--begin footer -->
<div class="footer">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-7 -->
            <div class="col-12">

                <p>© <?= date('Y') ?> <span class="template-name">Lets Scale Up</span>. Developed by <a href="https://www.clcbws.com" target="_blank" rel="follow" class="template-name">Broadway Web Services</a></p>

            </div>

        </div>
        <!--end row -->

    </div>
    <!--end container -->

</div>
<!--end footer -->

<?php if (!session()->get('isUserLoggedin')) : ?>
    <div class="modal fade" id="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginPanel" type="button" role="tab" aria-controls="loginPanel" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerPanel" type="button" role="tab" aria-controls="registerPanel" aria-selected="false">Register</button>
                        </li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="loginPanel" role="tabpanel" aria-labelledby="login-tab">
                            <form id="loginForm" method="post" action="auth/login">
                                <div>
                                    <div class="formLoader">
                                        <div class="text-center justify-content-center">
                                            <div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" autocomplete="newEmail" placeholder="Valid email address" />
                                        <label for="email">Email Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="password" autocomplete="newPassword" placeholder="Valid password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="mb-3" id="loginErrors">
                                    </div>
                                </div>
                                <div class="modal-footer d-block">
                                    <p class="float-start">Not yet account <a href="#" onclick="showRegister()">Sign Up</a></p>
                                    <button type="submit" id="loginButton" class="btn btn-warning float-end">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="registerPanel" role="tabpanel" aria-labelledby="register-tab">
                            <form id="registerForm">
                                <div>
                                    <div class="formLoader">
                                        <div class="text-center justify-content-center">
                                            <div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="regname" name="name" placeholder="Your full name" />
                                        <label for="regname">Full Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="regemail" name="email" placeholder="**********" />
                                        <label for="regemail">Email Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phone_no" name="phone_no" placeholder="eg: +919898989898" />
                                        <label for="phone_no">Contact Number</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="regpassword" name="password" placeholder="**********" />
                                        <label for="regpassword">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="**********" />
                                        <label for="password_confirm">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="mb-3" id="registerErrors">
                                </div>
                                <div class="modal-footer d-block">
                                    <p class="float-start">Already have an account! <a href="#" onclick="showLogin()">Login Now</a></p>
                                    <button type="submit" id="registerButton" class="btn btn-warning float-end">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- GetButton.io widget -->
<style>
    .modal {
        z-index: 99999 !important;
    }

    .modal-backdrop {
        z-index: 9999;
    }

    ul.footer_social {
        margin-bottom: 0 !important;
    }

    ul.footer_social li a.facebook i {
        color: #4267B2 !important;
    }

    ul.footer_social li a.twitter i {
        color: #1DA1F2 !important;
    }

    ul.footer_social li a.instagram i {
        color: #8a3ab9 !important;
    }

    ul.footer_social li a.linkedin i {
        color: #0077b5 !important;
    }

    ul.footer_social li a.youtube i {
        color: #ff0000 !important;
    }

    .press-release-row>div {
        min-height: 100%;
    }

    .press-release {
        min-height: 120px;
    }

    .press-release img {
        position: absolute;
        width: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #newsletterSubmit {
        height: calc(3.5rem + 2px);
    }

    /* #newsletter-form .input-group {
        height: 64px;
        border: none !important;
        background-color: #fff;
        -moz-border-radius: 5px 0 0 5px;
        -webkit-border-radius: 5px 0 0 5px;
        border-radius: 5px;
        color: #454545;
        font-size: 17px;
        margin: 0 !important;
    } */

    /* .errors[role=alert] {
        background-color: red;
    } */
</style>
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "+919911275112", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
            host = "getbutton.io",
            url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->