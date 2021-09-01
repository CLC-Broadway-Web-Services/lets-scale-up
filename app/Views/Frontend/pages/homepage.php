<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<!--begin home banner section -->
<section class="home-section" id="home">
  <div class="home-section-overlay"></div>
  <div class="container home-wrapper">
    <div class="row align-items-center">
      <div class="col-md-8 mx-auto text-center">
        <p class="hero-text">Business and legal consultant for Start-ups!</p>
        <h1>Let's connect to start and Scale your Start-up!</h1>
        <div class="">
          <form id="search-services-form" class="search_service search_service_wrapper" method="post">
            <input id="search_services" placeholder="search service here" type="text" list="allserviceslist">
            <datalist id="allserviceslist">
              <?php foreach ($searchservices as $service) : ?>
                <option value="<?= $service['service_title'] ?>" onclick="onClickDataList('<?= $service['service_slug'] ?>')"></option>
              <?php endforeach; ?>
            </datalist>
          </form>
        </div>
        <div class="popular_services">
          <span>Popular: </span>
          <?php foreach ($radom_services as $service) : ?>
            <a href="#" class="badge rounded-pill bg-warning text-dark"><?= $service['service_title'] ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="row" id="homepageBlocks">
      <div class="col-md-4">
        <div class="main-services">
          <i class="bi bi-megaphone green"></i>
          <h4>Legal</h4>
          <p>Your documents, contracts, and registrations handled by expert lawyers.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="main-services">
          <i class="bi bi-gem red"></i>
          <h4>Tax</h4>
          <p>Filing returns and paying your taxes – made easier for you.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="main-services">
          <i class="bi bi-speedometer2 blue"></i>
          <h4>Compliance</h4>
          <p>Our chartered accountants & company secretaries will keep your books in order.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--end home banner section -->

<!--begin testimonials section -->
<section class="section-grey small-padding-bottom">

  <!--begin container -->
  <div class="container" style="overflow: hidden">

    <!--begin row -->
    <div class="row">

      <!--begin col md 12 -->
      <div class="col-md-12 mx-auto padding-top-10 padding-bottom-30">

        <!--begin testimonials carousel -->
        <div id="carouselTestimonials" class="carousel slide" data-bs-ride="carousel">

          <!--begin carousel-indicators -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <!--end carousel-indicators -->

          <!--begin carousel-inner -->
          <div class="carousel-inner text-center">
            
            <!--start carousel-item -->
            <div class="carousel-item active">
              <div class="row align-items-center testim-inner">
                <div class="col-12 testim-info">
                  <i class="bi bi-chat-left-quote green"></i>
                  <p>Nemo enimat ipsam voluptatem quia voluptas situm ets aspernatis netsum loris fugit, sed quia
                    magnitus honoratis quis ratione sequi etum nets.</p>
                  <h6>Jennifer Smith<span> — Designer <span class="red">@EpicThemes</span></span></h6>
                </div>
              </div>
            </div>
            <!--end carousel-item -->

          </div>
          <!--end carousel-inner -->

        </div>
        <!--end testimonials carousel -->

      </div>
      <!--end col md 12-->

    </div>
    <!--end row -->

  </div>
  <!--end container -->

</section>
<!--end testimonials section -->

<!--begin section-grey -->
<section class="section-grey small-padding-top">

  <!--begin container -->
  <div class="container">

    <!--begin row -->
    <div class="row">

      <!--begin col-md-12 -->
      <div class="col-md-12 text-center padding-bottom-20">

        <h3>Trusted By Over 9,000+ Businesses</h3>

      </div>
      <!--end col-md-12 -->

    </div>
    <!--end row -->

    <!--begin row -->
    <div class="row justify-content-center">

      <!--begin col-md-1 -->
      <div class="col-md-1"></div>
      <!--end col-md-1 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-1 -->
      <div class="col-md-1 d-none d-md-block"></div>
      <!--end col-md-1 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

      <!--begin col-md-2 -->
      <div class="col-md-2 col-xs-6">

        <div class="our-partners">

          <img src="http://placehold.it/316x95" class="width-100" alt="pic">

        </div>

      </div>
      <!--end col-md-2 -->

    </div>
    <!--end row -->

  </div>
  <!--end container -->

