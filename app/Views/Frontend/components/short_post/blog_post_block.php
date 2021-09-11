<div class="blog-item">
    <a href="<?= route_to('single_post_page', $post_slug) ?>" class="blog-image" style="background-image: url(<?= $post_image ?>);">
    </a>
    <div class="blog-item-inner">
        <h3 class="blog-title"><a href="<?= route_to('single_post_page', $post_slug) ?>"><?= $post_title ?></a></h3>
        <p><?= $post_summary ?></p>
        <a href="<?= route_to('single_post_page', $post_slug) ?>">Read more ...</a>
    </div>
</div>