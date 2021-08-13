<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- END HOME -->
<section class="bg-light d-flex align-content-center flex-wrap" style="min-height:75vh;">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center justify-content-center align-content-center">
                    <div class="col-lg-9">
                        <div class="home-content text-center mt-5 pt-5">
                            <!-- <div class="home-badge mt-5">
                                <p class="f-13 bg-primary text-white-50"><span class="text-white">70% Off</span> for first 3 month</p>
                            </div> -->
                            <!-- <h1 class="mt-3"><span class="element" data-elements="Starting & Managing Your Business has never been easier!"></span></h1> -->
                            <h1 class="mt-3">Starting & Managing Your Business has never been easier!</h1>
                            <p class="text-muted mt-3 f-20"> Start a Company, IP registration, Tax registration & Filings
                                <br> venenaatis nec biendum Susisse potenti.
                            </p>

                        </div>
                    </div>
                    <div class="row mt-4 mb-5">
                        <div class="col-lg-4">
                            <div class="work-box text-center p-3">
                                <div class="arrow">
                                    <img src="/public/assets/images/arrow-1.png" alt="">
                                </div>
                                <!-- <div class="work-count">
                                    <p class="mb-0">1</p>
                                </div> -->
                                <div class="work-icon">
                                    <i class="pe-7s-light"></i>
                                </div>
                                <h5 class="mt-4">5000+ Businesses Served</h5>
                                <!-- <p class="text-muted mt-3">
                                    Sellesque vel pellentesque eros at commodo dui varius natoque penatibus magnis dis parturient montes ridiculus.
                                </p> -->
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="work-box text-center p-3">
                                <div class="arrow">
                                    <img src="/public/assets/images/arrow-2.png" alt="">
                                </div>
                                <!-- <div class="work-count">
                                    <p class="mb-0">2</p>
                                </div> -->
                                <div class="work-icon">
                                    <i class="pe-7s-pen"></i>
                                </div>
                                <h5 class="mt-4">9.6/10 Unfiltered Customer Ratings</h5>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="work-box text-center p-3">
                                <!-- <div class="work-count">
                                    <p class="mb-0">3</p>
                                </div> -->
                                <div class="work-icon">
                                    <i class="pe-7s-monitor"></i>
                                </div>
                                <h5 class="mt-4">Satisfaction or Money Back Guarantee</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<!-- SERVICES -->
<section class="section pt-5">
    <div class="container">
        <div class="row">

            <?php foreach ($services as $service) : ?>
                <div class="col-lg-6">
                    <div class="counter-box mt-4">
                        <div class="media box-shadow bg-white p-4 rounded">
                            <div class="counter-icon mr-3">
                                <i class="mdi mdi-<?=$service['service_icon']?> text-primary h2"></i>
                            </div>
                            <div class="media-body pl-2">
                                <h3><?=$service['service_title']?></h3>
                                <p class="text-muted mb-0 mt-2 f-15">
                                <?=$service['service_summary']?>
                                </p>
                                <div class="row form-inline mt-3">
                                    <div class="col-lg-6">
                                        <span class="h5 pt-2"><b>₹ <?=$service['service_starts_at']?></b> <small>(All Inclusive)</small></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="/service/<?=$service['service_slug']?>" class="btn btn-primary float-right">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
    </div>
</section>
<!-- SERVICES -->


<!-- START CLIENT-IMG -->
<section class="section pt-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-3">
                <div class="client-images mt-4">
                    <img src="/public/assets/images/clients/1.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="client-images mt-4">
                    <img src="/public/assets/images/clients/2.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="client-images mt-4">
                    <img src="/public/assets/images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="client-images mt-4">
                    <img src="/public/assets/images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CLIENT IMG -->

