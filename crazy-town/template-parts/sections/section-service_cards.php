<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


?>

<!-- Argument Lists Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="argument_lists_section">
    <div class="container">
        <div class="row mx-auto">
            <?php if( have_rows('argument_list_loop') ): ?>
                <?php while( have_rows('argument_list_loop') ) : the_row(); ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-xl-4 mb-2 mx-auto argument_lists_item equal-height">
                        <div class="argument_wrap">
                            <img class="argument_icon" src="<?php the_sub_field('icon');?>">
                            <h2><?php the_sub_field('title');?></h2>
                            <div class="argument_content equal-height"><?php the_sub_field('content');?></div>
                            <?php if (get_sub_field('enable_cta_button')):?>
                                <a class="cta_btn" <?php if (get_sub_field('link_id')):?>id="<?php the_sub_field('link_id'); ?>"<?php endif;?> href="<?php the_sub_field('link_url');?>"><?php the_sub_field('link_name');?></a>
                            <?php endif;?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Argument Lists Area End -->