<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>
<style>
    @media (max-width: 1001px) {
        section.home-section.section-white {
            padding-top: 91px !important;
        }
    }

    section.home-section.section-white {
        padding-top: 107px;
        padding-bottom: 0;
    }

    img.category_slide {
        width: 100%;
    }
</style>

<?php if (count($category['slides'])) : ?>
    <section class="home-section section-white">
        <!-- <div class="home-center"> -->
        <?php if (count($category['slides']) == 1) : ?>
            <img src="<?= $category['slides'][0]['image'] ?>" class="category_slide">
        <?php else : ?>
            <div class="splide" id="serviceSlider">
                <div class="splide__track">
                    <div class="splide__list">
                        <?php foreach ($category['slides'] as $key => $slide) : ?>
                            <img src="<?= $slide['image'] ?>" class="category_slide splide__slide">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- </div> -->
    </section>
<?php endif; ?>
<section class="section-white small-padding-bottom <?php if (count($category['slides'])) echo 'pt-0' ?>">
    <div class="container pt-5">
        <div class="row align-items-center text-center">
            <div class="col-12">
                <h2><?= $category['title'] ? $category['title'] : $category['name'] ?></h2>
                <?php if ($category['subtitle']) : ?>
                    <h4><?= $category['subtitle'] ?></h4>
                <?php endif; ?>
                <?php if ($category['description']) : ?>
                    <p><?= $category['description'] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php foreach ($category['child'] as $key => $child) : ?>
    <?php if (count($child['services']) > 0) : ?>
        <section class="section-grey medium-padding-bottom" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2><?= $child['title'] ? $child['title'] : $child['name'] ?></h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($child['services'] as $key => $service) : ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card text-center category-service-card">
                                <div class="card-body">
                                    <h4><?= $service['service_title'] ?></h4>
                                    <p><?= $service['service_summary'] ?></p>
                                    <a type="button" class="btn btn-warning" href="<?= route_to('service_detail', $service['service_slug']) ?>">Get Started</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    <?php endif; ?>
<?php endforeach; ?>

<?php if (count($category['faqs']) > 0) : ?>
    <section class="section-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Common Questions</h2>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-sm-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <?php foreach ($category['faqs'] as $key => $faq) : ?>
                            <?php if ($faq['faq_status']) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading_<?= $faq['faq_id'] ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_<?= $faq['faq_id'] ?>" aria-expanded="false" aria-controls="flush-collapse_<?= $faq['faq_id'] ?>">
                                            <?= $faq['faq_title'] ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse_<?= $faq['faq_id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading_<?= $faq['faq_id'] ?>" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?= html_entity_decode($faq['faq_content']) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .category-service-card {
        border: 0;
        height: 100%;
    }

    .category-service-card p {
        color: #3d3d3d;
        font-size: 13px;
    }
</style>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script>
    new Splide('#serviceSlider', {
        autoplay: true,
        interval: 3000,
        perPage: 1,
        arrows: false,
        type: 'loop',
        pagination: false
    }).mount();
</script>
<?= $this->endSection(); ?>