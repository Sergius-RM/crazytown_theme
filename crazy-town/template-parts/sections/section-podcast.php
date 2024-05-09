<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$podcast_style = get_sub_field('podcast_style');
?>

<!-- Podcast Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="podcast_section <?php if ($podcast_style == 'style2'):?>podcast_style_2<?php endif;?>">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-6 col-lg-6 text-center mx-auto podcast_item">
                <?php if (get_sub_field('header_subtitle')):?>
                    <h6><?php the_sub_field('header_subtitle'); ?></h6>
                <?php endif;?>
                <h3><?php the_sub_field('h2_header'); ?></h3>
                <div class="content">
                    <?php the_sub_field('content'); ?>
                </div>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="cta_btn" target="_blank" <?php if (get_sub_field('button_link')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Podcast Section End -->