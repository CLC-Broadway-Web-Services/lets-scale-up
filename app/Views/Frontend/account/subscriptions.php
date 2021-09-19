<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section section-grey">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Orders</h1>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table datatable datatableSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">Order No</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Started</th>
                                        <th scope="col">Updated</th>
                                        <th scope="col">Application Number</th>
                                        <th scope="col">Application Status</th>
                                        <th scope="col text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allSubscriptions as $key => $subscription) : ?>
                                        <tr>
                                            <td><?= $subscription['unique_id'] ?></td>
                                            <td><?= $subscription['service_title'] ?></td>
                                            <td><?= $time::parse($subscription['created_at'])->toLocalizedString('MMM d, yyyy') ?></td>
                                            <td><?= $time::parse($subscription['updated_at'])->toLocalizedString('MMM d, yyyy') ?></td>
                                            <td><?= $subscription['application_number'] ?></td>
                                            <td><?= $subscription['application_status'] ?></td>
                                            <td>
                                                <?= $subscription['status'] ? '<a class="badge bg-success" title="View Subscription" href="' . route_to('single_subscription', $subscription['unique_id']) . '"><i class="bi bi-eye"></i> View</a>' : '<span class="badge bg-info text-dark">Completed</span>' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</section>

<?= $this->endSection(); ?>