</section>
<!--end section-grey -->

<!--begin section-white -->
<section class="section-white">

  <!--begin container-->
  <div class="container">

    <!--begin row-->
    <div class="row align-items-center">

      <!--begin col-md-6-->
      <div class="col-md-6">

        <h3>Discover how we can help you to grow your business fast.</h3>

        <p>Anticas quia voluptas sit aspernatur netsum demo ets ipsam voluptatem lorem fugit, seditum netis velas
          net nesciunt.</p>

        <ul class="benefits">
          <li><i class="bi bi-check blue"></i>Quias netus magni netsum qui ratione sequi.</li>
          <li><i class="bi bi-check blue"></i>Venis ratione sequi netus enim tempor magni.</li>
          <li><i class="bi bi-check blue"></i>Enim ipsam netus voluptatem voluptas.</li>
        </ul>

        <a href="#" class="scrool"><button type="button" class="btn btn-lg btn-primary">Discover More</button></a>

      </div>
      <!--end col-md-6-->

      <!--begin col-md-6-->
      <div class="col-md-6">

        <img src="http://placehold.it/555x461" class="width-100 responsive-top-margins" alt="pic">

      </div>
      <!--end col-sm-6-->

    </div>
    <!--end row-->

  </div>
  <!--end container-->

</section>
<!--end section-white-->

<!--begin fun-facts -->
<section class="section-grey medium-padding-bottom">

  <!--begin container-->
  <div class="container">

    <!--begin row-->
    <div class="row">

      <!--begin col md 7 -->
      <div class="col-md-7 mx-auto margin-bottom-10 text-center">

        <h3>Fun Facts About Our Agency</h3>

      </div>
      <!--end col md 7-->

    </div>
    <!--end row-->

    <!--begin row-->
    <div class="row">

      <!--begin fun-facts-box -->
      <div class="col-md-2 offset-md-1 fun-facts-box blue text-center">

        <i class="bi bi-gift-fill"></i>

        <p class="fun-facts-title"><span class="facts-numbers">1050+</span><br>Projects Completed</p>

      </div>
      <!--end fun-facts-box -->

      <!--begin fun-facts-box -->
      <div class="col-md-2 fun-facts-box red text-center">

        <i class="bi bi-heart-fill"></i>

        <p class="fun-facts-title"><span class="facts-numbers">217k</span><br>Happy Clients</p>

      </div>
      <!--end fun-facts-box -->

      <!--begin fun-facts-box -->
      <div class="col-md-2 fun-facts-box green text-center">

        <i class="bi bi-award-fill"></i>

        <p class="fun-facts-title"><span class="facts-numbers">1210</span><br>Design Awards</p>

      </div>
      <!--end fun-facts-box -->

      <!--begin fun-facts-box -->
      <div class="col-md-2 fun-facts-box red text-center">

        <i class="bi bi-basket3-fill"></i>

        <p class="fun-facts-title"><span class="facts-numbers">217k</span><br>Happy Clients</p>

      </div>
      <!--end fun-facts-box -->

      <!--begin fun-facts-box -->
      <div class="col-md-2 fun-facts-box yellow text-center">

        <i class="bi bi-bell-fill"></i>

        <p class="fun-facts-title"><span class="facts-numbers">2137</span><br>Line Of Codes</p>

      </div>
      <!--end fun-facts-box -->

    </div>
    <!--end row-->

  </div>
  <!--end container-->

</section>
<!--end fun-facts -->