<!-- START HOW IT WORK -->
<section class="section pt-5" id="how-it-work">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">How It Work</h6>
                    <h3 class="title-heading mt-4">Let’s get started in 3 easy
                        <br> steps
                    </h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="work-box text-center p-3">
                    <div class="arrow">
                        <img src="/public/assets/images/arrow-1.png" alt="">
                    </div>
                    <div class="work-count">
                        <p class="mb-0">1</p>
                    </div>
                    <div class="work-icon">
                        <i class="pe-7s-light"></i>
                    </div>
                    <h5 class="mt-4">Product Review</h5>
                    <p class="text-muted mt-3">
                        Sellesque vel pellentesque eros at commodo dui varius natoque penatibus magnis dis parturient montes ridiculus.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="work-box text-center p-3">
                    <div class="arrow">
                        <img src="/public/assets/images/arrow-2.png" alt="">
                    </div>
                    <div class="work-count">
                        <p class="mb-0">2</p>
                    </div>
                    <div class="work-icon">
                        <i class="pe-7s-pen"></i>
                    </div>
                    <h5 class="mt-4">Product Design</h5>
                    <p class="text-muted mt-3">
                        Pellentesque pellentesque eros at commodo dui varius penatibus magnis dis parturient natoque montes ridiculus.
                    </p>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="work-box text-center p-3">
                    <div class="work-count">
                        <p class="mb-0">3</p>
                    </div>
                    <div class="work-icon">
                        <i class="pe-7s-monitor"></i>
                    </div>
                    <h5 class="mt-4">Product Checkup</h5>
                    <p class="text-muted mt-3">
                        commodo ellentesque vel pellentesque eros dui Orci varius natoque penatibus dis partient montes magnis.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- END HOE IT WORK -->

<!-- START SERVICES -->
<section class="section bg-light" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Services</h6>
                    <h3 class="title-heading mt-4">Best Web Services For Effective <br> Business</h3>
                </div>
            </div>
        </div>


        <div class="row align-items-center mt-5">

            <div class="col-lg-6">
                <div class="tab-content mt-4" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                        <div class="services-img">
                            <img src="/public/assets/images/features/img-4.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-privacy" role="tabpanel" aria-labelledby="v-pills-privacy-tab">
                        <div class="services-img">
                            <img src="/public/assets/images/features/img-5.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-support" role="tabpanel" aria-labelledby="v-pills-support-tab">
                        <div class="services-img">
                            <img src="/public/assets/images/features/img-6.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-gen-ques-tab" data-toggle="pill" href="#v-pills-gen-ques" role="tab" aria-controls="v-pills-gen-ques" aria-selected="true">
                        <div class="p-3">
                            <div class="media">
                                <div class="services-title">
                                    <i class="mdi mdi-wordpress"></i>
                                </div>
                                <div class="media-body pl-4">
                                    <h5 class="mb-2 services-title mt-2">
                                        Wordpress Development</h5>
                                    <p class="mb-0"> Nulla et urna mauris Phasellus varius odio ut quam pharetra tristique Quisque lobortis velit felis nec aliquet est ursus velit ac tincidunt urna.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="nav-link" id="v-pills-privacy-tab" data-toggle="pill" href="#v-pills-privacy" role="tab" aria-controls="v-pills-privacy" aria-selected="false">
                        <div class="p-3">
                            <div class="media">
                                <div class="services-title">
                                    <i class="mdi mdi-security"></i>
                                </div>
                                <div class="media-body pl-4">
                                    <h5 class="mb-2 services-title mt-2">Backup solution</h5>
                                    <p class="mb-0"> Vestibulum euismod tincidunt ligula at pharetra velit. Mauris nisi diam ornare dignissim metus ac vehicula imperdiet tortor Mauris a consequat mi.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="nav-link" id="v-pills-support-tab" data-toggle="pill" href="#v-pills-support" role="tab" aria-controls="v-pills-support" aria-selected="false">
                        <div class="p-3">
                            <div class="media">
                                <div class="services-title">
                                    <i class="mdi mdi-cloud-download-outline"></i>
                                </div>
                                <div class="media-body pl-4">
                                    <h5 class="mb-2 f-18 services-title mt-2">Cloud Hosting</h5>
                                    <p class="mb-0"> Laoreet est eleifend Phasellus nec mi eget libero ornare venenatis sit amet id turpis Interdum et malesuada fames ac ante primis in faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- END SERVICES -->

