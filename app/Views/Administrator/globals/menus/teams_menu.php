<li class="nk-menu-item <?= '/'.uri_string() == route_to('admin_team_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_team_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">Team Members</span>
    </a>
</li>

<li class="nk-menu-item <?= '/'.uri_string() == route_to('admin_team_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_team_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Add Team Member</span>
    </a>
</li>