<!--begin team section -->
<section class="section-white medium-padding-bottom" id="team">

  <!--begin container-->
  <div class="container">

    <!--begin row-->
    <div class="row">

      <!--begin col-md-12 -->
      <div class="col-md-12 text-center">

        <h2>Meet Our Team</h2>

      </div>
      <!--end col-md-12 -->

      <!--begin team-item -->
      <div class="col-sm-12 col-md-4 margin-top-30">

        <img src="http://placehold.it/555x555" class="team-img width-100" alt="pic">

        <div class="team-item">

          <h4>Christina Hawkings</h4>

          <div class="team-info">
            <p>Head of SEO</p>
          </div>

          <p>Johnathan is our co-founder and has developed search strategies for a variety of clients for over 5
            years.</p>

          <ul class="team-icon">

            <li><a href="#" class="twitter"><i class="bi bi-twitter"></i></a></li>

            <li><a href="#" class="pinterest"><i class="bi bi-instagram"></i></a></li>

            <li><a href="#" class="facebook"><i class="bi bi-mic"></i></a></li>

            <li><a href="#" class="dribble"><i class="bi bi-envelope-open"></i></a></li>

          </ul>

        </div>

      </div>
      <!--end team-item -->

      <!--begin team-item -->
      <div class="col-sm-12 col-md-4 margin-top-30">

        <img src="http://placehold.it/555x555" class="team-img width-100" alt="pic">

        <div class="team-item">

          <h4>Andreas Johansons</h4>

          <div class="team-info geen">
            <p>Marketing Manager</p>
          </div>

          <p>Andres fell in love with marketing at the school and looks forward to being part of the industry for
            years.</p>

          <ul class="team-icon">

            <li><a href="#" class="twitter"><i class="bi bi-twitter"></i></a></li>

            <li><a href="#" class="pinterest"><i class="bi bi-instagram"></i></a></li>

            <li><a href="#" class="facebook"><i class="bi bi-mic"></i></a></li>

            <li><a href="#" class="dribble"><i class="bi bi-envelope-open"></i></a></li>

          </ul>

        </div>

      </div>
      <!--end team-item -->

      <!--begin team-item -->
      <div class="col-sm-12 col-md-4 margin-top-30">

        <img src="http://placehold.it/555x555" class="team-img width-100" alt="pic">

        <div class="team-item">

          <h4>Alexandra Smiths</h4>

          <div class="team-info green">
            <p>SEO Specialist</p>
          </div>

          <p>Graduating with a degree in Spanish, English and French, she has always loved writing.</p>

          <ul class="team-icon">

            <li><a href="#" class="twitter"><i class="bi bi-twitter"></i></a></li>

            <li><a href="#" class="pinterest"><i class="bi bi-instagram"></i></a></li>

            <li><a href="#" class="facebook"><i class="bi bi-mic"></i></a></li>

            <li><a href="#" class="dribble"><i class="bi bi-envelope-open"></i></a></li>

          </ul>

        </div>

      </div>
      <!--end team-item -->

    </div>
    <!--end row-->

  </div>
  <!--end container-->

</section>
<!--end team section-->

<!--begin how-it-works section -->
<section class="section-grey" id="how-it-works">

  <!--begin container -->
  <div class="container">

    <!--begin row -->
    <div class="row align-items-center">

      <!--begin col-md-5 -->
      <div class="col-md-5 col-sm-12">

        <h2>How It Works.</h2>

        <p>Quis autem velis ets reprehender net etid quiste netsum voluptate. Utise wisi enim minim veniam, quis
          etsad ets aspernatis netsum stationes nets qualitats.</p>

        <!--begin row-->
        <div class="row">

          <!--begin col-md-4-->
          <div class="col-md-4 col-sm-6">

            <!--begin testim-platform-->
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
            <!--end testim-platform-->

          </div>
          <!--end col-sm-4-->

          <!--begin col-md-4-->
          <div class="col-md-4 col-sm-6">

            <!--begin testim-platform-->
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
            <!--end testim-platform-->

          </div>
          <!--end col-sm-4-->

        </div>
        <!--end row-->

      </div>
      <!--end col-md-5 -->

      <!--begin col-md-1 -->
      <div class="col-md-1"></div>
      <!--end col-md-1 -->

      <!--begin col-md-6-->
      <div class="col-md-6">

        <!--begin accordion -->
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
        <!--end accordion -->

      </div>
      <!--end col-md-6-->

    </div>
    <!--end row -->

  </div>
  <!--end container -->

</section>
<!--end how-it-works section -->

