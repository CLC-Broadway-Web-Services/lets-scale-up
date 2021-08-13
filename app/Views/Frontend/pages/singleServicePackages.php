<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>

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


<?= $this->endSection() ?>