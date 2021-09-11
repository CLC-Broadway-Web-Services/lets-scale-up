<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_initiatives_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_initiatives_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">All Initiatives</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_initiative_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_initiative_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Add Initiative</span>
    </a>
</li>
