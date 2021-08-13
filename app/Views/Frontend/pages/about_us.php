<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>


<?= view_cell('\App\Libraries\Pages::breadcrumb', ['pagedata' => $pagedata]); ?>


<!-- MAIN CONTENT -->
<section class="section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box text-center postContent">
                    <h6 class="customTitles text-primary f-17">Lets Scale <span>Up</span></h6>
                    <h3 class="customTitles text-primary">WHO <span>WE</span> ARE?</h3>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        LSU is making startup journey simple for young founders and ventures.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        LSU is a one stop destination for all startup related services. LSU understands the product, marketing, legal, IPR and fundraising requirements of a startup and helps them to achieve these goals through its startup and legal consultancies.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        LSU is currently working with more than 50+ Startups in the domain of edtech, fintech, drones,property management etc.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Some of it's startup like Probano, olivecoestate, almspay have raised funding and are also featured in many national publication.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        The motto of LSU is to help startups build successful ventures. We at LSU promise that we won't let processes hinder potential and passion.
                    </p>

                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Who can benefit from business and Legal consulting services? Whether you want to start a Start-up as an entrepreneur or a new business, optimize your existing business and startup, or grow them with more success, LSU consultants provide insights services and help start-ups to achieve desired business goals.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Our business, startups and Legal consulting services assist clients to maximize their efforts, creating measurable business values and results. LSU assists clients with a powerful combination of business and legal consulting services and capabilities, to cut through the complexities of business and legal challenges faced by them.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Our business and Legal consulting services help clients to gain a better understanding to take the right steps, measure and manage business and legal resources and investments to drive real start-up value. LSU business and Legal consultants help clients by providing them with mentors, business and Start-ups education, Pitch-deck, IPR services, Business Setup plans, Finance, and much more.
                    </p>
                    <p class="text-muted mt-4" style="max-width:850px; margin:auto;">
                        Most business entrepreneurs in the world have a coach or consultant in one form or another. From sports athletes to business leaders and politicians, successful people know that having someone they trust, who provides quality advice is necessary to achieve peak business performance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MAIN CONTENT -->

<style>
    .postContent {
        max-width: 800px;
        margin: 0 auto;
    }
</style>

<?= $this->endSection(); ?>