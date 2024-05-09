<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Quick Order Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="quick_order_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-xs-12 col-md-6 col-lg-6 quick_order_content">
                <h6><?php the_sub_field('h2_header'); ?></h6>
                <h3><?php the_sub_field('content'); ?></h3>


                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>

            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 quick_order_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if ( get_sub_field('image') ):?>
                    <?php $quick_order_image = get_sub_field('image');?>
                    <img src="<?php echo $quick_order_image;?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Quick Order Section End -->