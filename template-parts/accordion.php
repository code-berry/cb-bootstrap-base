<?php $fieldname = $args['fieldname'];
$subfield = $args['subfield'];

if(have_rows($fieldname)) { ?>
    <section class="accordion-section minor-p-t major-m-b">
        <div class="container">
            <div class="row">
                <div class="col-12 content-col">
                    <div class="accordion accordion-flush" id="accordion-<?= $fieldname; ?>">
                        <?php while(have_rows($fieldname)): the_row();
                            $item = get_sub_field($subfield);
                            $idx = get_row_index();
                            $description = get_field('description', $item->ID); ?>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-<?= $idx; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $idx; ?>" aria-expanded="false" aria-controls="collapse-<?= $idx; ?>">
                                        <?= $item->post_title; ?>
                                    </button>
                                </h2>

                                <div id="collapse-<?= $idx; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $idx; ?>" data-bs-parent="#accordion-<?= $fieldname; ?>">
                                    <div class="accordion-body">
                                        <?php make_text_element('p', $description, 'description'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }