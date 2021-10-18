<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
        <span class="nk-menu-text">All Services</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-grid-add-c"></em></span>
        <span class="nk-menu-text">Add Service</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_category_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_category_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Categories</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_cat_faq_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_cat_faq_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-property-alt"></em></span>
        <span class="nk-menu-text">Category Questions</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_cat_faq_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_cat_faq_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
        <span class="nk-menu-text">Add Category Question</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_slider_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_slider_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
        <span class="nk-menu-text">Category Sliders</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_benefit_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_benefit_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-todo-fill"></em></span>
        <span class="nk-menu-text">Benefit Blocks</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_benefit_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_benefit_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-note-add-fill-c"></em></span>
        <span class="nk-menu-text">Add Benefit Block</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_form_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_form_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-notes-alt"></em></span>
        <span class="nk-menu-text">Service Forms</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_form_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_form_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-note-add"></em></span>
        <span class="nk-menu-text">Add Service Form</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_document_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_document_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-todo-fill"></em></span>
        <span class="nk-menu-text">Document Blocks</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_document_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_document_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-note-add-fill-c"></em></span>
        <span class="nk-menu-text">Add Document Block</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_faq_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_faq_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-property-alt"></em></span>
        <span class="nk-menu-text">FAQ Blocks</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_faq_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_faq_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
        <span class="nk-menu-text">Add FAQ Block</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_package_index') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_package_index') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
        <span class="nk-menu-text">Service Packages</span>
    </a>
</li>
<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_package_add') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_package_add') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-file-plus"></em></span>
        <span class="nk-menu-text">Add Service Package</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_queries') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_queries') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span>
        <span class="nk-menu-text">Service Queries</span>
    </a>
</li>

<li class="nk-menu-item <?= '/' . uri_string() == route_to('admin_service_testimonials') ? 'active' : ''  ?>">
    <a href="<?= route_to('admin_service_testimonials') ?>" class="nk-menu-link">
        <span class="nk-menu-icon"><em class="icon ni ni-comments"></em></span>
        <span class="nk-menu-text">Service Testimonials</span>
    </a>
</li>