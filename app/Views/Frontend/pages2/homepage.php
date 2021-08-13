<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<!-- END HOME -->
<section class="bg-home" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="home-content">
                            <div class="">
                                <p class="f-18"><span class="text-primary">Business and legal consultant for Start-ups!</span></p>
                            </div>
                            <h1 class="home-title">Let's connect to start and Scale your Start-up!</h1>
                            <!-- <p class="text-muted mt-3 f-20"> Donec iaculis ligula eros none interdum sem fusce
                                    <br> venenaatis nec biendum Susisse potenti.
                                </p> -->
                            <div class="mt-5">
                                <a href="<?= route_to('contact_us_page'); ?>" class="btn btn-primary">
                                    Contact Us <i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="home-img">
                            <img src="/public/assets/images/Startup.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->


<!-- WHO WE ARE -->
<section class="section bg-light pt-5 pb-0" id="about">
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center">
                    <h6 class="customTitles text-primary f-17">Lets Scale <span>Up</span></h6>
                    <h3 class="customTitles text-primary">WHO <span>WE</span> ARE?</h3>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        LSU is making startup journey simple for young founders and ventures.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        LSU is a one stop destination for all startup related services. LSU understands the product, marketing, legal, IPR and fundraising requirements of a startup and helps them to achieve these goals through its startup and legal consultancies.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        LSU is currently working with more than 50+ Startups in the domain of edtech, fintech, drones,property management etc.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Some of it's startup like Probano, olivecoestate, almspay have raised funding and are also featured in many national publication.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        The motto of LSU is to help startups build successful ventures. We at LSU promise that we won't let processes hinder potential and passion.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        <a href="<?= route_to('about_us_page'); ?>">to know more click here</a>
                    </p>
                    <!-- <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Who can benefit from business and Legal consulting services? Whether you want to start a Start-up as an entrepreneur or a new business, optimize your existing business and startup, or grow them with more success, LSU consultants provide insights and help to achieve your desired business and Start-up goals to find out how LSU can help, contact us today.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Our business, startups and Legal consulting services assist clients to maximize their efforts, creating measurable business values and results. LSU assists clients with a powerful combination of business and legal consulting services and capabilities, to cut through the complexities of business and legal challenges faced.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Our business and Legal consulting services help clients to gain a better understanding to take the right steps, measure and manage business and legal resources and investments to drive real start-up value. LSU business and Legal consultants help clients by providing them with mentors, business and Start-ups education, Pitch-deck, IPR services, Business Setup plans, Finance, and much more.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Most business entrepreneurs in the world have a coach or consultant in one form or another. From sports athletes to business leaders and politicians, successful people know that having someone they trust, who provides quality advice is necessary to achieve peak business performance.
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WHO WE ARE -->

<!-- Our Supporters -->
<section class="section bg-light splide">
    <div class="container splide__track">
        <div class="row mt-5 splide__list">
            <?php for ($i = 1; $i < 25; $i++) { ?>
                <div class="client-images mt-4 splide__slide">
                    <img src="/public/assets/images/supporters/<?= $i ?>.png" alt="logo-img" class="mx-auto img-fluid d-block" style="margin: 0 auto;">
                </div>
            <?php } ?>
            <!-- <div class="client-images mt-4 splide__slide">
                <img src="/public/assets/images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
            </div>
            <div class="client-images mt-4 splide__slide">
                <img src="/public/assets/images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
            </div>
            <div class="client-images mt-4 splide__slide">
                <img src="/public/assets/images/clients/2.png" alt="logo-img" class="mx-auto img-fluid d-block">
            </div>
            <div class="client-images mt-4 splide__slide">
                <img src="/public/assets/images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
            </div>
            <div class="client-images mt-4 splide__slide">
                <img src="/public/assets/images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
            </div> -->
        </div>
    </div>
</section>
<!-- Our Supporters -->

