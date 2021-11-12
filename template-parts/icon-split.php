<?php $title = get_field('icon_split_title');
$content = get_field('icon_split_content'); ?>

<section class="icon-split">
    <div class="container">
        <div class="row">
            <?php while(have_rows('icon_split_cols')): the_row(); ?>
                <div class="col-12 col-md-4 icon-group-col">
                    
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>