<!-- START COUNTER -->
<section class="section bg-light pt-5">
    <div class="container">
        <div class="row" id="counter">
            <div class="col-lg-5">
                <div class="counter-info mt-4">
                    <h3>A focused Lizehen with a specialized skill set</h3>
                    <p class="text-muted mt-4">Praesent libero nisi,consequat vitae felis vitae pharetra tincidunt augue Duis ligula ligula pharetra a mauris eu euismod cursus velit.</p>
                    <div class="mt-4">
                        <a href="" class="btn btn-primary">Learn More <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="counter-box mt-4">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="counter-icon mr-3">
                                    <i class="mdi mdi-gift text-primary h2"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="counter-count"> <span class="counter-value" data-count="370">0</span>
                                        +</h3>
                                    <h5 class="mt-2 mb-0 f-17">Happy Clients </h5>
                                    <p class="text-muted mb-0 mt-2 f-15">Consequat vitae felis vitae pharetra tincidunt
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="counter-box mt-4">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="counter-icon mr-3">
                                    <i class="mdi mdi-progress-download text-primary h2"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="counter-count"> <span class="counter-value" data-count="2">0</span> M
                                    </h3>
                                    <h5 class="mt-2 mb-0 f-17">Download </h5>
                                    <p class="text-muted mb-0 mt-2 f-15">Consequat vitae felis vitae pharetra tincidunt
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-6">
                        <div class="counter-box mt-4">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="counter-icon mr-3">
                                    <i class="mdi mdi-emoticon-outline text-primary h2"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="counter-count"> <span class="counter-value" data-count="45000">0</span> +
                                    </h3>
                                    <h5 class="mt-2 mb-0 f-17">Happy Users </h5>
                                    <p class="text-muted mb-0 mt-2 f-15">Consequat vitae felis vitae pharetra tincidunt
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="counter-box mt-4">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="counter-icon mr-3">
                                    <i class="mdi mdi-timer text-primary h2"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="counter-count"> <span class="counter-value" data-count="5">0</span> +
                                    </h3>
                                    <h5 class="mt-2 mb-0 f-17">Years of expe. </h5>
                                    <p class="text-muted mb-0 mt-2 f-15">Consequat vitae felis vitae pharetra tincidunt
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END COUNTER -->

