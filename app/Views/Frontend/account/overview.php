<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section section-grey">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Account Overview</h1>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header lsu h5">
                        My subscriptions
                    </div>
                    <div class="card-body">
                        <p class="card-text">You don't have any subscription yet.</p>
                        <div class="text-end">
                            <a type="button" href="<?= route_to('account_subscriptions') ?>" class="btn btn-warning text-dark btn-sm">View more subscription</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="row">
                    <?php foreach ($overview as $key => $card) : ?>
                        <div class="col-12">
                            <div class="card account-card mb-3 p-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col account-card-icon col-xs-12 text-center position-relative h-100 m-0 lsu bg-light p-2">
                                        <i class="bi bi-<?= $card['icon'] ?>">
                                        </i>
                                        <span class="position-absolute start-50 badge rounded-pill bg-warning text-dark">
                                            <?= $card['counts'] ?>
                                        </span>
                                    </div>
                                    <div class="col-md-9 col-xs-12">
                                        <div class="card-body pt-0 pb-0">
                                            <h5 class="card-title"><?= $card['title'] ?></h5>
                                            <p class="card-text"><small class="text-muted"><?= $card['content'] ?></small></p>
                                        </div>
                                    </div>
                                    <div class="col account-card-button col-xs-12 text-center">
                                        <a type="button" href="<?= $card['url'] ?>" class="btn btn-warning text-dark btn-sm">View</a>
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

<?= $this->endSection(); ?>