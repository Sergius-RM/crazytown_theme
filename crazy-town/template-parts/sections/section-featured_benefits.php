<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$featured_benefits_style = get_sub_field('featured_benefits_style');
?>

<!-- Featured Benefits Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="featured_benefits_section <?php if ($featured_benefits_style == 'style2'):?>style2<?php endif;?>">
    <div class="container-fluid">
        <div class="row align-items-center mx-auto">

            <div class="col-sm-6 col-lg-6 featured_benefits_content <?php if ( get_sub_field('swap_text_position') == true ) { echo 'text-end'; } ?>">
                <h4><?php the_sub_field('header_subtitle'); ?></h4>
                <h2><?php the_sub_field('h2_header'); ?></h2>
                <div class="content"><?php the_sub_field('content'); ?></div>

                <?php if (get_sub_field('enable_cta_button')):?>

                    <?php if( have_rows('cta_buttons_list') ): ?>
                        <?php while( have_rows('cta_buttons_list') ) : the_row(); ?>
                            <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                                <?php the_sub_field('button_text'); ?>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endif;?>

            </div>

            <div class="col-sm-6 col-lg-6 featured_benefits_list <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">
                <?php if( have_rows('benefits') ): ?>
                    <ul>
                    <?php while( have_rows('benefits') ) : the_row(); ?>
                        <li class="d-flex align-items-center">
                            <?php if ( get_sub_field('icon') ):?>
                                <?php $quick_order_image = get_sub_field('icon');?>
                                <img src="<?php echo $quick_order_image;?>">
                            <?php endif; ?>
                            <h4><?php the_sub_field('name'); ?></h4>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- Featured Benefits Section End -->