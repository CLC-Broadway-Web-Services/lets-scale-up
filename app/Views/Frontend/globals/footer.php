    <!-- START FOOTER -->
    <section class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-info mt-4">
                        <img src="/public/assets/images/logo-dark.png" alt="<?= route_to('home_page') ?>" height="22">
                        <!-- <p class="text-muted mt-4 mb-2">Pretium viverra tinunt sagittis tempor.</p>
                        <img src="/public/assets/images/features/img-1.png" class="img-fluid" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="row pl-0 pl-lg-3">
                        <div class="col-lg-3">
                            <div class="mt-4">
                                <!-- <h5 class="text-uppercase f-16">Product</h5> -->
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="<?= route_to('privacy_page') ?>">Privacy Policy</a></li>
                                    <!-- <li><a href="">Features</a></li>
                                    <li><a href="">Credit</a></li>
                                    <li><a href="">Team</a></li>
                                    <li><a href="">Portfolio</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-4">
                                <!-- <h5 class="text-uppercase f-16">Company</h5> -->
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="<?= route_to('home_page') ?>#about">About Us</a></li>
                                    <!-- <li><a href="">Carrers</a></li>
                                    <li><a href="">Investors</a></li>
                                    <li><a href="">Press</a></li>
                                    <li><a href="">Blog</a></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mt-4">
                                <!-- <h5 class="text-uppercase f-16">More Info</h5> -->
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="<?= route_to('terms_page') ?>">Terms of Use</a></li>
                                    <!-- <li><a href="">For Marketing</a></li>
                                    <li><a href="">For CEOs</a></li>
                                    <li><a href="">For Agencies</a></li>
                                    <li><a href="">Our Apps</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-4">
                                <!-- <h5 class="text-uppercase f-16">Resources</h5> -->
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="<?= route_to('contact_us_page') ?>">Contact Us</a></li>
                                    <!-- <li><a href="">Visibility</a></li>
                                    <li><a href="">Accessibility</a></li>
                                    <li><a href="">Design Defined</a></li>
                                    <li><a href="">Marketplace</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="text-muted mb-0"><?=date('Y')?> &copy; <a href="<?= APP_URL ?>"><?= APP_NAME ?></a>. Developed & Design by <a href="https://www.clcbws.com" target="_blank" title="Broadway Web Services">BWS</a></p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END FOOTER -->
    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+919911275112", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->
