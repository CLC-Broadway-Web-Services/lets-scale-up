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
<li class="nk-menu-item <?= '/' . uri_string() == route_to('site_settings') ? 'active' : ''  ?>">
    <a href="<?= route_to('site_settings') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
        <span class="nk-menu-text">Settings</span>
    </a>
</li>