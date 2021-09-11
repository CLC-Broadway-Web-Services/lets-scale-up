<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_clients_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_clients_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">All Clients</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_clients_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_clients_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Add Client</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_clients_categories_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_clients_categories_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Categories</span>
    </a>
</li>