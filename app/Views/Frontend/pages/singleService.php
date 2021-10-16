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
                        <input type="text" class="form-control" id="user_lastname" name="last_name" placeholder="Last name" aria-label="Last name" required>
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

<!-- service navigation -->
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
                <li class="nav-item">
                    <a class="nav-link" href="#anything-else">Anything Else?</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- service sections -->
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

<!-- anything else section -->
<section class="section-grey" id="anything-else">
    <div class="container pt-md-5 pt-sm-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="title-box text-center">
                    <h4>ANYTHING ELSE?</h4>
                    <h3>Please write us here</h3>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="pl-0 pl-lg-2 mt-4 card card-body">
                    <form method="post" action="">
                        <input name="form_name" class="d-none" value="another_request">
                        <input name="service_id" class="d-none" value="<?= $service['service_id'] ?>">
                        <input name="service_title" class="d-none" value="<?= $service['service_title'] ?>">
                        <?php if (session()->get('isUserLoggedin')) : ?>
                            <input name="user_id" class="d-none" value="<?= session()->get('user')['id'] ?>">
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input name="user_name" id="user_name" class="form-control" placeholder="Full Name" value="<?= session()->get('user') ? session()->get('user')['name'] : '' ?>" type="text" required>
                                    <label for="user_name">Full Name *</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input name="user_mobile" id="user_mobile" class="form-control" placeholder="Your Mobile" value="<?= session()->get('user') && session()->get('user')['phone_no'] ? session()->get('user')['phone_no'] : '' ?>" type="tel" required>
                                    <label for="user_mobile">Mobile *</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input name="user_email" id="user_email" class="form-control" placeholder="Valid Email" value="<?= session()->get('user') ? session()->get('user')['email'] : '' ?>" type="email" required>
                                    <label for="user_email">Email Address *</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input name="user_subject" id="user_subject" class="form-control" placeholder="Subject" type="text" required>
                                    <label for="user_subject">Subject *</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="user_message" id="user_message" style="min-height: 150px" required></textarea>
                                    <label for="user_message">Write your requirements here *</label>
                                </div>
                            </div>
                            <div class="col-12 mt-3 text-right">
                                <input id="submit" name="send" class="submitBnt btn btn-warning btn-round" value="Send Message" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

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
<?= $this->section('javascript'); ?>
<?php if ($flashData = session()->getFlashdata('service_anything_else_response')) : ?>
    <div class="toast-container position-absolute bottom-0 start-0 p-3">

        <div class="toast align-items-center text-white bg-<?= $flashData['class'] ?> border-0" role="alert" data-bs-autohide="false" aria-live="assertive" aria-atomic="true" id="messageToast">
            <div class="d-flex">
                <div class="toast-body">
                    <strong><?= $flashData['message'] ?></strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
    <script>
        var toastEl = document.getElementById('messageToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    </script>
<?php endif; ?>
<?= $this->endSection(); ?>