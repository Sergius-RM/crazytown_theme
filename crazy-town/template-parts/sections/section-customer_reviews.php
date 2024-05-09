<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field( 'number_of_posts' );
$orderby = get_sub_field( 'order_by' );
$order = get_sub_field( 'sorting_order' );

$currentlanguage = apply_filters( 'wpml_current_language', NULL );
$review_posts = get_posts( array(
    'post_type'      => 'customer_reviews',
    'post_status'    => 'publish',
    'posts_per_page' => $number,
    'orderby'        => $orderby,
    'order'          => $order,
    'suppress_filters' => false
) );

if ( $currentlanguage ) {
    $args['lang'] = $currentlanguage;
}

?>

<!-- Customer Reviews Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="review_customer_section">
    <div class="container">

        <div class="review_customer_info text-center">
            <?php if( get_sub_field('subtitle') ): ?>
                <h6><?php the_sub_field('subtitle'); ?></h6>
            <?php endif; ?>

            <h2><?php the_sub_field('h2_header'); ?></h2>

            <?php if( get_sub_field('content') ): ?>
                <?php the_sub_field('content'); ?>
            <?php endif; ?>
        </div>

        <div class="row mx-auto review_customer_list">

        <?php if ( $review_posts ): ?>
            <?php
            foreach ( $review_posts as $post ): setup_postdata($post); $thumb_src = null;
            if ( has_post_thumbnail($post->ID) ) {
                $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
                $thumb_src = $src[0]; }
            ?>
                <div class="col-sm-12 col-md-4 col-xl-4 review_customer_item equal-height mx-auto">
                    <div class="review_item">

                            <?php if ( $thumb_src ): ?>
                                <img class="review_customer_thumbnail" src="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>, <?php the_field('review_customer_name'); ?>">
                            <?php endif; ?>

                            <?php if( get_field('review_customer_logo') ): ?>
                                <img class="review_customer_logo" src="<?php echo the_field('review_customer_logo'); ?>" alt="">
                            <?php endif; ?>

                            <?php if( get_field('review_customer_content') ): ?>
                                <div class="review_customer_content">
                                    <?php echo the_field('review_customer_content'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( get_field('review_customer_name') ): ?>
                                <h4><?php echo the_field('review_customer_name'); ?></h4>
                            <?php endif; ?>

                            <?php if( get_field('review_customer_company') ): ?>
                                <div class="review_customer_company"><?php echo the_field('review_customer_company'); ?></div>
                            <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php wp_reset_query();?>
        </div>
    </div>

</section>
<!-- Customer Reviews Area END  -->
