<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section" id="home">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <p class="hero-text">Business and legal consultant for Start-ups!</p>
        <h1>Let's connect to start and Scale your Start-up!</h1>
        <div class="">
          <form id="search-services-form" class="search_service search_service_wrapper" method="post" name="skjjdbfkshdfbs" autocomplete="sjdfvshgfvs">
            <input id="search_services" placeholder="search service here" type="text" name="sdkhfsjgfsjsk" autocomplete="dfbgjdhfvh">
            <div id="autoSuggestList">
              <ul id="suggestionList">
              </ul>
            </div>
          </form>
        </div>
        <div class="popular_services">
          <span>Popular: </span>
          <?php foreach ($random_services as $service) : ?>
            <a href="#" class="badge rounded-pill bg-warning text-dark"><?= $service['service_title'] ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?= $SITE_SETTINGS && $SITE_SETTINGS['site_home_image'] ? $SITE_SETTINGS['site_home_image'] : APP_HOME_IMAGE ?>" class="hero-image width-100 margin-top-20" alt="<?= APP_NAME ?>">
      </div>
    </div>
  </div>
</section>

<div hidden style="display:none;" id="searchservices"><?= json_encode($searchservices) ?></div>

<?php if (isset($services) && count($services)) : ?>
  <section class="section-grey medium-padding-bottom" id="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h4>POPULAR SERVICES</h4>
          <h2>Bouquet of highly preferred services by MSMEs</h2>
        </div>
      </div>
      <div class="row">
        <?php foreach ($services as $service) : ?>
          <div class="col-md-4 col-sm-12 mt-3">
            <?= view_cell('\App\Libraries\Blocks::service_short_block', ['service' => $service]) ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if (isset($clients) && count($clients)) : ?>
  <section class="section-white medium-padding-bottom" id="clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Our valuable clients</h2>
        </div>
      </div>
      <div class="row">
        <?php foreach ($clients as $key => $client) : ?>
          <div class="col-md-4">
            <?= view_cell('\App\Libraries\Blocks::client_post_block', ['client' => $client]) ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row mt-3">
        <div class="col mt-md-3 text-center">
          <a type="button" href="<?= route_to('clients_page') ?>" class="btn btn-warning px-5" style="line-height:2;padding-bottom:5px;">View All Clients <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if (isset($testimonials) && count($testimonials)) : ?>
  <section class="section-grey small-padding-bottom">
    <div class="container" style="overflow: hidden">
      <div class="row">
        <div class="col-md-12 mx-auto padding-top-10 padding-bottom-30">
          <div id="carouselTestimonials" class="carousel slide" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div> -->
            <div class="carousel-inner text-center">
              <?php foreach ($testimonials as $key => $testimonial) : ?>
                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                  <div class="row align-items-center testim-inner">
                    <div class="col-12 testim-info">
                      <i class="bi bi-chat-left-quote green"></i>
                      <p><?= $testimonial['testimonials_content'] ?></p>
                      <h6><?= $testimonial['testimonials_name'] ?><span> — <?= $testimonial['testimonials_post'] ?> <span class="red">@<?= $testimonial['testimonials_company'] ?></span></span></h6>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="section-white" id="how-it-works">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 col-sm-12">

        <h2>How It Works.</h2>

        <p>Quis autem velis ets reprehender net etid quiste netsum voluptate. Utise wisi enim minim veniam, quis
          etsad ets aspernatis netsum stationes nets qualitats.</p>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="testim-platform first">

              <p>LinkedIn</p>

              <div class="testim-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>

            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="testim-platform">

              <p>Upwork</p>

              <div class="testim-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <div class="accordion accordion-flush" id="accordionOne">

          <div class="accordion-item">

            <h2 class="accordion-header" id="headingOne">

              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="bi bi-pencil-fill"></i> Create Account
              </button>

            </h2>

            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionOne">

              <div class="accordion-body">
                This is the first item's accordion body. It is hidden by default, until the collapse plugin adds the
                appropriate classes that we use to style each element. These classes control the style.
              </div>

            </div>

          </div>

          <div class="accordion-item">

            <h2 class="accordion-header" id="headingTwo">

              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="bi bi-bar-chart-line-fill"></i> Choose Package
              </button>

            </h2>

            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">

              <div class="accordion-body">
                This is the first item's accordion body. It is hidden by default, until the collapse plugin adds the
                appropriate classes that we use to style each element. These classes control the style.
              </div>

            </div>

          </div>

          <div class="accordion-item">

            <h2 class="accordion-header" id="headingThree">

              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="bi bi-hand-thumbs-up-fill"></i> Enjoy Smart
              </button>

            </h2>

            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionOne">

              <div class="accordion-body">
                This is the first item's accordion body. It is hidden by default, until the collapse plugin adds the
                appropriate classes that we use to style each element. These classes control the style.
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php if (isset($blogs) && count($blogs)) : ?>
  <section class="section-grey medium-padding-bottom" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Helpful Resources</h2>
        </div>
      </div>
      <div class="row">
        <?php foreach ($blogs as $key => $post) : ?>
          <div class="col-md-4">
            <?= view_cell('\App\Libraries\Blocks::blog_post_block', ['post' => $post]) ?>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row mt-3">
        <div class="col mt-md-3 text-center">
          <a type="button" href="<?= route_to('blogs_page') ?>" class="btn btn-warning px-5" style="line-height:2;padding-bottom:5px;">Explore more <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<style>
  .circled_icon i {
    padding: 10px 14.5px;
    line-height: 50px;
    background-color: #800000;
    font-size: 25px;
    color: #ffffff !important;
    border-radius: 50%;
  }

  #homepageBlocks .main-services {
    height: 100%;
    margin-top: 0;
  }

  #homepageBlocks {
    margin-top: 40px;
  }

  #homepageBlocks p {
    color: #3d3d3d;
  }

  .testim-info {
    max-width: max-content;
    padding-left: 25px;
    padding-right: 25px;
  }

  #services .feature-box {
    height: 100%;
    margin-top: 0 !important;
  }

  #services .service_title>h4 {
    line-height: 1.1;
    position: absolute;
    max-width: 100%;
    bottom: 1px;
  }

  #services .service_title {
    position: relative;
    height: 42px;
  }

  #search-services-form {
    position: relative;
  }

  .currency-value::first-letter {
    font-size: 50% !important;
    margin-right: 10px;
  }

  #autoSuggestList {
    position: absolute;
    background: #fff;
    box-shadow: 0 14px 12px rgb(0 0 0 / 10%);
    display: none;
    width: 100%;
    padding: 5px;
    border-radius: 0 0 5px 5px;
  }

  ul#suggestionList li {
    text-align: left;
    padding: 3px;
    border-top: 0.5px #80808033 solid;
    color: #3d3d3d;
  }

  ul#suggestionList li a {
    color: #3d3d3d;
  }

  ul#suggestionList li:hover {
    background: cadetblue;
  }
</style>

<?= $this->endSection(); ?>