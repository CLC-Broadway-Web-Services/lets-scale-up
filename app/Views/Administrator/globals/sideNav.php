<div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="md" data-toggle-body="true">
    <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
    <div class="nk-sidebar-menu" data-simplebar>
        <ul class="nk-menu nk-menu-main">

            <!-- MAIN MENU START -->
            <?php echo view('Administrator/globals/mainMenu'); ?>
            <!-- MAIN MENU END -->

        </ul><!-- .nk-menu -->
        <ul class="nk-menu d-md-none d-lg-block">
            <?php if ($uriSegments[2] == 'services' || $uriSegments[2] == 'service') : ?>
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">Services</h6>
                </li>
                <!-- // services menu -->
                <?php echo view('Administrator/globals/menus/services_menu'); ?>
            <?php endif ?>
            <?php if ($uriSegments[2] == 'blogs' || $uriSegments[2] == 'blog') : ?>
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">Blogs</h6>
                </li>
                <!-- // services menu -->
                <?php echo view('Administrator/globals/menus/blogs_menu'); ?>

            <?php endif ?>
            <?php if ($uriSegments[2] == 'projects' || $uriSegments[2] == 'project') : ?>
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">Projects</h6>
                </li>
                <!-- // services menu -->
                <?php echo view('Administrator/globals/menus/projects_menu'); ?>
            <?php endif ?>
            <?php if ($uriSegments[2] == 'initiatives') : ?>
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">Initiatives</h6>
                </li>
                <!-- // services menu -->
                <?php echo view('Administrator/globals/menus/initiatives_menu'); ?>
            <?php endif ?>
            <?php if ($uriSegments[2] == 'teams' || $uriSegments[2] == 'team') : ?>
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">Team</h6>
                </li>
                <!-- // services menu -->
                <?php echo view('Administrator/globals/menus/teams_menu'); ?>

            <?php endif ?>
            <?php if ($uriSegments[2] == 'other') : ?>
                <li class="nk-menu-heading">
                    <h6 class="overline-title text-primary-alt">Others</h6>
                </li>
                <!-- // services menu -->
                <?php echo view('Administrator/globals/menus/others_menu'); ?>
            <?php endif ?>
        </ul>

    </div>

    <div class="nk-aside-close">
        <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
    </div>
</div>