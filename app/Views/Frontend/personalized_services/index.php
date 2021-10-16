<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>For <?= $service['title'] ?></h3>
                <h1 class="display-3 sub_title"><?= $service['sub_title'] ?></h1>
                <div class="sub_content">
                    <?= $service['sub_content'] ?>
                </div>
            </div>
            <div class="col-md-6">
                <img class="service_image" src="<?= $service['image'] ?>">
            </div>
        </div>
    </div>
</section>

<?php if (isset($service['services']) && count($service['services'])) : ?>
    <section class="section-grey medium-padding-bottom" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- <h4>POPULAR SERVICES</h4> -->
                    <h2>SERVICES</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($service['services'] as $service) : ?>
                    <div class="col-md-4 col-sm-12 mt-3">
                        <div class="feature-box">
                            <div class="feature-content">
                                <i class="bi bi-<?= $service['service_icon'] ?> lsu"></i>
                                <div class="feature-box-text service_title">
                                    <h4><?= $service['service_title'] ?></h4>
                                </div>
                            </div>
                            <div class="feature-footer">
                                <p><?= $service['service_summary'] ?></p>
                                <div class="feature-footer-content">
                                    <a type="button" href="<?= route_to('service_detail', $service['service_slug']) ?>" class="btn btn-warning mb-3">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .service_image {
        max-width: 100%;
    }

    .sub_title {
        font-weight: 700;
    }

    .sub_content ul li {
        font-size: 18px;
        line-height: 30px;
    }

    .sub_content ul li::before {
        display: inline-block;
        content: " ";
        vertical-align: -.125em;
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-circle' viewBox='0 0 16 16'><path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z'/><path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z'/></svg>");
        background-repeat: no-repeat;
        background-size: 1rem 1rem;
        height: 1rem;
        width: 1.4rem;
    }
</style>
<?= $this->endSection(); ?>