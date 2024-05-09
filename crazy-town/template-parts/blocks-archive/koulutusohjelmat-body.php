<?php
$text = get_the_excerpt();
$words = 20;
$excerpt_lenght = 20;
$more = '…';
$excerpt = wp_trim_words( $text, $words, $more ); ?>

<!-- Koulutusohjelmat Grid Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
        class="blogrid_articles">
    <div class="container">
        <div class="row">

            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>

                <div class="col-sm-6 col-md-6 col-xl-4" id="post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
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

            <?php endwhile; ?>

        </div>
    </div>
</section>
<!-- Koulutusohjelmat Grid Area End -->