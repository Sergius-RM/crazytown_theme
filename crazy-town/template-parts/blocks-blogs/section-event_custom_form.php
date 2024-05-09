<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Event Custom Form Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?>
        class="custom_form_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-8 mx-auto">
                <?php if( get_sub_field('title') ): ?>
                    <h4><?php the_sub_field('title'); ?></h4>
                <?php endif;?>

                <?php $form_id = get_sub_field('custom_form');?>
                <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
            </div>
        </div>
    </div>
</section>
<!-- Event Custom Form Section End -->