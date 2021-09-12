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
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($documents as $key => $document) : ?>
                                        <tr>
                                            <td><?= $order['unique_id'] ?></td>
                                            <td><?= $order['service_title'] ?></td>
                                            <td><?= $order['created_at'] ?></td>
                                            <td><?= $order['status_name'] == 'created' ? '<span class="badge bg-warning text-dark">Pending</span>' : ($order['status_name'] == 'failed' ? '<span class="badge bg-danger">Failed</span>' : '<span class="badge bg-success">Completed</span>') ?></td>
                                            <td>View</td>
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

