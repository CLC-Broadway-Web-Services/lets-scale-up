<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand logo text-uppercase" href="<?= route_to('home_page'); ?>">
            <img src="/public/assets/images/logo-dark.png" alt="<?= APP_NAME; ?>" height="22">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">

                <li class="nav-item">
                    <a href="<?= route_to('home_page'); ?>" class="nav-link smoothlink">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('home_page'); ?>#about" class="nav-link smoothlink">About</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('home_page'); ?>#what-we-do" class="nav-link smoothlink">What We Do?</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('clients_page'); ?>" class="nav-link smoothlink">Clients</a>
                </li>
                <li class="nav-item dropdown show-on-hover">
                    <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Initiatives <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= route_to('initiatives_page'); ?>">Legaltech India</a>
                        <a class="dropdown-item" href="<?= route_to('initiatives_page'); ?>">Leegalist</a>
                        <a class="dropdown-item" href="<?= route_to('initiatives_page'); ?>">See All</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('blogs_page'); ?>" class="nav-link smoothlink">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('contact_us_page'); ?>" class="nav-link smoothlink">Contact</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- Navbar End -->

<style>
    .show-on-hover:hover>ul.dropdown-menu {
        display: block;
    }

    .show-on-hover:hover>div.dropdown-menu {
        display: block;
    }
</style>