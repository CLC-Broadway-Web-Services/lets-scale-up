<!-- begin header -->
<header class="navbar-fixed-top">

  <nav class="navbar navbar-expand-lg">

    <div class="container" style="width:100%">

      <!-- begin logo -->
      <!-- <a class="navbar-brand" href="#"><i class="bi bi-intersect"></i> Smart</a> -->
      <a class="navbar-brand" href="<?= route_to('home_page') ?>"><img class="navbar-brand" src="<?= APP_LOGO ?>" style="max-height: 30px;"></a>
      <!-- end logo -->


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarScroll">

        <!-- begin navbar-nav -->
        <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll justify-content-center">

          <li class="nav-item"><a class="nav-link" href="<?= route_to('home_page') ?>">Home</a></li>

          <li class="nav-item"><a class="nav-link" href="<?= route_to('clients_page') ?>">Clients</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="aboutMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              About
            </a>
            <ul class="dropdown-menu" aria-labelledby="aboutMenu">
              <li><a class="dropdown-item" href="<?= route_to('about_us_page') ?>">Who We Are!</a></li>
              <li><a class="dropdown-item" href="<?= route_to('about_us_page') ?>#what-we-do">What We Do?</a></li>
            </ul>
          </li>
          <?php $initiativeMenu = getInitiativesMenu();
          if (count($initiativeMenu)) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="initiativesMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Initiatives
              </a>
              <ul class="dropdown-menu" aria-labelledby="initiativesMenu">
                <?php foreach ($initiativeMenu as $menuItem) : ?>
                  <li><a class="dropdown-item" href="<?= route_to('single_initiative', $menuItem['slug']) ?>"><?= $menuItem['name'] ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="<?= route_to('blogs_page') ?>">Blog</a></li>

          <li class="nav-item"><a class="nav-link" href="<?= route_to('contact_us_page') ?>">Contact</a></li>

        </ul>

        <!-- <div class="col-md-3 text-end"> -->
        <div class="d-flex" id="usernav">
          <?php if (session()->get('isUserLoggedin')) : ?>
            <div class="dropdown" id="user_menu">
              <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i> Account
              </button>
              <ul class="dropdown-menu dropdown-menu-start dropdown-menu-md-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="<?= route_to('account_overview') ?>">Overview</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_subscriptions') ?>">Subscriptions</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_orders') ?>">Orders</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_documents') ?>">Documents</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_legal_forms') ?>">Legal Forms</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_feedback') ?>">Feedback</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= route_to('account_payment_history') ?>">Transactions</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_profile') ?>">Profile</a></li>
                <li><a class="dropdown-item" href="<?= route_to('account_change_password') ?>">Change Password</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= route_to('user_logout') ?>">Logout</a></li>
              </ul>
            </div>
          <?php else : ?>
            <button type="button" class="btn btn-warning" onclick="openLogin()"><i class="bi bi-person"></i> Login</button>
          <?php endif; ?>
        </div>
      </div>

    </div>

  </nav>
  <?php $serviceMenu = servicesMenu();
  if (count($serviceMenu) > 0) : ?>
    <nav id="services_navbar" class="navbar navbar-expand-lg">
      <div style="text-align: right; width: 100%; display: block;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          Services <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mx-auto my-2 my-lg-0 navbar-nav-scroll justify-content-center">

            <?php foreach ($serviceMenu as $key => $menu) : ?>

              <?php if (count($menu['childs']) > 0) : ?>
                <li class="nav-item dropdown has-megamenu">
                  <a class="nav-link dropdown-toggle" href="#" id="catmenu_<?= $menu['id'] ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="service_dropdown_child" onclick="window.location.href = '<?= route_to('category', $menu['slug']) ?>'"><?= $menu['name'] ?></span>
                  </a>
                  <div class="dropdown-menu megamenu bg-white text-dark" role="menu" aria-labelledby="catmenu_<?= $menu['id'] ?>">
                    <div class="container-fluid">
                      <div class="row g-3">
                        <?php foreach ($menu['childs'] as $key => $child) : ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="col-megamenu">
                              <p class="title h6 strong service_nav_child_title"><?= $child['title'] ? $child['title'] : $child['name'] ?></p>
                              <ul class="list-unstyled">
                                <?php foreach ($child['services'] as $key => $service) : ?>
                                  <li><a href="<?= route_to('service_detail', $service['service_slug']) ?>"><?= $service['service_title'] ?></a></li>
                                <?php endforeach; ?>
                              </ul>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>

                    </div>
                  </div>
                </li>
              <?php else : ?>
                <li class="nav-item"><a class="nav-link" href="<?= route_to('category', $menu['slug']) ?>"><?= $menu['name'] ?></a></li>
              <?php endif; ?>

            <?php endforeach; ?>
          </ul>
        </div>
      </div>

    </nav>
  <?php endif; ?>

</header>
<!-- end header -->