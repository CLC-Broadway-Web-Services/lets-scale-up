<div class="blog-item">
    <a href="<?= route_to('single_client_page', $slug) ?>" class="blog-image" style="background-image: url(<?= $image ?>);">
    </a>
    <div class="blog-item-inner">
        <h3 class="blog-title"><a href="<?= route_to('single_client_page', $slug) ?>"><?= $name ?></a></h3>
        <p><?= $summary ?></p>
        <a href="<?= route_to('single_client_page', $slug) ?>">Read more ...</a>
    </div>
</div>