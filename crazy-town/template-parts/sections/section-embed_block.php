<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$type_video = get_sub_field('type_video');
?>

<!-- Single Photo Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="embed_code_section">
    <div class="container">
        <div class="row">
            <?php if (get_sub_field('subtitle')):?>
                <h6 class="col-12 col-lg-6 mx-auto text-center"><?php the_sub_field('subtitle'); ?></h6>
            <?php endif;?>
        </div>
        <div class="row">
            <?php if (get_sub_field('title')):?>
                <h2 class="col-12 col-lg-8 mx-auto text-center"><?php the_sub_field('title'); ?></h2>
            <?php endif;?>
        </div>
        <div class="row">
            <?php if (get_sub_field('content')):?>
                <div class="col-12 col-lg-6 mx-auto text-center embed_code_content">
                    <?php the_sub_field('content'); ?>
                </div>
            <?php endif;?>
        </div>

        <?php if (get_sub_field('embed_code')):?>
            <div class="embed_code_item">
                <?php the_sub_field('embed_code'); ?>
            </div>
        <?php endif;?>
    </div>
</section>
<!-- Video Lists Area End -->