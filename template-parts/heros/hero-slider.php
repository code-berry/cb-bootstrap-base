<?php if(have_rows('hero_slider')) { ?>
    <section class="hero-slider major-m-b">
        <?php while(have_rows('hero_slider')): the_row();
            $title = get_sub_field('title');
            $badge = get_sub_field('badge');
            $content = get_sub_field('description'); ?>

            <div class="slide">
                <div class="image-wrapper">
                    <?php show_acf_img('image', true, 'slide-image cover'); ?>
                </div>

                <div class="content-wrapper">
                    <?php make_text_element('div', $badge, 'slide-badge'); ?>
                    <?php make_text_element('h3', $title, 'slide-title'); ?>
                    <?php make_text_element('p', $content, 'slide-content'); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.hero-slider').slick({
                dots: true,
                arrows: false,
                speed: 500,
                fade: true,
                cssEase: 'linear'
            });
        });
    </script>
<?php } ?>