<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>

<!-- END HOME -->
<section class="bg-home mainAreaBackground" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="home-content">
                            <!-- <div class="home-badge">
                                    <p class="f-13"><span class="text-primary">70% Off</span> for first 3 month</p>
                                </div> -->
                            <h1 class="home-title"><?= $service['service_title'] ?></h1>
                            <p class="text-muted mt-3 f-20"> <?= $service['service_summary'] ?></p>
                            <!-- <div class="mt-5">
                                <a href="" class="btn btn-primary">Get Started <span class="text-white-50">- For
                                        Free</span> <i class="mdi mdi-arrow-right"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="media box-shadow bg-white p-4 rounded">
                            <div class="custom-form mt-3">
                                <div id="message"></div>
                                <form method="post" action="" name="serviceGetStarted" id="serviceGetStarted" action="javascript:void(0);">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <label class="contact-lable">First Name</label>
                                                <input name="user_firstname" id="user_firstname" class="form-control" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <label class="contact-lable">Last Name</label>
                                                <input name="user_lastname" id="user_lastname" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <label class="contact-lable">Mobile</label>
                                                <input name="user_mobile" id="user_mobile" class="form-control" type="tel" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mt-3">
                                                <label class="contact-lable">Email</label>
                                                <input name="user_email" id="user_email" class="form-control" type="email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mt-3">
                                            <span><span class="h3"></span></span>
                                            <button class="submitBnt btn btn-primary btn-round float-right" type="submit">Get Started <i class="mdi mdi-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <img src="/public/assets/images/features/img-2.png" class="img-fluid" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<!-- OVERVIEW -->
<section class="d-flex align-content-center flex-wrap">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center justify-content-center align-content-center">
                    <div class="col-lg-9 mb-5">
                        <div class="title-box text-center mt-5 pt-5">
                            <h6 class="title-sub-title mb-0 text-primary f-17">Overview</h6>
                            <p class="text-muted mt-3 f-20">
                                <?= html_entity_decode($service['service_overview']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- OVERVIEW -->

<!-- REQUIRED DOCS -->
<section class="section bg-light pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Documents</h6>
                    <h4 class="mt-3">Documents required for service - <?= $service['service_title'] ?></h4>
                </div>
                <div class="row">

                    <?php foreach ($service['docs'] as $doc) : ?>
                        <div class="col-lg-4 mt-2">
                            <div class="counter-box mt-4">
                                <div class="media box-shadow bg-white p-4 rounded">
                                    <div class="counter-icon mr-1 mt-1">
                                        <i class="mdi mdi-file text-primary h4"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h5 class="mt-2 mb-0 f-17"><?= $doc['document_title'] ?> </h5>
                                        <p class="text-muted mb-0 mt-2 f-15">
                                            <?= $doc['document_summary'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- REQUIRED DOCS -->

<!-- PACKAGES -->
<section class="section" id="pricing">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Choose Your Package</h6>
                    <h3 class="title-heading mt-4">Our flexible pricing options make it easy to get started.</h3>
                </div>
            </div>
        </div>

        <div class="row pt-4">

            <?php foreach ($service['packages'] as $key => $package) : ?>
                <div class="col-lg-4">
                    <div class="pricing-box mt-4 rounded <?php if ($package['package_isSpecial']) echo 'border border-primary' ?>">
                        <div class="pricing-content">
                            <?php if ($package['package_isSpecial']) : ?>
                                <div class="pricing-lable">Popular</div>
                            <?php endif; ?>
                            <h6 class="text-uppercase"><?= $package['package_name'] ?></h6>
                            <hr>
                            <div class="pricing-plan mt-4 text-primary text-center">
                                <h1><sup class="text-muted"><i class="mdi mdi-currency-inr"></i> </sup><?= number_format($package['package_price']) ?> </h1>
                            </div>
                            <hr>

                            <div class="pricing-features pt-1">
                                <?= $package['package_details'] ?>
                            </div>
                            <div class="mb-3 pt-2 text-center">
                                <a href="/service/<?= $service['service_slug'] ?>/packages/<?= $package['package_id'] ?>" class="btn btn-primary btn-round">Select Package</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>
<!-- PACKAGES -->

<!-- FREQUENTLY ASKED QUESTIONS -->
<section class="section" id="team">
    <div class="container">
        <div class="row align-items-center justify-content-center align-content-center">
            <div class="col-9">
                <div class="title-box text-center mt-5 pt-5">
                    <h6 class="title-sub-title mb-0 text-primary f-17">Frequently Asked Questions</h6>
                    <h4 class="title-heading mt-4">All You Need to Know Before Applying for <br><?= $service['service_title'] ?></h4>
                </div>
            </div>
            <div class="accordion" id="faqList" style="width: 100%; max-width:900px;margin:auto;">

                <?php foreach ($service['faqs'] as $key => $faq) : ?>
                    <div class="card">
                        <div class="card-header" id="heading<?= $key ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq<?= $key ?>" aria-expanded="true" aria-controls="faq<?= $key ?>">
                                    <?= $faq['faq_title'] ?>
                                    <i class="mdi mdi-plus-circle-outline text-primary float-right"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="faq<?= $key ?>" class="collapse" aria-labelledby="<?= $key ?>" data-parent="#faqList">
                            <div class="card-body">
                                <?= $faq['faq_content'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
<!-- FREQUENTLY ASKED QUESTIONS -->

<?= $this->endSection() ?>