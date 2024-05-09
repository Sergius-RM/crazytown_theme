<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Event Infobox Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
        class="blog-details-area">
    <div class="container">
    <div class="container block_infobox event_infobox">
        <div class="row align-items-center">
            <div class="col-sm-8 block_infobox_item">
                <div class="item-content">
                    <h6><?php the_sub_field('block_postinfo_subtitle'); ?></h6>
                    <h2><?php the_sub_field('block_postinfo_title'); ?></h2>
                    <?php the_sub_field('block_postinfo_content'); ?>
                </div>
            </div>
            <div class="col-sm-4 block_infobox_btn mx-auto text-end">
                <?php $cta_form = get_sub_field('cta_form');?>
                <?php if ($cta_form == 'cta'):?>
                    <a <?php if (the_sub_field('block_postinfo_btnid')):?>id="<?php the_sub_field('block_postinfo_btnid'); ?>"<?php endif;?> href="<?php the_sub_field('block_postinfo_btnurl'); ?>" class="shop_btn">
                        <?php the_sub_field('block_postinfo_btntext'); ?> <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                <?php elseif ($cta_form == 'form'):?>
                    <?php $form_id = get_sub_field('form_infobox');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Event Infobox Section End -->