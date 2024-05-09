<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Premises Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="premises_section wrap_two_columns">
    <div class="container">
        <div class="row mx-auto section_premises">

            <?php if ( get_sub_field('h2_header') ):?>
                <h2><?php the_sub_field('h2_header'); ?></h2>
            <?php endif; ?>

            <div class="col-sm-6 col-md-6 col-lg-6 premises_image">
                <?php if ( get_sub_field('image') ):?>
                    <?php $quick_order_image = get_sub_field('image');?>
                    <img src="<?php echo $quick_order_image;?>">
                <?php endif; ?>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 premises_content">
                <?php if (get_sub_field('subtitle')):?>
                    <h4><?php the_sub_field('subtitle'); ?></h4>
                <?php endif;?>
                <h3><?php the_sub_field('title'); ?></h3>
                <?php if (get_sub_field('content')):?>
                    <div class="content">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endif;?>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Premises Section End -->