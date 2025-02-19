<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Initiative Categories</h4>
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
                                        <th class="nk-tb-col"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Created</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col tb-col-mb">
                                                <span><?= $category['name'] ?></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span><?= date('d M Y', strtotime($category['created_at'])) ?></span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <a href="/administrator/initiatives/categories/<?= $category['id'] ?>"><em class="icon ni ni-edit"></em></a>
                                                <a href="/administrator/initiatives/categories/delete/<?= $category['id'] ?>"><em class="icon ni ni-trash"></em></a>
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
                                        <?php if ($catData['id'] == 0) {
                                            echo 'Add Category';
                                        } else {
                                            echo 'Edit Category';
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
                                                <label class="form-label" for="name">Category</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $catData['name'] ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">
                                                    <?php if ($catData['id'] == 0) {
                                                        echo 'Add Category';
                                                    } else {
                                                        echo 'Update Category';
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