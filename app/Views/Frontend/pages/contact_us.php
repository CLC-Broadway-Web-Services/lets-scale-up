<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>


<?= view_cell('\App\Libraries\Blocks::page_breadcrumb_block', ['pagedata' => $pagedata]) ?>

<section class="section-white">
    <div class="container">

        <?php if (isset($statusMessage)) : ?>
            <div class="alert alert-<?= $statusMessage['class'] ?> alert-dismissible fade show" role="alert">
                <?= $statusMessage['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-4">
                <div class="pl-0 pl-lg-2 mt-4">
                    <h5 class="f-18">Contact Details</h5>
                    <div class="mt-4 bg-light p-4 rounded">
                        <div class="media">
                            <i class="pe-7s-home h4"></i>
                            <div class="media-body pl-3">
                                <h5 class="mt-0 f-17">Address</h5>
                                <p class="text-muted mb-0"><?= ADDRESS ?></p>
                            </div>
                        </div>

                        <div class="mt-4 pt-1">
                            <div class="media">
                                <i class="pe-7s-mail-open-file h4"></i>
                                <div class="media-body pl-3">
                                    <h5 class="mt-0 f-17">Email Us</h5>
                                    <p class="text-muted mb-0"><?= INFO_MAIL ?></p>
                                    <p class="text-muted mb-0"><?= GMAIL ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="pl-0 pl-lg-2 mt-4">
                    <h5 class="f-18">Send a Message</h5>

                    <div class="mt-3">
                        <div id="message"></div>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input name="user_name" id="user_name" class="form-control" placeholder="" type="text" required>
                                        <label for="user_name">Full Name *</label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input name="user_mobile" id="user_mobile" class="form-control" placeholder="" type="tel" required>
                                        <label for="user_mobile">Mobile *</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input name="user_email" id="user_email" class="form-control" placeholder="" type="email" required>
                                        <label for="user_email">Email Address *</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input name="user_subject" id="user_subject" class="form-control" placeholder="" type="text" required>
                                        <label for="user_subject">Subject *</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="user_message" id="user_message" style="min-height: 150px" required></textarea>
                                        <label for="user_message">Your Message *</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-right">
                                    <input id="submit" name="send" class="submitBnt btn btn-warning btn-round" value="Send Message" type="submit">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .postContent {
        max-width: 800px;
        margin: 0 auto;
    }
</style>

<?= $this->endSection() ?>