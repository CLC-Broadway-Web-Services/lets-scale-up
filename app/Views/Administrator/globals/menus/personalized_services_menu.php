<li class="nk-menu-item <?= '/'.uri_string() == route_to('personalized_service_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('personalized_service_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">Add Personalized Service</span>
    </a>
</li>

<li class="nk-menu-item <?= '/'.uri_string() == route_to('personalized_service_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('personalized_service_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">All Personalized Services</span>
    </a>
</li>