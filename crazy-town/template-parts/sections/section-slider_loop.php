<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Image Slider Loop Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="slider_loop_section">
    <div class="container-fluid">

        <div class="row align-items-center mx-auto slider slide_list">
            <?php if( have_rows('img_slide_loop') ): ?>
                <?php while( have_rows('img_slide_loop') ) : the_row(); ?>
                    <div class="slide_item">
                        <?php if ( get_sub_field('img_item') ):?>
                            <?php $image_item = get_sub_field('img_item');?>
                            <img src="<?php echo $image_item;?>">
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
</section>
<!-- Image Slider Loop Area END  -->
