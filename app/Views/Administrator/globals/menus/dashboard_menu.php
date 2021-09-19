<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
        <span class="nk-menu-text">Overview</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-grid-add-c"></em></span>
        <span class="nk-menu-text">User Subscriptions</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_testimonials') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_testimonials') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">Testimonials</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_contact_submissions') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_contact_submissions') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Contact Submission</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_press_release_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_press_release_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
        <span class="nk-menu-text">Press Realeses</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('site_settings') ? 'active' : ''  ?>">
    <a href="<?= route_to('site_settings') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
        <span class="nk-menu-text">Newsletter Subscribers</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('site_settings') ? 'active' : ''  ?>">
    <a href="<?= route_to('site_settings') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
        <span class="nk-menu-text">Newsletter Subscriptions</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('site_settings') ? 'active' : ''  ?>">
    <a href="<?= route_to('site_settings') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
        <span class="nk-menu-text">Settings</span>
    </a>
</li>