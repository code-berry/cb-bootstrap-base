<?php $groupname = $args['groupname'] . '_';
$title = get_field($groupname . 'title');
$content = get_field($groupname . 'content'); ?>

<section class="image-text-split minor-p-t major-p-b">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-6 offset-md-1 order-md-last image-col">
                <div class="image-wrapper">
                    <?php show_acf_img($groupname .'image', false, 'image cover'); ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 content-col col-md-first content-col major-p-tb">
                <?php make_text_element('h2', $title, 'section-title'); ?>
                <?php if($content) { ?>
                    <div class="content">
                        <?= $content; ?>
                    </div>
                <?php } ?>
                <?php if(get_field($groupname . 'link')) { ?>
                    <div class="link-wrapper">
                        <?php show_acf_link($groupname .'link', false, 'btn btn-primary'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>