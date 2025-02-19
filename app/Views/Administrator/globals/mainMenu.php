<li class="nk-menu-item <?= '/'.uri_string() == route_to('admin_index') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Dashboard</span>
    </a>
    <ul class="nk-menu-sub">
        <?php echo view('Administrator/globals/menus/dashboard_menu'); ?>
    </ul>
</li>

<li class="nk-menu-item has-sub <?= strstr('/'.uri_string(), route_to('admin_index').'/service') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Services</span>
    </a>
    <ul class="nk-menu-sub">
        <!-- // services menu -->
        <?php echo view('Administrator/globals/menus/services_menu'); ?>
    </ul>
</li>
<li class="nk-menu-item has-sub <?= strstr('/'.uri_string(), route_to('admin_index').'/personalized') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Personalized Service</span>
    </a>
    <ul class="nk-menu-sub">
        <!-- // services menu -->
        <?php echo view('Administrator/globals/menus/personalized_services_menu'); ?>
    </ul>
</li>

<li class="nk-menu-item has-sub <?= strstr('/'.uri_string(), route_to('admin_index').'/blog') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Blogs</span>
    </a>
    <ul class="nk-menu-sub">
        <!-- // services menu -->
        <?php echo view('Administrator/globals/menus/blogs_menu'); ?>
    </ul>
</li>

<li class="nk-menu-item has-sub <?= strstr('/'.uri_string(), route_to('admin_index').'/clients') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Clients</span>
    </a>
    <ul class="nk-menu-sub">
        <!-- // services menu -->
        <?php echo view('Administrator/globals/menus/clients_menu'); ?>
    </ul>
</li>

<li class="nk-menu-item has-sub <?= strstr('/'.uri_string(), route_to('admin_index').'/initiatives') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Initiatives</span>
    </a>
    <ul class="nk-menu-sub">
        <!-- // services menu -->
        <?php echo view('Administrator/globals/menus/initiatives_menu'); ?>
    </ul>
</li>

<li class="nk-menu-item has-sub <?= strstr('/'.uri_string(), route_to('admin_index').'/team') ? 'active' : ''  ?>">
    <a href="#" class="nk-menu-link nk-menu-toggle">
        <span class="nk-menu-text">Team</span>
    </a>
    <ul class="nk-menu-sub">
        <!-- // services menu -->
        <?php echo view('Administrator/globals/menus/teams_menu'); ?>
    </ul>
</li>
