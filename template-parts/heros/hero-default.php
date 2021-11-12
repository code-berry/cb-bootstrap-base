<?php $classes = 'hero-default';
$title = get_field('hero_title') ? get_field('hero_title') : get_the_title();
$content = get_field('hero_content');

if(!has_post_thumbnail($post)) {
    $classes .= ' no-image';
} ?>

<section class="<?= $classes; ?>">
    <?php show_acf_img('hero_image', false, 'hero-image cover'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 content-col">
                <?php make_text_element('h1', $title, 'section-title'); ?>
                <?php make_text_element('p', $content, 'section-content'); ?>
            </div>
        </div>
    </div>
</section>