<?php $title = get_field('page_intro_title');
$content = get_field('page_intro_content');

if($title) { ?>
    <section class="page-intro major-p-tb">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 offset-xl-1 content-col">
                    <?php make_text_element('h2', $title, 'section-title'); ?>
                    <?php if($content) { ?>
                        <div class="content">
                            <?= $content; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php }