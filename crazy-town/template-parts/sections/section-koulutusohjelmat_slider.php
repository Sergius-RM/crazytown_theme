<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field('number_of_posts');
$order = get_sub_field('sorting_order');

$categorys = get_sub_field('from_category');
$categorys_array = array( $categorys );

if (empty($categorys)) {

    $args = array(
        'post_type'         => 'koulutusohjelmat',
        'posts_per_page'    => $number,
        'orderby' => $order
    );

} else {

    $args = array(
        'post_type'         => 'koulutusohjelmat',
        'posts_per_page'    => $number,
        'orderby' => $order,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'koulutusohjelmat_cat',
                'field' => 'id',
                'terms'    => $categorys_array[0],
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

<!-- Koulutusohjelmat Articles Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?>
    class="highlighted_articles">
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
        <div class="row justify-content-center slider related_articles_list">

            <?php $wpex_query = new WP_Query( $args );
            foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
            <div class="col-xl-4 col-md-6" id="post-<?php the_ID(); ?>">
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
                        <?php if (get_field('tapahtumat_title') ): ?>
                            <h4 class="page-title">
                                <a href="<?php the_permalink(); ?>"><?php the_field('tapahtumat_title');?></a>
                            </h4>
                        <?php else: ?>
                            <h4 class="page-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        <?php endif; ?>

                        <p><?php echo custom_excerpt($excerpt_lenght); ?></p>

                        <a href="<?php the_permalink(); ?>" class="learn-more"><?php esc_html_e('Lue lisää'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
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
<!-- Koulutusohjelmat Articles Area END  -->
