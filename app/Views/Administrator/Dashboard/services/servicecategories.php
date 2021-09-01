<?= $this->extend('Administrator/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Container START -->

<div class="nk-content-wrap">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Service Categories</h4>
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
                                        <th class="nk-tb-col"><span class="sub-text">Parent</span></th>
                                        <th class="nk-tb-col tb-col-xl"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col tb-col-mb">
                                                <?php if ($category['parent'] === '0') : ?>
                                                    <span class="text-primary"><b><?= $category['name'] ?></b></span>
                                                <?php else : ?>
                                                    <span><b><?= $category['parent_name'] ?></b></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="nk-tb-col tb-col-xl">
                                                <span><?= $category['name'] ?></span>
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="/administrator/service/categories/<?= $category['id'] ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                    <li><a href="/administrator/service/categories/delete/<?= $category['id'] ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
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
                                                <label class="form-label" for="name">Category Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $catData['name'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (count($parentCategories) > 0) : ?>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Parent</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-control" name="parent" required>
                                                            <option <?php if ($catData['parent'] === 0) echo 'selected' ?> value="0">Select Parent</option>
                                                            <?php foreach ($parentCategories as $cat) : ?>
                                                                <option <?php if ($cat['id'] === $catData['parent']) echo 'selected' ?> value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <input hidden type="number" name="parent" value="0">
                                        <?php endif; ?>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="title">Title</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="title" name="title" value="<?= $catData['title'] ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="subtitle">Sub Title</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= $catData['subtitle'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="description">Description</label>
                                                <div class="form-control-wrap">
                                                    <textarea type="text" class="form-control" id="description" name="description"><?= $catData['description'] ?></textarea>
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