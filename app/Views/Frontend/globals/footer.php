<!--begin contact -->
<?php if (!isset($noFooterContact)) : ?>
    <!-- <section class="section-white" id="contact">

        <div class="container">

            <div class="row">
                <div class="col-md-6">

                    <h3>Get in touch</h3>
                    <p class="contact_success_box" style="display:none;">We received your message and you'll hear from us soon.
                        Thank You!</p>
                    <form id="contact-form" class="contact" action="php/contact.php" method="post">

                        <input class="contact-input white-input" required="" name="contact_names" placeholder="Full Name*" type="text">

                        <input class="contact-input white-input" required="" name="contact_email" placeholder="Email Adress*" type="email">

                        <input class="contact-input white-input" required="" name="contact_phone" placeholder="Phone Number*" type="text">

                        <textarea class="contact-commnent white-input" rows="2" cols="20" name="contact_message" placeholder="Your Message..."></textarea>

                        <input value="Send Message" id="submit-button" class="contact-submit" type="submit">

                    </form>

                </div>
                <div class="col-md-6 responsive-top-margins">

                    <h3>How to find us</h3>

                    <iframe class="contact-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.9050207912896!2d-0.14675028449633118!3d51.514958479636384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ad554c335c1%3A0xda2164b934c67c1a!2sOxford+St%2C+London%2C+UK!5e0!3m2!1sen!2sro!4v1485889312335" width="600" height="270" style="border:0" allowfullscreen></iframe>

                    <h5>Head Office</h5>

                    <p class="contact-info"><i class="bi bi-geo-alt-fill"></i> 10 Oxford Street, London, UK, E1 1EC</p>

                    <p class="contact-info"><i class="bi bi-envelope-open-fill"></i> <a href="mailto:contact@youremail.com">office@smart.co.uk</a></p>

                    <p class="contact-info"><i class="bi bi-telephone-fill"></i> +44 987 654 321</p>

                </div>

            </div>

        </div>

    </section> -->
<?php endif ?>
<!--end contact-->

<!--begin footer -->
<div class="footer">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-7 -->
            <div class="col-md-7">

                <p>© <?= date('Y') ?> <span class="template-name">Lets Scale Up</span>. Developed by <a href="https://www.clcbws.com" target="_blank" rel="follow" class="template-name">Broadway Web Services</a></p>

            </div>
            <!--end col-md-7 -->

            <!--begin col-md-5 -->
            <div class="col-md-5">

                <!--begin footer_social -->
                <ul class="footer_social">

                    <li>Follw us:</li>

                    <li><a href="#" class="twitter"><i class="bi bi-twitter"></i></a></li>

                    <li><a href="#" class="instagram"><i class="bi bi-instagram"></i></a></li>

                    <li><a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a></li>

                    <li><a href="#" class="google"><i class="bi bi-google"></i></a></li>

                    <li><a href="#" class="github"><i class="bi bi-github"></i></a></li>

                </ul>
                <!--end footer_social -->

            </div>
            <!--end col-md-5 -->

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
