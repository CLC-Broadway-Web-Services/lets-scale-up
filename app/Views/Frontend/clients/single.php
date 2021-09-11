<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>

<section class="home-section section-white" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="home-content">
                            <?php if (isset($client['category_name'])) : ?>
                                <p class="badge rounded-pill bg-primary"><?= $client['category_name'] ?></p>
                            <?php endif; ?>
                            <h1 class="home-title"><?= $client['name'] ?></h1>
                            <p class="text-muted mt-3 f-20"> <?= html_entity_decode($client['summary']) ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="home-img">
                            <img src="<?= $client['image'] ?>" class="img-fluid" alt="<?= $client['name'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->

<section class="section-grey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="postContent mt-4">
                    <?= html_entity_decode($client['description']) ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MAIN CONTENT -->
<!-- <section class="section pt-5"> -->
<div class="row nextPreviousContainer">
    <div class="col-6">
        <?php if ($client['previousProject']) : ?>
            <a href="<?= route_to('single_client_page', $client['previousProject']['slug']) ?>" class="customNextPrevious"><i class="mdi mdi-arrow-left"></i> Previous</a>
        <?php endif; ?>
    </div>
    <div class="col-6 text-end">
        <?php if ($client['nextProject']) : ?>
            <a href="<?= route_to('single_client_page', $client['nextProject']['slug']) ?>" class="customNextPrevious">Next <i class="mdi mdi-arrow-right"></i></a>
        <?php endif; ?>
    </div>
</div>
<!-- </section> -->


<style>
    .nextPreviousContainer {
        margin-left: 0;
        margin-right: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .postContent {
        max-width: 800px;
        margin: 0 auto;
    }

    .nextPreviousContainer .col-6 {
        padding: 1%;
        background: #ffffff;
    }

    .nextPreviousContainer .col-6:hover {
        background: #800000;
    }

    .nextPreviousContainer .col-6:hover a {
        color: #ffffff;
    }

    .nextPreviousContainer .col-6 a {
        color: #800000;
        width: 100%;
        display: block;
    }
</style>



<?= $this->endSection() ?>