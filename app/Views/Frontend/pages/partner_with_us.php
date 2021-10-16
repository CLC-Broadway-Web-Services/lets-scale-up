<?= $this->extend('Frontend/layouts/main') ?>

<?= $this->section('content') ?>


<?= view_cell('\App\Libraries\Blocks::page_breadcrumb_block', ['pagedata' => $pagedata]) ?>

<section class="section-white" style="padding-top:40px;">
    <div class="container">

        <?php if (isset($statusMessage)) : ?>
            <div class="alert alert-<?= $statusMessage['class'] ?> alert-dismissible fade show" role="alert">
                <?= $statusMessage['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="pl-0 pl-lg-2 mt-4">
                    <p>You can be a part of Lets Scale Up Partner Program and benefit from our professional client centric approach where we work relentlessly to help our clients setup, operate, manage & grow their businesses.</p>
                    <p>Please fill in the following details and we will contact you within 1 business day:</p>
                    <!-- <h5 class="f-18">Send a Message</h5> -->

                    <div class="mt-3">
                        <div id="partnerFormMessage"></div>
                        <form method="post" action="" id="partnerForm">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input name="name" id="partner_name" class="form-control" placeholder="Full Name" type="text" required>
                                        <label for="partner_name">Your Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input name="email" id="partner_email" class="form-control" placeholder="" type="email" required>
                                        <label for="partner_email">Email Address *</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input name="organization" id="partner_company" class="form-control" placeholder="Organization Name" type="text" required>
                                        <label for="partner_company">Organization Name *</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input name="city" id="partner_city" class="form-control" placeholder="City" type="text">
                                        <label for="partner_city">City</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input name="mobile" id="partner_mobile" class="form-control" placeholder="" type="tel" required>
                                        <label for="partner_mobile">Mobile *</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="message" id="partner_message" style="min-height: 150px" required></textarea>
                                        <label for="partner_message">Your Message *</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="expertise">Expertise *</label>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="ROC_Liaison_work" id="ROC_Liaison_work">
                                                <label class="form-check-label" for="ROC_Liaison_work">
                                                    ROC Liaison work
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="GST_Registration" id="GST_Registration">
                                                <label class="form-check-label" for="GST_Registration">
                                                    GST Registration
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="GST_Return_Filing" id="GST_Return_Filing">
                                                <label class="form-check-label" for="GST_Return_Filing">
                                                    GST Return Filing
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="Shop_Establishment_Registrations" id="Shop_Establishment_Registrations">
                                                <label class="form-check-label" for="Shop_Establishment_Registrations">
                                                    Shop Establishment Registrations
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="Professional_Tax_Registration" id="Professional_Tax_Registration">
                                                <label class="form-check-label" for="Professional_Tax_Registration">
                                                    Professional Tax Registration
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="IEC_Code_Allotment" id="IEC_Code_Allotment">
                                                <label class="form-check-label" for="IEC_Code_Allotment">
                                                    IEC Code Allotment
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="Registration_of_Partnership_Deed_with_Registrar_of_Firms_(ROF)" id="Registration_of_Partnership_Deed_with_Registrar_of_Firms_(ROF)">
                                                <label class="form-check-label" for="Registration_of_Partnership_Deed_with_Registrar_of_Firms_(ROF)">
                                                    Registration of Partnership Deed with Registrar of Firms (ROF)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="MSME_Application" id="MSME_Application">
                                                <label class="form-check-label" for="MSME_Application">
                                                    MSME Application
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="Independent_Legal_Services_(Opinions_on_and_Drafting_of_Legal_Documents)" id="Independent_Legal_Services_(Opinions_on_and_Drafting_of_Legal_Documents)">
                                                <label class="form-check-label" for="Independent_Legal_Services_(Opinions_on_and_Drafting_of_Legal_Documents)">
                                                    Independent Legal Services (Opinions on and Drafting of Legal Documents)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="expertise[]" value="Trademark,_Copyright_or_Patent_Registration" id="Trademark,_Copyright_or_Patent_Registration">
                                                <label class="form-check-label" for="Trademark,_Copyright_or_Patent_Registration">
                                                    Trademark, Copyright or Patent Registration
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-right">
                                    <button class="submitBnt btn btn-warning btn-round">Submit</button>
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