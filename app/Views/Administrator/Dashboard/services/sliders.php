<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <a href="<?= route_to('admin_service_slider_add') ?>" class="btn btn-primary btn-sm float-right">Add Slide</a>
                    <h4 class="nk-block-title d-inline">Slides</h4>
                    <?php if (isset($sessionData['serviceStatusMessage'])) : ?>
                        <div class="alert alert-icon alert-danger" role="alert">
                            <em class="icon ni ni-alert-circle"></em>
                            <strong>Failed.</strong> <?= $sessionData['serviceStatusMessage'] ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Slide</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Data</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($slides as $slide) : ?>
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead"><?= $slide['category'] ?></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <img src="<?= $slide['image'] ?>" style="max-width:170px;">
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead"><?= $slide['title'] ?></span><br>
                                        <span><?= $slide['content'] ?></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md" data-order="Active - Not Active">
                                        <?php if ($slide['status'] == 1) { ?>
                                            <span class="tb-status text-success">Active</span>
                                        <?php } else { ?>
                                            <span class="tb-status text-danger">Not Active</span>
                                        <?php } ?>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <a href="<?= route_to('admin_service_slider_edit', $slide['id']) ?>"><em class="icon ni ni-edit"></em></a>
                                        <a href="<?= route_to('admin_service_slider_status', $slide['id']) ?>"><em class="icon ni ni-repeat"></em></a>
                                        <a href="<?= route_to('admin_service_slider_delete', $slide['id']) ?>"><em class="icon ni ni-trash"></em></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- .card-preview -->
        </div>
    </div>
</div>


<!-- Page Container END -->
<?= $this->endSection() ?>