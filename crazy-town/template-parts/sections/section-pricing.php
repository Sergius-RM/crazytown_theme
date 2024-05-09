<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Pricing Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="pricing_section">
    <div class="container">

        <?php if (  get_sub_field( 'pricing_subtitle') ) :?>
            <h6><?php $pricing_subtitle = the_sub_field('pricing_subtitle'); ?>
                <?php echo $pricing_subtitle;?>
            </h6>
        <?php endif;?>
        <?php if (  get_sub_field ( 'pricing_title') ) :?>
            <h2>
                <?php $pricing_title = the_sub_field('pricing_title'); ?>
                <?php echo $pricing_title;?>
            </h2>
        <?php endif;?>

            <?php if( have_rows('pricing_loop') ): ?>
                <div class="row mx-auto pricing_list">
                <?php while( have_rows('pricing_loop') ) : the_row(); ?>
                    <div class="col-sm-6 col-md-4 col-lg-4 mx-auto pricing_loop equal-height">
                        <div class="pricing_item">
                            <div class="pricing_info">
                                <h4><?php the_sub_field('name'); ?></h4>
                                <p><?php the_sub_field('content'); ?></p>
                            </div>

                            <?php if( have_rows('pricelist') ): ?>
                                <div class="pricelist">
                                <?php while( have_rows('pricelist') ) : the_row(); ?>
                                    <div class="pricelist_item">
                                        <p><?php the_sub_field('service'); ?></p>
                                    </div>
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                            <div class="price">
                                <?php the_sub_field('price'); ?>
                            </div>

                            <?php if (get_sub_field( 'enable_cta_button')): ?>
                                <a class="cta_btn" <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                                    <?php the_sub_field('button_text'); ?>
                                </a>
                            <?php endif;?>

                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
    </div>

</section>
<!-- Pricing Statements Section End -->