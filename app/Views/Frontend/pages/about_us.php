<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<style>
    .postContent {
        max-width: 800px;
        margin: 0 auto;
    }

    .counter-box {
        height: 100%;
    }

    section#aboutus_header {
        background: url(/public/assets/images/about_us_header.jpg);
        background-position: top center;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 380px;
        margin-top: 90px;
    }

    section#who_we_are {
        padding-top: 30px;
    }
</style>


<!-- MAIN CONTENT -->
<section class="home-section section-grey" id="aboutus_header">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-9">
                        <!-- <div class="title-box text-center postContent">
                            <h6 class="customTitles f-17">Lets Scale <span>Up</span></h6>
                            <h3 class="customTitles">WHO <span>WE</span> ARE?</h3>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-white" id="who_we_are">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center postContent">
                    <h6 class="customTitles f-17">Lets Scale <span>Up</span></h6>
                    <h3 class="customTitles">WHO <span>WE</span> ARE?</h3>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <img src="/public/assets/images/startup.png" style="width:100%;">
            </div>
            <div class="col-md-6 mb-3" style="text-align:justify;font-size:13px;font-weight:500">
                <!-- <img src="/public/assets/images/startup.png" style="float: left;"> -->
                LSU is making startup journey simple for young founders and ventures.
                LSU is a one stop destination for all startup related services. LSU understands the product, marketing, legal, IPR and fundraising requirements of a startup and helps them to achieve these goals through its startup and legal consultancies.
                LSU is currently working with more than 50+ Startups in the domain of edtech, fintech, drones,property management etc.
                Some of it's startup like Probano, olivecoestate, almspay have raised funding and are also featured in many national publication.
                The motto of LSU is to help startups build successful ventures. We at LSU promise that we won't let processes hinder potential and passion.
                Who can benefit from business and Legal consulting services? Whether you want to start a Start-up as an entrepreneur or a new business, optimize your existing business and startup, or grow them with more success, LSU consultants provide insights services and help start-ups to achieve desired business goals.
                Our business, startups and Legal consulting services assist clients to maximize their efforts, creating measurable business values and results. LSU assists clients with a powerful combination of business and legal consulting services and capabilities, to cut through the complexities of business and legal challenges faced by them.
            </div>
            <div class="col-12" style="text-align:justify;font-size:13px;font-weight:500">
                Our business and Legal consulting services help clients to gain a better understanding to take the right steps, measure and manage business and legal resources and investments to drive real start-up value.
                LSU business and Legal consultants help clients by providing them with mentors, business and Start-ups education, Pitch-deck, IPR services, Business Setup plans, Finance, and much more.
                Most business entrepreneurs in the world have a coach or consultant in one form or another. From sports athletes to business leaders and politicians, successful people know that having someone they trust, who provides quality advice is necessary to achieve peak business performance.
            </div>
        </div>
    </div>
</section>
<!-- MAIN CONTENT -->

<section class="section-grey" id="what-we-do">
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center">
                    <h3 class="customTitles">WHAT <span>WE</span> DO</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div class="counter-box card">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-yin-yang text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Mentoring</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Lets Scale Up provides the platform for entrepreneurs and start-ups to empower them with the Mentors wherein we ensure that our start-ups will always have the best of the advises and the best of the advisors to rely on.
                                <!-- <br><br><button class="btn btn-primary btn-sm">Know More</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4">
                <div class="counter-box card">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-playlist-check text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Bussiness Planning</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                The business plan is a map that takes a start-up on the path of success. We at Lets scale Up, help the start-ups in building up a meticulous business plan to plan their short term and long term goals.
                                <!-- <br><br><button class="btn btn-primary btn-sm">Know More</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="counter-box card">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-book text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Legal Consultancy</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Lets Scale Up provide the legal service to the start-ups including all the legal drafting and documentation needed for startups. We also provide company regsitration, GST Filing etc.
                                <!-- <br><br><button class="btn btn-primary btn-sm">Know More</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="counter-box card">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-copyright text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>IPR Services</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                IPR is one the most important tool for the start-up building which most of the start-ups ignore in the initial stage. We provide the IPR experts guidance and services to maintain and build the start-ups under the laws of IPR.
                                <!-- <br><br><button class="btn btn-primary btn-sm">Know More</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="counter-box card">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-file text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Start-up Pitch Deck</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Communicating your start-up idea to Investors is very crucial and for that your Pitch Deck must contain all those required information that too in limited slides. Our experts help you not only preparing the Pitch Deck but also to present it before investors.
                                <!-- <br><br><button class="btn btn-primary btn-sm">Know More</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4">
                <div class="counter-box card">
                    <div class="media box-shadow bg-white p-4 rounded">
                        <div class="circled_icon counter-icon mr-3">
                            <i class="mdi mdi-chart-line text-primary h2"></i>
                        </div>
                        <div class="media-body pl-2">
                            <h3>Finance Services</h3>
                            <p class="text-muted mb-0 mt-2 f-15">
                                Entrepreneurs face challenges when it comes to the Financial Projections. A few are good in Product, Marketing but when it comes to the number, they get stuck and this is what Investors are interested in. Our experts help you to create a Financial Projection with Logical Assumptions.
                                <!-- <br><br><button class="btn btn-primary btn-sm">Know More</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-white" id="our-team">
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center">
                    <h3 class="customTitles">Our Team</h3>
                </div>
            </div>
        </div>
        <div class="row">

            <?php foreach ($team as $key => $member) : ?>
                <div class="col-md-4 col-lg-3 col-12 mt-4">
                    <div class="card box-shadow rounded">
                        <img src="<?= $member['member_image'] ?>" class="card-img-top" alt="<?= $member['member_name'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <?= $member['member_name'] ?>
                                <small class="text-muted">
                                    <strong><i><?= $member['member_position'] ?></i></strong>
                                </small>
                            </h5>
                            <p class="card-text fs-2">
                                <?php if ($member['member_linkedin']) : ?>
                                    <a class="linkedin" target="_blank" href="<?= $member['member_linkedin'] ?>"><i class="bi bi-linkedin"></i></a>
                                <?php endif; ?>
                                <?php if ($member['member_facebook']) : ?>
                                    <a class="facebook" target="_blank" href="<?= $member['member_facebook'] ?>"><i class="bi bi-facebook"></i></a>
                                <?php endif; ?>
                                <?php if ($member['member_twitter']) : ?>
                                    <a class="twitter" target="_blank" href="<?= $member['member_twitter'] ?>"><i class="bi bi-twitter"></i></a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>