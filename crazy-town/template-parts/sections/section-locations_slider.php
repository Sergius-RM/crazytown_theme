<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field('number_of_posts');
$orderby = get_sub_field('order_by');
$order = get_sub_field('sorting_order');

$args = array(
    'post_type'         => 'sijainnit',
    'posts_per_page'    => $number,
    'orderby'           => $orderby,
    'order'             => $order,
);

// $text = get_the_excerpt();
// $words = 20;
// $excerpt_lenght = 20;
// $more = '…';
// $excerpt = wp_trim_words( $text, $words, $more );
?>

<!-- Related Articles Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="highlighted_articles locations_slider_section">
    <div class="container-fluid">
        <div class="container section-title d-flex align-items-center">
            <?php if( get_sub_field('h2_header') ): ?>
                <h2><?php echo get_sub_field('h2_header'); ?></h2>
            <?php endif; ?>

                <?php if (get_sub_field('enable_cta_button')):?>
                    <a class="more_posts" target="_blank" <?php if (get_sub_field('button_link')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
        </div>


        <div class="swiper swiper_location">
            <div class="swiper-wrapper">

            <?php $wpex_query = new WP_Query( $args );
            foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
            <div class="swiper-slide" id="post-<?php the_ID(); ?>">
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
                    </div>

                    <div class="articles-content">
                        <h4 class="page-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                        <div class="excerpt">
                            <p><?php the_excerpt();?>
                                <!-- <?php echo custom_excerpt($excerpt_lenght); ?> -->
                            </p>
                        </div>

                        <?php if( have_rows('sijainnit_contacts_info') ): ?>
                            <div class="meta_data ">
                                <?php while( have_rows('sijainnit_contacts_info') ) : the_row(); ?>
                                    <?php $icon = get_sub_field('icon'); ?>
                                    <a class="d-block"
                                        target="_blank"
                                        href="<?php if($icon == 'envelope-fill'): ?>
                                            mailto:<?php the_sub_field('url'); ?>
                                            <?php elseif($icon == 'telephone-fill'): ?>
                                            tel:<?php the_sub_field('url'); ?>
                                            <?php else:?>
                                            <?php the_sub_field('url'); ?>
                                            <?php endif; ?>">
                                        <i class="bi bi-<?php echo $icon;?>"></i> <?php the_sub_field('contact'); ?>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="learn-more"><?php esc_html_e('Tutustu sijaintiin'); ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
</section>
<!-- Related Articles Area END  -->
