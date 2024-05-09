<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Two Columns Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="two_columns_section stamp_mode wrap_two_columns">
    <div class="container">
        <div class="row align-items-center section_two_columns <?php if ( get_sub_field('swap_blocks') == true ) { echo 'right-position'; } ?>">

            <div class="col-sm-9 col-md-6 col-lg-6 two_columns_content">
                <?php if (get_sub_field('header_subtitle')):?>
                    <h4><?php the_sub_field('header_subtitle'); ?></h4>
                <?php endif;?>
                <h2><?php the_sub_field('h2_header'); ?></h2>
                <?php the_sub_field('content'); ?>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_link')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

            <div    style="background: url(<?php echo get_sub_field('image');?>) 50% 50% no-repeat; background-size: cover;"
                    class="col-sm-9 col-md-9 col-lg-9 two_columns_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'left-position'; } ?>">
            </div>

            <?php if ( get_sub_field('image_stamp') ):?>
                <?php $image_stamp = get_sub_field('image_stamp');?>
                <img class="two_columns_image_stamp <?php if ( get_sub_field('swap_blocks') == true ) { echo 'left-position'; } ?>" src="<?php echo $image_stamp;?>">
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Two Columns Section End -->