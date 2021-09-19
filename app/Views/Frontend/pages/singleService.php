<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1><?= $service['service_title'] ?></h1>
                <p class="hero-text"><?= $service['service_summary'] ?></p>
            </div>
            <div class="col-md-6">
                <form class="row g-3" id="service_getstarted_form" method="post">
                    <input hidden name="service_getstarted_form" value="true">
                    <input hidden id="service_id" name="service_id" value="<?= $service['service_id'] ?>">
                    <input hidden id="service_name" name="service_name" value="<?= $service['service_title'] ?>">

                    <div class="alert alert-success align-items-center alert-dismissible fade show queryAlert" role="alert" id="successAlert">
                        <div class="d-flex">
                            <i class="bi bi-check-circle-fill flex-shrink-0 me-2"></i>
                            <div>
                                Query submitted successfully, we will contact you soon.
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="alert alert-danger align-items-center alert-dismissible fade show queryAlert" role="alert" id="errorAlert">
                        <div class="d-flex">
                            <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                            <div>
                                There is an error Please try again after some time.
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" class="form-control" id="user_firstname" name="first_name" placeholder="First name" aria-label="First name" required>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" class="form-control" id="user_lastname" name="last_namme" placeholder="Last name" aria-label="Last name" required>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="email" class="form-control" id="user_email" name="email" placeholder="Valid email address" aria-label="Email" required>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="tel" class="form-control" id="user_mobile" name="phone" placeholder="Phone number" aria-label="Phone" minlength="10" maxlength="10" required>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span class="h3 lsu"><span class="currency-value strong"><?= number_to_currency($service['packages'][0]['package_price'], 'INR') ?></span></span> All Inclusive
                    </div>
                    <div class="col-md-6 col-sm-12 d-grid gap-2">
                        <button type="submit" id="serviceQuerySubmitButton" class="btn btn-warning">Get Started</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" id="service-navbar">
    <div class="container-fluid">
        <div class="mx-auto">
            <ul class="navbar-nav" id="service_navbar_nav">
                <?php if ($service['service_overview']) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#overview">Overview</a>
                    </li>
                <?php endif; ?>
                <?php if (count($service['benefits'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#benefits">Benefits</a>
                    </li>
                <?php endif; ?>
                <?php if (count($service['docs'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#documents">Documents</a>
                    </li>
                <?php endif; ?>
                <?php if (APP_COMPLETED) : ?>
                    <?php if (count($service['packages'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#packages">Packages</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (count($service['faqs'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#faqs">FAQ</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php if ($service['service_overview']) : ?>
    <section class="section-white" id="overview">
        <div class="container pt-md-5 pt-sm-2">
            <div class="row align-items-center text-center">
                <div class="col-12">
                    <h4>OVERVIEW</h4>
                    <h3><?= $service['service_overview_subtitle'] ?></h3>
                    <div><?= html_entity_decode($service['service_overview']) ?></div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (count($service['benefits'])) : ?>
    <section class="section-grey" id="benefits">
        <div class="container pt-md-5 pt-sm-2">
            <div class="row">
                <div class="col-12">
                    <div class="title-box text-center">
                        <h4>BENEFITS</h4>
                        <h3><?= $service['service_benefit_subtitle'] ?></h3>
                    </div>
                    <div class="row">

                        <?php foreach ($service['benefits'] as $benefit) : ?>
                            <div class="col-md-6 col-12 mt-4">
                                <?= view_cell('\App\Libraries\Blocks::service_benefit_block', ['benefit' => $benefit]) ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (count($service['docs'])) : ?>
    <section class="section-white" id="documents">
        <div class="container pt-md-5 pt-sm-2">
            <div class="row">
                <div class="col-12">
                    <div class="title-box text-center">
                        <h4>DOCUMENTS</h4>
                        <h3><?= $service['service_documents_subtitle'] ?></h3>
                    </div>
                    <div class="row">

                        <?php foreach ($service['docs'] as $doc) : ?>
                            <div class="col-md-4 col-sm-6 col-12 mt-4">
                                <?= view_cell('\App\Libraries\Blocks::service_document_block', ['doc' => $doc]) ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (APP_COMPLETED) : ?>
    <?php if (count($service['packages'])) : ?>
        <section class="section-grey" id="packages">
            <div class="container pt-md-5 pt-sm-2">
                <div class="row align-items-center text-center">
                    <div class="col-12">
                        <h4>PACKAGES</h4>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($service['packages'] as $package) : ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <?= view_cell('\App\Libraries\Blocks::service_package_block', ['package' => $package, 'service_slug' => $service['service_slug']]) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php if (count($service['faqs'])) : ?>
    <section class="section-white" id="faqs">
        <div class="container pt-md-5 pt-sm-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>FREQUENTLY ASKED QUESTIONS</h4>
                    <h3><?= $service['service_faq_subtitle'] ?></h3>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-sm-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <?php foreach ($service['faqs'] as $faq) : ?>
                            <?php if ($faq['faq_status']) : ?>
                                <?= view_cell('\App\Libraries\Blocks::service_faq_block', ['faq' => $faq]) ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- <section class="section-grey medium-padding-bottom" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Our Blog</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="blog-item">
                    <div class="popup-wrapper">
                        <div class="popup-gallery">
                            <a href="#">
                                <img src="http://placehold.it/555x400" class="width-100" alt="pic">
                                <span class="eye-wrapper2"><i class="bi bi-link-45deg"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-item-inner">
                        <h3 class="blog-title"><a href="#">The Guide To LinkedIn Ads</a></h3>
                        <a href="#" class="blog-icons last"><i class="bi bi-card-text"></i> Marketing &amp; Design &#8212; 11
                            Min Read</a>
                        <p>Quis autem velis reprehender nets quiste voluptate velite estum quants etsamis sedit varias nets.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-item">
                    <div class="popup-wrapper">
                        <div class="popup-gallery">
                            <a href="#">
                                <img src="http://placehold.it/555x400" class="width-100" alt="pic">
                                <span class="eye-wrapper2"><i class="bi bi-link-45deg"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-item-inner">
                        <h3 class="blog-title"><a href="#">Affinity Designer Quick Start</a></h3>
                        <a href="#" class="blog-icons last"><i class="bi bi-play-circle"></i> SaaS Solutions &#8212; 25 Min
                            Watch</a>
                        <p>Quis autem velis reprehender nets quiste voluptate velite estum quants etsamis sedit varias nets.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-item">
                    <div class="popup-wrapper">
                        <div class="popup-gallery">
                            <a href="#">
                                <img src="http://placehold.it/555x400" class="width-100" alt="pic">
                                <span class="eye-wrapper2"><i class="bi bi-link-45deg"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-item-inner">
                        <h3 class="blog-title"><a href="#">Our Happy Team</a></h3>
                        <a href="#" class="blog-icons last"><i class="bi bi-mic"></i> Product Launch &#8212; 19 Min Listen</a>
                        <p>Quis autem velis reprehender nets quiste voluptate velite estum quants etsamis sedit varias nets.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<style>
    .queryAlert {
        display: none;
    }

    nav#service-navbar {
        top: 106px;
        box-shadow: 0px 10px 32px -13px rgb(0 0 0 / 50%) !important;
        z-index: 998;
    }

    @media all and (max-width: 992px) {
        nav#service-navbar {
            display: none;
        }
    }

    #service_navbar_nav>li>a {
        font-weight: 700;
    }

    .benefits-box {
        height: 100%;
        border: 0;
    }

    .documents-box {
        height: 100%;
        border: 0;
    }

    .currency-value::first-letter {
        font-size: 50% !important;
        margin-right: 10px;
    }

    #packages .price-box:hover {
        border-bottom: 3px solid #6d1311;
    }

    #packages ul.pricing-list {
        padding: 0 25px;
    }

    #service_getstarted_form {
        padding: 10px;
        box-shadow: rgb(33 33 33 / 6%) 0 4px 24px 5px;
    }
</style>

<?= $this->endSection(); ?>