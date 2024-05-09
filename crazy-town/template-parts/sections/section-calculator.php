<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$calculator_style = get_sub_field('calculator_style');
?>

<!-- Featured Benefits Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="calculator_section style2">
    <div class="container-fluid">
        <div class="row align-items-center mx-auto">

            <div class="col-sm-6 col-md-6 col-lg-6 text-center calculator_info">
                <div class="calculator_content">
                    <?php if (get_sub_field('header_subtitle')):?>
                        <h6><?php the_sub_field('header_subtitle'); ?></h6>
                    <?php endif;?>
                    <?php if (get_sub_field('h2_header')):?>
                        <h3><?php the_sub_field('h2_header'); ?></h3>
                    <?php endif;?>
                    <?php if (get_sub_field('content')):?>
                        <div class="content"><?php the_sub_field('content'); ?></div>
                    <?php endif;?>

                    <?php if (get_sub_field('enable_cta_button')):?>
                        <?php if (get_sub_field('call_to_action_header')):?>
                            <h6><?php the_sub_field('call_to_action_header'); ?></h6>
                        <?php endif;?>
                        <?php if( have_rows('cta_buttons_list') ): ?>
                            <?php while( have_rows('cta_buttons_list') ) : the_row(); ?>
                                <a class="cta_calc <?php if ( get_sub_field('highlighted') == true ) { echo 'highlighted'; } ?>" target="_blank" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                                    <?php the_sub_field('button_text'); ?>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 calculator_form contactus_form">
                <?php if (get_sub_field('calculator_form')):?>
                    <?php $form_id = get_sub_field('calculator_form');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Featured Benefits Section End -->