<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field('number_of_posts');
$order = get_sub_field('sorting_order');
$colnumber = get_sub_field('number_columns');

$events = get_sub_field('from_event_category');
$events_array = array( $events );

$city = get_sub_field('from_city');
$city_array = array( $city );

$current_date = date('Y-m-d');
$by_data = get_sub_field('by_data');
if ($by_data == 'future') {
    $meta_key_data = '>=';
} else if ($by_data == 'past') {
    $meta_key_data = '<';
}

if ( get_sub_field('swap_by_category') == 'by_cat' ) {

    $args = array(
        'post_type' => 'tapahtumat',
        'posts_per_page'    => $number,
        'order'             => $order,
        'post_status' => 'publish',
        'meta_key' => 'data',
        'orderby' => 'meta_value',
        'meta_query' => array(
            array(
                'key' => 'data',
                'value' => $current_date,
                'compare' => $meta_key_data,
                'type' => 'DATE'
            )
        ),
        'tax_query' => array(
            array(
                'taxonomy' => 'citys',
                'field' => 'id',
                'terms'    => $events_array[0],
            )
        )
    );

} else if (get_sub_field('swap_by_category') == 'by_city') {

    $args = array(
        'post_type' => 'tapahtumat',
        'post_status' => 'publish',
        'meta_key' => 'data',
        'orderby' => 'meta_value',
        'posts_per_page'    => $number,
        'order'             => $order,
        'meta_query' => array(
            array(
                'key' => 'data',
                'value' => $current_date,
                'compare' => $meta_key_data,
                'type' => 'DATE'
            )
        ),
        'tax_query' => array(
            array(
                'taxonomy' => 'citys',
                'field' => 'id',
                'terms'    => $city_array[0],
            )
        )
    );

}

$text = get_the_excerpt();
$words = 20;
$excerpt_lenght = 20;
$more = '…';
$excerpt = wp_trim_words( $text, $words, $more );
?>

<!-- Events Grid Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="blogrid_articles events_grid_section">
    <div class="container">

        <div class="section-title">
            <?php if( get_sub_field('h2_header') ): ?>
                <h2><?php echo get_sub_field('h2_header'); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row">

            <div class="blogrid-content">
                <?php if( get_sub_field('content') ): ?>
                    <?php echo get_sub_field('content'); ?>
                <?php endif; ?>
            </div>

            <?php $wpex_query = new WP_Query( $args );
            foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
            <div class="col-sm-6 col-md-6 col-xl-<?php echo $colnumber;?>" id="post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
                <div class="articles-item">
                    <div class="image">
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                            </a>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                            </a>
                        <?php endif; ?>
                        <div class="meta_info d-flex">
                            <?php if (get_field('data')):?>
                                <div class="meta_data">
                                    <i class="bi bi-calendar3"></i> <?php the_field('data'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (get_field('time_start')):?>
                                <div class="meta_time">
                                    <i class="bi bi-clock"></i> <?php the_field('time_start'); ?> - <?php the_field('time_end'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="articles-content">

                        <div class="entry-date">
                            <?php if (get_field('data')):?>
                                <?php the_field('data'); ?>
                            <?php else: ?>
                                <?php echo get_the_date('d.m.Y'); ?>
                            <?php endif; ?>
                        </div>
                        <?php if (get_field('tapahtumat_title') ): ?>
                            <h4 class="page-title">
                                <a href="<?php the_permalink(); ?>"><?php the_field('tapahtumat_title');?></a>
                            </h4>
                        <?php else: ?>
                            <h4 class="page-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        <?php endif; ?>

                        <?php if (get_field('location')):?>
                            <div class="meta_location">
                                <i class="bi bi-geo-alt"></i> <?php the_field('location'); ?>
                            </div>
                        <?php endif; ?>

                        <p><?php echo custom_excerpt($excerpt_lenght); ?></p>

                        <a href="<?php the_permalink(); ?>" class="learn-more"><?php esc_html_e('Lue lisää'); ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
</section>
<!-- Events Grid Area END  -->