<!--begin pricing section -->
<section class="section-white" id="pricing">

  <!--begin container -->
  <div class="container">

    <!--begin row -->
    <div class="row">

      <!--begin col-md-12 -->
      <div class="col-md-12 text-center padding-bottom-40">

        <h2>Pricing for every business, at any stage</h2>

      </div>
      <!--end col-md-12 -->

      <!--begin col-md-4-->
      <div class="col-md-4">

        <div class="price-box">

          <ul class="pricing-list">

            <li class="price-title">BASIC</li>

            <li class="price-value">$25</li>

            <li class="price-subtitle">Per Month</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>Custom Charts</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>5 Mailboxes, 10 Gb Storage</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>Unlimited Free Dashboards</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>Access to all APIs</li>

            <li class="price-tag-line"><a href="#">FREE 15-DAY TRIAL</a></li>

          </ul>

        </div>

      </div>
      <!--end col-md-4 -->

      <!--begin col-md-4-->
      <div class="col-md-4">

        <div class="price-box">

          <div class="ribbon blue"><span>Popular</span></div>

          <ul class="pricing-list">

            <li class="price-title">STANDARD</li>

            <li class="price-value">$99</li>

            <li class="price-subtitle">Per Month</li>

            <li class="price-text strong"><i class="bi bi-check-circle-fill blue"></i><strong>All Basic
                features</strong></li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>15 Mailboxes, 50 Gb Storage</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>Interactive Screen Sharing</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>Full Reports History</li>

            <li class="price-tag"><a href="#">FREE 15-DAY TRIAL</a></li>

          </ul>

        </div>

      </div>
      <!--end col-md-4 -->

      <!--begin col-md-4-->
      <div class="col-md-4">

        <div class="price-box">

          <ul class="pricing-list">

            <li class="price-title white-text">PRO</li>

            <li class="price-value white-text">$199</li>

            <li class="price-subtitle white-text">Per Month</li>

            <li class="price-text white-text"><i class="bi bi-check-circle-fill blue"></i><strong>All Standard
                Features</strong></li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>50 Mailboxes, 90 Gb Storage</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>Dedicated Account Manager</li>

            <li class="price-text"><i class="bi bi-check-circle-fill blue"></i>24/7 Priority Support</li>

            <li class="price-tag-line"><a href="#">FREE 15-DAY TRIAL</a></li>

          </ul>

        </div>

      </div>
      <!--end col-md-4 -->

    </div>
    <!--end row -->

  </div>
  <!--end container -->

</section>
<!--end pricing section -->

<!--begin features section -->
<section class="section-grey medium-padding-bottom" id="services">

  <!--begin container -->
  <div class="container">

    <!--begin row -->
    <div class="row">

      <!--begin col-md-12-->
      <div class="col-md-12 text-center">

        <h2>Amazing Features</h2>

      </div>
      <!--end col-md-12 -->

    </div>
    <!--end row -->

    <!--begin row -->
    <div class="row">

      <!--begin col-md-4-->
      <div class="col-md-4">

        <div class="feature-box light-green">
          <div class="feature-content">
            <i class="bi bi-gem"></i>
            <div class="feature-box-text">
              <h4>Limited Liability Partnership</h4>
            </div>
          </div>
          <div class="feature-footer">
            <p>Utise wisi enim nets venias, quis tation ullamcorper nets lobotis nisle consequat. Utise wisi enim nets venias, quis tation ullamcorper nets lobotis nisle consequat. Utise wisi enim nets venias, quis tation ullamcorper nets lobotis nisle consequat.</p>

            <div class="feature-footer-content">
              <span><b>₹ 6499 </b> <small>(All Inclusive)</small></span>
              <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
          </div>
        </div>

      </div>
      <!--end col-md-4 -->


    </div>
    <!--end row -->


  </div>
  <!--end container -->

</section>
<!--end features section -->

<!--begin section-white -->
<section class="section-white no-padding-bottom">

  <!--begin container -->
  <div class="container">

    <!--begin row -->
    <div class="row align-items-center">

      <!--begin col-md-6-->
      <div class="col-md-6 text-center">

        <p class="testimonial-single">“People who succeed in business aren't afraid to hear feedback from their
          customers - they actually thrive from it.”</p>

        <h5 class="margin-bottom-5">Johanna S. Richardson</h5>

        <p class="blue">CEO Essentials</p>

      </div>
      <!--end col-md-6-->

      <!--begin col-md-6-->
      <div class="col-md-6">

        <img src="http://placehold.it/555x500" class="width-100" alt="pic">

      </div>
      <!--end col-md-6-->

    </div>
    <!--end row -->

  </div>
  <!--end container -->

