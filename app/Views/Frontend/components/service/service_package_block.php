<div class="price-box">
    <?php if ($package['package_isSpecial']) : ?>
        <div class="ribbon blue"><span>Exclusive</span></div>
    <?php endif; ?>
    <ul class="pricing-list">
        <li class="price-title"><?= $package['package_name'] ?></li>
        <li class="price-value currency-value"><?= number_to_currency($package['package_price'], 'INR') ?></li>
        <!-- <li class="price-subtitle">Per Month</li> -->
        <!-- <li class="price-text strong">
                                    <i class="bi bi-check-circle-fill lsu"></i>
                                    <strong>All Basic features</strong>
                                </li> -->
        <?php foreach ($package['package_details'] as $key => $package_detail) : ?>
            <li class="price-text">
                <i class="bi bi-check-circle-fill lsu"></i>
                <small><?= $package_detail ?></small>
            </li>
        <?php endforeach; ?>

        <!-- <li class="price-tag">
                                    <a href="#">FREE 15-DAY TRIAL</a>
                                </li> -->
    </ul>
    <a type="button" href="<?= route_to('service_selected_package', $service['service_slug'], $package['package_id']) ?>" class="btn btn-warning">
        Get Started
    </a>
</div>