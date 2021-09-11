<div class="accordion-item">
    <h2 class="accordion-header" id="flush-heading_<?= $faq_id ?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_<?= $faq_id ?>" aria-expanded="false" aria-controls="flush-collapse_<?= $faq_id ?>">
            <?= $faq_title ?>
        </button>
    </h2>
    <div id="flush-collapse_<?= $faq_id ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading_<?= $faq_id ?>" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <?= html_entity_decode($faq_content) ?>
        </div>
    </div>
</div>