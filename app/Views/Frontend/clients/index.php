<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>


<section class="home-section section-grey" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-9">
                        <div class="home-content text-center">
                            <h1>
                                Our valuable clients
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-white" id="blog">
    <div class="container">
        <div class="row mt-4">

            <?php foreach ($clients as $client) : ?>
                <div class="col-md-4 mt-4">
                <?= view_cell('\App\Libraries\Blocks::client_post_block', ['client' => $client]) ?>
                </div>
            <?php endforeach ?>

        </div>
        <div class="row mt-3 align-items-center justify-content-center text-right">
            <?= $pager->links() ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>