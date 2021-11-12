<?php // Template Name: Front

get_header();
get_template_part('template-parts/heros/hero-slider'); ?>

<div id="post_<?= $post->ID; ?>">
    <?php get_template_part('template-parts/page-intro'); ?>
    <?php get_template_part('template-parts/accordion', '', array(
        'fieldname' => 'services',
        'subfield' => 'service',
    )); ?>
    <?php get_template_part('template-parts/image-text-split', '', array(
        'groupname' => 'text_image_section',
    )); ?>

    <?php get_template_part('template-parts/icon-split'); ?>
</div>

<?php get_footer();