<!-- START PRICING -->
<section class="section" id="pricing">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Pricing</h6>
                    <h3 class="title-heading mt-4">Best Pricing Package Start <br> Business</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-4">
                <div class="pricing-box mt-4 rounded">
                    <div class="pricing-content">
                        <h4 class="text-uppercase">Starter</h4>
                        <p class="text-muted mb-4 pb-1">Aliquam porttitor sagittis dignissim nibh amet rhoncus risus.
                        </p>
                        <hr>
                        <div class="pricing-plan mt-4 text-primary text-center">
                            <h1><sup class="text-muted">$ </sup>34 <small class="f-16 text-muted">/ Mo</small></h1>
                        </div>
                        <hr>

                        <div class="pricing-features pt-3">
                            <p class="text-muted"><strong class="text-dark">2</strong> Website</p>
                            <p class="text-muted"><strong class="text-dark">30 GB</strong> Storage</p>
                            <p class="text-muted"><strong class="text-dark">Unmetered</strong> Bandwidth</p>
                            <p class="text-muted"><strong class="text-dark">Email</strong> 1 Year trail</p>
                            <p class="text-muted"><strong class="text-dark">Free domain</strong> annual plan</p>
                        </div>
                        <div class="pricing-border mt-3"></div>
                        <div class="mt-4 pt-2 text-center">
                            <a href="" class="btn btn-primary btn-round">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricing-box border border-primary mt-4 rounded">
                    <div class="pricing-content">

                        <div class="pricing-lable">Popular</div>
                        <h4 class="text-uppercase">Personal</h4>
                        <p class="text-muted mb-4 pb-1">Aliquam porttitor sagittis dignissim nibh amet rhoncus risus.
                        </p>
                        <hr>
                        <div class="pricing-plan mt-4 text-primary text-center">
                            <h1><sup class="text-muted">$ </sup>94 <small class="f-16 text-muted">/ Mo</small></h1>
                        </div>

                        <hr>
                        <div class="pricing-features pt-3">
                            <p class="text-muted"><strong class="text-dark">2</strong> Website</p>
                            <p class="text-muted"><strong class="text-dark">30 GB</strong> Storage</p>
                            <p class="text-muted"><strong class="text-dark">Unmetered</strong> Bandwidth</p>
                            <p class="text-muted"><strong class="text-dark">Email</strong> 1 Year trail</p>
                            <p class="text-muted"><strong class="text-dark">Free domain</strong> annual plan</p>
                        </div>
                        <div class="pricing-border mt-3"></div>
                        <div class="mt-4 pt-2 text-center">
                            <a href="" class="btn btn-primary btn-round">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricing-box mt-4 rounded">
                    <div class="pricing-content">
                        <h4 class="text-uppercase">Ultimate</h4>
                        <p class="text-muted mb-4 pb-1">Aliquam porttitor sagittis dignissim nibh amet rhoncus risus.
                        </p>
                        <hr>
                        <div class="pricing-plan mt-4 text-primary text-center">
                            <h1><sup class="text-muted">$ </sup>64 <small class="f-16 text-muted">/ Mo</small></h1>
                        </div>
                        <hr>
                        <div class="pricing-features pt-3">
                            <p class="text-muted"><strong class="text-dark">2</strong> Website</p>
                            <p class="text-muted"><strong class="text-dark">30 GB</strong> Storage</p>
                            <p class="text-muted"><strong class="text-dark">Unmetered</strong> Bandwidth</p>
                            <p class="text-muted"><strong class="text-dark">Email</strong> 1 Year trail</p>
                            <p class="text-muted"><strong class="text-dark">Free domain</strong> annual plan</p>
                        </div>
                        <div class="pricing-border mt-3"></div>
                        <div class="mt-4 pt-2 text-center">
                            <a href="" class="btn btn-primary btn-round">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- END PRICING -->

<!-- START TESTIMONIAL -->
<section class="section bg-testimonial" id="testimonial">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Testimonial</h6>
                    <h3 class="title-heading mt-4">What they say about us <br> honest reviews</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="testi-carousel">

                    <div class="testimonial-box text-center p-4">
                        <div class="testi-img-user">
                            <img src="/public/assets/images/users/img-1.jpg" alt="" class="rounded-circle testi-user mx-auto d-block">
                        </div>
                        <img src="/public/assets/images/client-quote.png" class="mt-4 pt-2" alt="">

                        <h4 class="font-italic mt-4 pt-2">The European languages are members of the same family
                            Their
                            separate existence is a myth For science, music, sport, etc, europe their Eopean
                            languages common the theory of popular words.</h4>

                        <div class="testi-border mt-4"></div>
                        <p class="text-uppercase text-muted mb-0 mt-4 f-14">Developer</p>
                        <h5 class="mt-2">Jeremiah Eskew</h5>
                    </div>

                    <div class="testimonial-box text-center p-4">
                        <div class="testi-img-user">
                            <img src="/public/assets/images/users/img-2.jpg" alt="" class="rounded-circle testi-user mx-auto d-block">
                        </div>
                        <img src="/public/assets/images/client-quote.png" class="mt-4 pt-2" alt="">

                        <h4 class="font-italic mt-4 pt-2">The European languages are members of the same family
                            Their
                            separate existence is a myth For science, music, sport, etc, europe their Eopean
                            languages common the theory of popular words.</h4>

                        <div class="testi-border mt-4"></div>
                        <p class="text-uppercase text-muted mb-0 mt-4 f-14">Designer</p>
                        <h5 class="mt-2">Cameron Green</h5>
                    </div>

                    <div class="testimonial-box text-center p-4">
                        <div class="testi-img-user">
                            <img src="/public/assets/images/users/img-3.jpg" alt="" class="rounded-circle testi-user mx-auto d-block">
                        </div>
                        <img src="/public/assets/images/client-quote.png" class="mt-4 pt-2" alt="">

                        <h4 class="font-italic mt-4 pt-2">The European languages are members of the same family
                            Their
                            separate existence is a myth For science, music, sport, etc, europe their Eopean
                            languages common the theory of popular words.</h4>

                        <div class="testi-border mt-4"></div>
                        <p class="text-uppercase text-muted mb-0 mt-4 f-14">Manager</p>
                        <h5 class="mt-2">Sammy Randolph</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END TESTIMONIAL -->

