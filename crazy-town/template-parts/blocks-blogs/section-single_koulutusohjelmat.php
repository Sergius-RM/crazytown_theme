<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
    <!-- Page Banner Start -->
    <section class="blog-banner">

    <div class="banner_overlay"></div>
    <div class="page_header_container container-fluid"
        style="<?php if (get_field('tapahtumat_custom_thumbnail') ): ?>
                    <?php $custom_thumbnail = get_field('tapahtumat_custom_thumbnail');?>
                    background-image: url('<?php echo $custom_thumbnail;?>');
                <?php elseif (has_post_thumbnail() ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                    background-image: url('<?php echo $image[0]; ?>');
                <?php endif;?>">
    </div>

    </section>
    <!-- Page Banner End -->

    <!-- Blog Details Area Start -->
    <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-8 mx-auto blog-content-area">

                    <?php if (get_field('tapahtumat_title') ): ?>
                        <h1 class="page-title"><?php the_field('tapahtumat_title');?></h1>
                    <?php else: ?>
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php endif; ?>

                    <div class="blog-details-content">
                        <?php the_field('tapahtumat_content');?>
                    </div>

                    <?php get_template_part( 'template-parts/blocks-blogs/section-social_sharing' ); ?>

            </div>

        </div>
    </section>
    <!-- Blog Details Area End -->