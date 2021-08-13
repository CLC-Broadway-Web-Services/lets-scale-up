<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_blogs_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_blogs_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
        <span class="nk-menu-text">All Blogs</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_blog_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_blog_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Add Blog</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_blog_category_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_blog_category_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Categories</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_blog_comments') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_blog_comments') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Comments</span>
    </a>
</li>