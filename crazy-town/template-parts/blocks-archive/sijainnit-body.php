<?php
$text = get_the_excerpt();
$words = 20;
$excerpt_lenght = 20;
$more = '…';
$excerpt = wp_trim_words( $text, $words, $more ); ?>

<!-- Events Grid Area Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
        class="blogrid_articles sijainnit_grid_articles">
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
                            <h4 class="page-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>

                            <div class="excerpt">
                                <p><?php echo custom_excerpt($excerpt_lenght); ?></p>
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

            <?php endwhile; ?>

        </div>
    </div>
</section>
<!-- Events Grid Area End -->