<!-- START VIDEO -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center">
                    <h6 class="text-uppercase desc-white f-14">Why you need Lizehen</h6>
                    <h2 class="line-height_1_4 mt-4">Join millions of users and grow your <br> business.</h2>
                    <p class="mt-3 desc-white">Join the free trial now. </p>
                    <div class="mt-4 pt-2">
                        <a href="http://vimeo.com/99025203" class="video-play-icon text-white">
                            <i class="mdi mdi-play play-icon-circle text-white mr-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END VIDEO -->

<!-- START TEAM -->
<section class="section" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Team</h6>
                    <h3 class="title-heading mt-4">Meet our expert people of <br> payonline</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-2">
            <div class="col-lg-3">
                <div class="team-box text-center py-3 rounded mt-4">
                    <div class="team-img">
                        <img src="/public/assets/images/users/img-1.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="team-social-icon">
                        <i class="mdi mdi-email"></i>
                    </div>
                    <h5 class="f-18 mt-4 mb-2">Lora Scott</h5>
                    <p class="text-muted">CEO</p>
                    <hr>
                    <div class="team-social mt-2">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-box text-center py-3 rounded mt-4">
                    <div class="team-img">
                        <img src="/public/assets/images/users/img-2.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="team-social-icon">
                        <i class="mdi mdi-email"></i>
                    </div>
                    <h5 class="f-18 mt-4 mb-2">Andrew Schimke</h5>
                    <p class="text-muted">Developer</p>
                    <hr>
                    <div class="team-social mt-2">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-box text-center py-3 rounded mt-4">
                    <div class="team-img">
                        <img src="/public/assets/images/users/img-3.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="team-social-icon">
                        <i class="mdi mdi-email"></i>
                    </div>
                    <h5 class="f-18 mt-4 mb-2">Mary Rivers</h5>
                    <p class="text-muted">Manager</p>
                    <hr>
                    <div class="team-social mt-2">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-box text-center py-3 rounded mt-4">
                    <div class="team-img">
                        <img src="/public/assets/images/users/img-4.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="team-social-icon">
                        <i class="mdi mdi-email"></i>
                    </div>
                    <h5 class="f-18 mt-4 mb-2">John Wright</h5>
                    <p class="text-muted">Designer</p>
                    <hr>
                    <div class="team-social mt-2">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END TEAM -->

