<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Partner Queries </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col">#</th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Expertise</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">User Details</span></th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Created</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($queries as $key => $query) : ?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col tb-col-mb">
                                                <span><?= $key + 1 ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <?php $totalExpertise = count(json_decode($query['expertise']));
                                                foreach (json_decode($query['expertise']) as $key => $expertise) { ?>
                                                    <span><?= str_replace("_", " ", $expertise) ?></span><br>
                                                <?php } ?>
                                                <h6>Message</h6>
                                                <span><?= $query['message'] ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <span><?= $query['name'] ?></span>, <span><?= $query['mobile'] ?></span><br>
                                                <span><?= $query['email'] ?></span><br>
                                                <span><?= $query['organization'] ?></span>, <span><?= $query['city'] ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span><?= date('d M Y', strtotime($query['created_at'])) ?></span>
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
</div>


<!-- Page Container END -->
<?= $this->endSection() ?>