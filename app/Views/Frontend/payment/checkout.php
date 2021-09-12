<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section section-grey">

    <div class="container">

        <div class="row g-5">
            <div class="col-12">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="lsu">Your pruchase summary</span>
                    <!-- <span class="badge bg-primary rounded-pill">3</span> -->
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Basic price</h6>
                            <small class="text-muted">for <?= $service['service_title'] ?> - <?= $package['package_name'] ?></small>
                        </div>
                        <span class="text-muted currency"><?= number_to_currency($package['package_basic_price'], 'INR') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <small class="text-muted">Government Fees</small>
                        </div>
                        <span class="text-muted currency"><?= number_to_currency($package['package_gov_fee'], 'INR') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <small class="text-muted">Shipping Charged</small>
                        </div>
                        <span class="text-muted currency"><?= number_to_currency($package['package_shipping'], 'INR') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <small class="text-muted">Discount</small>
                        </div>
                        <span class="text-muted currency"><?= number_to_currency($package['package_discount'], 'INR') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <small class="text-muted">GST</small>
                        </div>
                        <span class="text-muted currency"><?= number_to_currency($package['package_gst'], 'INR') ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>
                            <h5 class="my-0">Total</h5>
                        </span>
                        <strong><?= number_to_currency($package['package_price'], 'INR') ?></strong>
                    </li>
                </ul>
                <div class="button-group d-flex">
                    <button class="w-100 btn btn-warning btn-lg m-2" id="rzp-button1" type="submit">Continue to checkout</button>
                    <a href="<?= route_to('account_orders') ?>" class="w-100 btn btn-light btn-lg m-2" type="submit">Back to orders</a>
                </div>
            </div>
        </div>
    </div>


</section>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<script>
    var razorKey = '<?= $SITE_SETTINGS['razorpay_api'] ?>';
    var description = '<?= $service['service_title'] ?> - <?= $package['package_name'] ?>';
    var checkoutAmount = <?= $order['total_amount'] ?> * 100;
    console.log(checkoutAmount);
    var options = {
        "key": razorKey,
        "amount": checkoutAmount,
        "currency": "INR",
        "name": '<?= $SITE_SETTINGS['site_name'] ?>',
        "description": "Payment for - " + description,
        "image": '<?= APP_LOGO ?>',
        "order_id": '<?= $order['online_order_id'] ?>',
        "callback_url":  window.location.href,
        // "handler": function(response) {
        //     $.ajax({
        //         url: window.location.href,
        //         data: response,
        //         processData: false,
        //         contentType: false,
        //         success: function(data, textStatus, jqXHR) {
        //             console.log(data);
        //             const res = JSON.parse(data);
        //             // window.location.reload();
        //             if (!res['status']) {
        //                 alert(res['reason']);
        //                 window.location.reload();
        //             } else {
        //                 window.location.href = "<?= route_to('order_invoice', $order['id']) ?>";
        //             }
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             alert("Something Wrong Please Try Again, please contact us for support.");
        //         },
        //     })
        // },
        "prefill": {
            "name": '<?= $user['name'] ?>',
            "email": '<?= $user['email'] ?>',
            "contact": '<?= $user['phone_no'] ?>'
        },
        "notes": {
            "user_id": '<?= $order['user_id'] ?>',
            "order_id": '<?= $order['id'] ?>',
            "service_id": '<?= $order['service_id'] ?>',
            "package_id": '<?= $order['package_id'] ?>',
            "unique_id": '<?= $order['unique_id'] ?>',
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        // console.log(response);
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
        alert('Your payment is not successful, please try again.');
    });
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
</script>
<?= $this->endSection(); ?>