<!-- START BLOG -->
<section class="section bg-light" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Blogs</h6>
                    <h3 class="title-heading mt-4">Our latest blog posts <br> insights articles</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="blog-box mt-4">
                    <div class="blog-img">
                        <img src="/public/assets/images/blog/img-1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="blog-content mt-3">
                        <div class="blog-lable">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-share-variant mr-1"></i>12</li>
                                <li class="list-inline-item"><i class="mdi mdi-account mr-1"></i>15</li>
                            </ul>
                        </div>
                        <h6 class="f-13 text-muted">UI & UX Design</h6>
                        <h5 class="mt-2">
                            <a href="" class="blog-title">Doing a cross country road trip</a>
                        </h5>
                        <p class="text-muted mt-3">Curabitur lacus maximus suscipit curtur eget lectus lacinia consectetur dolor id volutpat magna fermentum bibendum.</p>
                        <div class="mt-4">
                            <a href="" class="btn btn-sm btn-primary btn-round">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-box mt-4">
                    <div class="blog-img">
                        <img src="/public/assets/images/blog/img-2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="blog-content mt-3">
                        <div class="blog-lable">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-share-variant mr-1"></i>12</li>
                                <li class="list-inline-item"><i class="mdi mdi-account mr-1"></i>15</li>
                            </ul>
                        </div>
                        <h6 class="f-13 text-muted">Digital Marketing</h6>
                        <h5 class="mt-2">
                            <a href="" class="blog-title">New exhibition at our Museum</a>
                        </h5>
                        <p class="text-muted mt-3">The wise man therefore always holds in these matters to this principle of selection rejects pleasures secure other pains.</p>
                        <div class="mt-4">
                            <a href="" class="btn btn-sm btn-primary btn-round">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-box mt-4">
                    <div class="blog-img">
                        <img src="/public/assets/images/blog/img-3.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="blog-content mt-3">
                        <div class="blog-lable">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-share-variant mr-1"></i>12</li>
                                <li class="list-inline-item"><i class="mdi mdi-account mr-1"></i>15</li>
                            </ul>
                        </div>
                        <h6 class="f-13 text-muted">Travelling</h6>
                        <h5 class="mt-2">
                            <a href="" class="blog-title">Why are so many people..</a>
                        </h5>
                        <p class="text-muted mt-3">Juis autem vel eumat reprehenderit voluptate velit esse quam nihil molestiae consequatur fugiat voluptas nulla pariatur.</p>
                        <div class="mt-4">
                            <a href="" class="btn btn-sm btn-primary btn-round">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- END BLOG -->

<!-- START CONTACT -->
<section class="section" id="contact">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Contact us</h6>
                    <h3 class="title-heading mt-4">Have a project on mind? </h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="contact-info bg-light p-4 rounded mt-4">
                    <h5 class="f-18">Contact Details</h5>
                    <p class="text-muted">Faucibus orci luctus atet ultrices posuere duiorci sollicitudin luctus.</p>
                    <div class="mt-4">
                        <div class="media">
                            <i class="pe-7s-home h4"></i>
                            <div class="media-body pl-3">
                                <h5 class="mt-0 f-17">Head Office</h5>
                                <p class="text-muted mb-0">2301 Finwood Road Monmouth Junction, NJ 08852</p>
                            </div>
                        </div>

                        <div class="mt-4 pt-1">
                            <div class="media">
                                <i class="pe-7s-mail-open-file h4"></i>
                                <div class="media-body pl-3">
                                    <h5 class="mt-0 f-17">Email Us</h5>
                                    <p class="text-muted mb-0">RuthJSimpson@armyspy.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-1">
                            <div class="media">
                                <i class="pe-7s-call h4"></i>
                                <div class="media-body pl-3">
                                    <h5 class="mt-0 f-17">Call Support</h5>
                                    <p class="text-muted mb-0">
                                        +001 513-965-6401
                                    </p>
                                    <p class="text-muted mb-0">
                                        +225 303-760-9330
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="pl-0 pl-lg-2 mt-4">
                    <h5 class="f-18">Send a Message</h5>

                    <div class="custom-form mt-3">
                        <div id="message"></div>
                        <form method="post" action="php/contact.php" name="contact-form" id="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <label class="contact-lable">First Name</label>
                                        <input name="name" id="name" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <label class="contact-lable">Last Name</label>
                                        <input name="name" id="lastname" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-3">
                                        <label class="contact-lable">Email Address</label>
                                        <input name="email" id="email" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-3">
                                        <label class="contact-lable">Subject</label>
                                        <input name="subject" id="subject" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-3">
                                        <label class="contact-lable">Your Message</label>
                                        <textarea name="comments" id="comments" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3 text-right">
                                    <input id="submit" name="send" class="submitBnt btn btn-primary btn-round" value="Send Message" type="submit">
                                    <div id="simple-msg"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- END CONTACT -->

<?= $this->endSection() ?>