<!-- WHAT WE DO -->
<section class="section pt-5" id="what-we-do">
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center">
                    <h3 class="customTitles text-primary">WHAT <span>WE</span> DO</h3>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="counter-box mt-4">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-yin-yang text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Mentoring</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Lets Scale Up provides the platform for entrepreneurs and start-ups to empower them with the Mentors wherein we ensure that our start-ups will always have the best of the advises and the best of the advisors to rely on.
                                <br><br><button class="btn btn-primary btn-sm">Know More</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="counter-box mt-4">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-playlist-check text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Bussiness Planning</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                The business plan is a map that takes a start-up on the path of success. We at Lets scale Up, help the start-ups in building up a meticulous business plan to plan their short term and long term goals.
                                <br><br><button class="btn btn-primary btn-sm">Know More</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="counter-box mt-4">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-book text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Legal Consultancy</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Lets Scale Up provide the legal service to the start-ups including all the legal drafting and documentation needed for startups. We also provide company regsitration, GST Filing etc.
                                <br><br><button class="btn btn-primary btn-sm">Know More</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="counter-box mt-4">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-copyright text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>IPR Services</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                IPR is one the most important tool for the start-up building which most of the start-ups ignore in the initial stage. We provide the IPR experts guidance and services to maintain and build the start-ups under the laws of IPR.
                                <br><br><button class="btn btn-primary btn-sm">Know More</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="counter-box mt-4">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-file text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Start-up Pitch Deck</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Communicating your start-up idea to Investors is very crucial and for that your Pitch Deck must contain all those required information that too in limited slides. Our experts help you not only preparing the Pitch Deck but also to present it before investors.
                                <br><br><button class="btn btn-primary btn-sm">Know More</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="counter-box mt-4">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-chart-line text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Finance Services</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Entrepreneurs face challenges when it comes to the Financial Projections. A few are good in Product, Marketing but when it comes to the number, they get stuck and this is what Investors are interested in. Our experts help you to create a Financial Projection with Logical Assumptions.
                                <br><br><button class="btn btn-primary btn-sm">Know More</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- WHAT WE DO -->


<!-- START COUNTER -->
<section class="section bg-light pt-5 pb-5">
    <div class="container">
        <div class="row" id="counter">
            <div class="col-12 mb-4">
                <div class="row text-center">

                    <div class="col-lg-4">
                        <div class="counter-box mt-2">
                            <div class="media box-shadow bg-primary text-light p-4 rounded pt-5 pb-5" style="cursor:pointer;">
                                <div class="media-body pl-2" onclick="window.location.href = '<?= route_to('contact_us_page'); ?>'">
                                    <h4 class="mt-2 mb-0 f-17">Register your Company</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="counter-box mt-2">
                            <div class="media box-shadow bg-primary text-light p-4 rounded pt-5 pb-5" style="cursor:pointer;">
                                <div class="media-body pl-2" onclick="window.location.href = '<?= route_to('contact_us_page'); ?>'">
                                    <h4 class="mt-2 mb-0 f-17">Trademark your Logo</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="counter-box mt-2">
                            <div class="media box-shadow bg-primary text-light p-4 rounded pt-5 pb-5" style="cursor:pointer;">
                                <div class="media-body pl-2" onclick="window.location.href = '<?= route_to('contact_us_page'); ?>'">
                                    <h4 class="mt-2 mb-0 f-17">Create Your Agreement</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="row text-center">

                    <div class="col-lg-4">
                        <div class="counter-box mt-2">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="media-body pl-2">
                                    <h1 class="counter-count">
                                        <span class="counter-value" data-count="50">0</span> +
                                    </h1>
                                    <h4 class="mt-2 mb-0 f-17">Start-ups</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="counter-box mt-2">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="media-body pl-2">
                                    <h1 class="counter-count">
                                        <span class="counter-value" data-count="1000">0</span> +
                                    </h1>
                                    <h4 class="mt-2 mb-0 f-17">Services Delivered</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="counter-box mt-2">
                            <div class="media box-shadow bg-white p-4 rounded">
                                <div class="media-body pl-2">
                                    <h1 class="counter-count">
                                        <span class="counter-value" data-count="5">0</span> +
                                    </h1>
                                    <h4 class="mt-2 mb-0 f-17">Start-ups raised funds</h4>
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

                    <?php foreach ($testimonials as $testimonial) : ?>
                        <?= view_cell('\App\Libraries\Testimonial::testimonial_block', ['testimonial' => $testimonial]); ?>
                    <?php endforeach; ?>

                    <!-- <div class="testimonial-box text-center p-4">
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
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END TESTIMONIAL -->

<style>
    .circled_icon i {
        padding: 10px 14.5px;
        line-height: 50px;
        background-color: #800000;
        font-size: 25px;
        color: #ffffff !important;
        border-radius: 50%;
    }
</style>

<?= $this->endSection(); ?>