</section>
<!--end section-white -->

<!--begin blog -->
<section class="section-grey medium-padding-bottom" id="blog">

  <!--begin container-->
  <div class="container">

    <!--begin row-->
    <div class="row">

      <!--begin col-md-12-->
      <div class="col-md-12 text-center">

        <h2>Our Blog</h2>

      </div>
      <!--end col-md-12-->

    </div>
    <!--end row-->

    <!--begin row-->
    <div class="row">

      <!--begin col-sm-4 -->
      <div class="col-md-4">

        <!--begin blog-item -->
        <div class="blog-item">

          <!--begin popup image -->
          <div class="popup-wrapper">
            <div class="popup-gallery">
              <a href="#">
                <img src="http://placehold.it/555x400" class="width-100" alt="pic">
                <span class="eye-wrapper2"><i class="bi bi-link-45deg"></i></span>
              </a>
            </div>
          </div>
          <!--end popup image -->

          <!--begin blog-item_inner -->
          <div class="blog-item-inner">

            <h3 class="blog-title"><a href="#">The Guide To LinkedIn Ads</a></h3>

            <a href="#" class="blog-icons last"><i class="bi bi-card-text"></i> Marketing &amp; Design &#8212; 11
              Min Read</a>

            <p>Quis autem velis reprehender nets quiste voluptate velite estum quants etsamis sedit varias nets.</p>

          </div>
          <!--end blog-item-inner -->

        </div>
        <!--end blog-item -->

      </div>
      <!--end col-sm-4-->

      <!--begin col-sm-4 -->
      <div class="col-md-4">

        <!--begin blog-item -->
        <div class="blog-item">

          <!--begin popup image -->
          <div class="popup-wrapper">
            <div class="popup-gallery">
              <a href="#">
                <img src="http://placehold.it/555x400" class="width-100" alt="pic">
                <span class="eye-wrapper2"><i class="bi bi-link-45deg"></i></span>
              </a>
            </div>
          </div>
          <!--end popup image -->

          <!--begin blog-item_inner -->
          <div class="blog-item-inner">

            <h3 class="blog-title"><a href="#">Affinity Designer Quick Start</a></h3>

            <a href="#" class="blog-icons last"><i class="bi bi-play-circle"></i> SaaS Solutions &#8212; 25 Min
              Watch</a>

            <p>Quis autem velis reprehender nets quiste voluptate velite estum quants etsamis sedit varias nets.</p>

          </div>
          <!--end blog-item-inner -->

        </div>
        <!--end blog-item -->

      </div>
      <!--end col-sm-4-->

      <!--begin col-sm-4 -->
      <div class="col-md-4">

        <!--begin blog-item -->
        <div class="blog-item">

          <!--begin popup image -->
          <div class="popup-wrapper">
            <div class="popup-gallery">
              <a href="#">
                <img src="http://placehold.it/555x400" class="width-100" alt="pic">
                <span class="eye-wrapper2"><i class="bi bi-link-45deg"></i></span>
              </a>
            </div>
          </div>
          <!--end popup image -->

          <!--begin blog-item_inner -->
          <div class="blog-item-inner">

            <h3 class="blog-title"><a href="#">Our Happy Team</a></h3>

            <a href="#" class="blog-icons last"><i class="bi bi-mic"></i> Product Launch &#8212; 19 Min Listen</a>

            <p>Quis autem velis reprehender nets quiste voluptate velite estum quants etsamis sedit varias nets.</p>

          </div>
          <!--end blog-item-inner -->

        </div>
        <!--end blog-item -->

      </div>
      <!--end col-sm-4-->

    </div>
    <!--end row-->

  </div>
  <!--end container-->

</section>
<!--end blog -->

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
    max-width: -webkit-fill-available;
    padding-left: 25px;
    padding-right: 25px;
  }
</style>

<?= $this->endSection(); ?>