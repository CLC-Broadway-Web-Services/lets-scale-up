<div class="feature-box">
    <div class="feature-content">
        <i class="bi bi-<?= $service_icon ?> lsu"></i>
        <div class="feature-box-text service_title">
            <h4><?= $service_title ?></h4>
        </div>
    </div>
    <div class="feature-footer">
        <p><?= $service_summary ?></p>
        <div class="feature-footer-content">
            <span><b class="currency-value"><?= number_to_currency($service_price, 'INR') ?></b> <small>(All Inclusive)</small></span>
            <a type="button" href="<?= route_to('service_detail', $service_slug) ?>" class="btn btn-warning">Get Started</a>
        </div>
    </div>
</div>