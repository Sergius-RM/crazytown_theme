<!-- Events Grid Area Start -->
<section <?php if (get_sub_field('enable_anchor')) : ?>
        id="<?php the_sub_field('anchor_name'); ?>"
    <?php endif; ?> class="blogrid_articles">
    <div class="container">
        <div class="row tapahtumat_row">
            <div class="col-md-12">
                <h2>Tulevat tapahtumat</h2>
            </div>

            <?php
            // Start the Loop.
            $current_date = strtotime(date('Y-m-d'));
            $future_events_found = false;

            while (have_posts()) : the_post();

                $event_date = get_field('data'); // Получаем дату события
                $event_timestamp = strtotime($event_date);

                // Проверяем, является ли событие будущим или прошедшим
                if ($event_timestamp >= $current_date) :
                    $future_events_found = true;
                    ?>

                    <div class="col-sm-6 col-md-6 col-xl-4" id="post-<?php the_ID(); ?>">
                        <div class="articles-item">
                            <div class="image">
                                <?php if (has_post_thumbnail($post->ID)) : ?>
                                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'image_full'); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                                    </a>
                                <?php endif; ?>

                                <?php if (get_field('data') || get_field('time_start')) : ?>
                                    <div class="meta_info d-flex">
                                        <?php if (get_field('data')) : ?>
                                            <div class="meta_data">
                                                <i class="bi bi-calendar3"></i> <?php the_field('data'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (get_field('time_start')) : ?>
                                            <div class="meta_time">
                                                <i class="bi bi-clock"></i> <?php the_field('time_start'); ?> - <?php the_field('time_end'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="articles-content">
                                <?php if (get_field('tapahtumat_title')) : ?>
                                    <h4 class="page-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_field('tapahtumat_title'); ?></a>
                                    </h4>
                                <?php else : ?>
                                    <h4 class="page-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                <?php endif; ?>

                                <?php if (get_field('location')) : ?>
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
                endif;
            endwhile;

            if (!$future_events_found) :
                echo '<div class="col-md-12">Ei vielä suunniteltuja tapahtumia</div>';
            endif;
            ?>
        </div>

        <div class="row tapahtumat_row">

            <div class="col-md-12">
                <h2>Menneet tapahtumat</h2>
            </div>

            <?php
            // Start the Loop again to display past events
            $past_events_found = false;

            rewind_posts(); // Возвращаемся к началу списка записей

            while (have_posts()) : the_post();

                $event_date = get_field('data'); // Получаем дату события
                $event_timestamp = strtotime($event_date);

                // Проверяем, является ли событие прошедшим
                if ($event_timestamp < $current_date) :
                    $past_events_found = true;
                    ?>

                    <div class="col-sm-6 col-md-6 col-xl-4" id="post-<?php the_ID(); ?>">
                        <div class="articles-item">
                            <div class="image">
                                <?php if (has_post_thumbnail($post->ID)) : ?>
                                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'image_full'); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                                    </a>
                                <?php endif; ?>

                                <?php if (get_field('data') || get_field('time_start')) : ?>
                                    <div class="meta_info d-flex">
                                        <?php if (get_field('data')) : ?>
                                            <div class="meta_data">
                                                <i class="bi bi-calendar3"></i> <?php the_field('data'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (get_field('time_start')) : ?>
                                            <div class="meta_time">
                                                <i class="bi bi-clock"></i> <?php the_field('time_start'); ?> - <?php the_field('time_end'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="articles-content">
                                <?php if (get_field('tapahtumat_title')) : ?>
                                    <h4 class="page-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_field('tapahtumat_title'); ?></a>
                                    </h4>
                                <?php else : ?>
                                    <h4 class="page-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                <?php endif; ?>

                                <?php if (get_field('location')) : ?>
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
                endif;
            endwhile;

            if (!$past_events_found) :
                echo '<div class="col-md-12">Ei menneitä tapahtumia</div>';
            endif;
            ?>

        </div>
    </div>
</section>
<!-- Events Grid Area End -->
