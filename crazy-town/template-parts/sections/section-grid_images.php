<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<!-- Grid Images Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="grid_images_section">
    <div class="container-fluid">
        <div class="row gallery">
            <?php if( have_rows('grid_images_gallery') ): ?>
                <?php while( have_rows('grid_images_gallery') ) : the_row(); ?>
                <?php $id = get_row_index();?>
                    <div class="col-3 gallery-item div<?php echo $id;?>">
                        <img src="<?php the_sub_field('image_item');?>">
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Grid Images Area End -->