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
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">User Details</span></th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Query</span></th>
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
                                                <span><?= $query->user_name ?></span><br>
                                                <span><?= $query->user_mobile ?></span><br>
                                                <span><?= $query->user_email ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb">
                                                <b>Service:-</b> <span><?= $query->service_title ?></span><br>   
                                                <b>Subject:-</b> <span><?= $query->user_subject ?></span><hr>                                                
                                                <span><?= $query->user_message ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span><?= date('d M Y / g:s:a', strtotime($query->created_at)) ?></span>
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