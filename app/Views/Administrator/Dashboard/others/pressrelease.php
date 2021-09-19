<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title d-inline">Press Releases</h4>
                    <?php if ($releaseData['id'] !== 0) { ?>
                        <a type="button" href="<?= route_to('admin_press_release_index') ?>" class="btn btn-sm btn-primary float-right">
                            Add New
                        </a>
                    <?php } ?>
                    <?php if (isset($sessionData['serviceStatusMessage'])) : ?>
                        <div class="alert alert-icon alert-danger" role="alert">
                            <em class="icon ni ni-alert-circle"></em>
                            <strong>Failed.</strong> <?= $sessionData['serviceStatusMessage'] ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">Press Release</span></th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Created</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($releases as $release) : ?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col tb-col-mb">
                                                <span><?= $release['name'] ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span><?= date('d M Y', strtotime($release['created_at'])) ?></span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="<?= route_to('admin_press_release_edit', $release['id']) ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                    <li><a href="<?= route_to('admin_press_release_delete', $release['id']) ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card card-bordered card-full">
                        <div class="nk-wg1">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">
                                        <?php if ($releaseData['id'] == 0) {
                                            echo 'Add Press Release';
                                        } else {
                                            echo 'Edit Press Release';
                                        } ?>
                                    </h5>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data" id="faqAddEditForm">
                                    <div class="row g-4">
                                        <?php if (isset($errorMessage)) : ?>
                                            <div class="alert alert-icon alert-danger" role="alert">
                                                <em class="icon ni ni-alert-circle"></em>
                                                <strong>Failed.</strong> <?= $errorMessage ?>
                                            </div>
                                        <?php endif ?>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $releaseData['name'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="image">Image</label>
                                                <div id="serviceImageBlock">
                                                    <?php if (!empty($releaseData['image'])) : ?>
                                                        <img src="<?= $releaseData['image'] ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <?php if (!empty($releaseData['image'])) : ?>
                                                            <input type="file" multiple class="custom-file-input" id="customFile" name="image" onchange="previewServiceImage(this)">
                                                        <?php else : ?>
                                                            <input type="file" multiple class="custom-file-input" id="customFile" name="image" onchange="previewServiceImage(this)" required>
                                                        <?php endif; ?>
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="url">URL</label>
                                                <div class="form-control-wrap">
                                                    <input type="url" class="form-control" id="url" name="url" value="<?= $releaseData['url'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="status">Status</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option <?php if ($releaseData['status'] == 1) echo 'selected' ?> value="1">Active</option>
                                                        <option <?php if ($releaseData['status'] == 0) echo 'selected' ?> value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">
                                                    <?php if ($releaseData['id'] == 0) {
                                                        echo 'Add Press Release';
                                                    } else {
                                                        echo 'Update Press Release';
                                                    } ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Page Container END -->
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>

<script>
    var serviceImageBlock = $('#serviceImageBlock');

    function previewServiceImage(event) {
        var currentFile = event.files[0];
        console.log(currentFile)
        var imageData = URL.createObjectURL(currentFile);
        var imageSrc = '<img src="' + imageData + '">';
        serviceImageBlock.html(imageSrc);
    }
</script>
<?= $this->endSection() ?>