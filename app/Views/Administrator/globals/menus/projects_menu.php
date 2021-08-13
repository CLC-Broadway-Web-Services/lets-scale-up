<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_project_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_project_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">All Projects</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_project_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_project_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Add Project</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_project_categories_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_project_categories_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Categories</span>
    </a>
</li>