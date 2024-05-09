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

                    <div class="d-flex justify-content-between event-details">
                        <?php if (get_field('data')):?>
                            <div class="post-meta">
                                <i class="bi bi-calendar3"></i> <?php the_field('data'); ?>
                            </div>
                        <?php endif;?>
                        <?php if (get_field('time_start')):?>
                            <div class="post-meta">
                                <i class="bi bi-clock"></i> <?php the_field('time_start');?>
                            </div>
                        <?php endif;?>
                        <?php if (get_field('location')):?>
                            <div class="post-meta">
                                <i class="bi bi-geo-alt"></i> <?php the_field('location');?>
                            </div>
                        <?php endif;?>
                        <?php if (get_field('more_info')):?>
                            <div class="post-meta">
                                <i class="bi bi-info-circle"></i> <?php the_field('more_info');?>
                            </div>
                        <?php endif;?>
                    </div>

                    <div class="d-flex  <?php if (get_field('registration_link')):?>justify-content-between<?php endif;?> event-details">
                        <?php if (get_field('registration_link')):?>
                            <div class="post-meta">
                                <?php $registration_url = get_field('registration_link'); ?>
                                <a target="_blank" href="<?php echo $registration_url;?>"><i class="fas fa-long-arrow-alt-right"></i> Ilmoittaudu</a>
                            </div>
                        <?php endif;?>
                        <div class="post-meta google_calendar_link pe-5">

                        <?php
                            if (get_field('tapahtumat_title')) {
                                $event_title = get_field('tapahtumat_title');
                            } else {
                                $event_title = the_title();
                            }

                            $location = get_field('location');
                            $info_description = get_field('more_info');

                            $data_start = get_field('data');
                            $data_end = get_field('data_end');
                            $time_start = get_field('time_start');
                            $time_end = get_field('time_end');

                            if (!empty($data_start)) {
                                $data_start_obj = date_create_from_format('d.m.Y', $data_start);
                                $data_start_r = date_format($data_start_obj, 'Ymd');
                            }
                            if (!empty($data_end)) {
                                $data_end_obj = date_create_from_format('d.m.Y', $data_end);
                                $data_end_r = date_format($data_end_obj, 'Ymd');
                            }

                            $gc_time_start_wd = str_replace(':', '', $time_start);
                            $gc_time_end_wd = str_replace(':', '', $time_end);
                        ?>
                            <a target="_blank" href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo $event_title; ?>&details=<?php echo $info_description;?>&&dates=<?php echo $data_start_r;?>T<?php echo $gc_time_start_wd;?>00/<?php echo $data_end_r;?>T<?php echo $gc_time_end_wd;?>00&location=<?php echo $location;?>"><i class="bi bi-plus-circle"></i> Lisää Google-kalenteriin</a>
                        </div>
                        <div class="post-meta">

                            <?php
                            if (!empty($data_start)) {
                                $data_start_lic = date_format($data_start_obj, 'Y-m-d');
                            }
                            if (!empty($data_end)) {
                                $data_end_lic = date_format($data_end_obj, 'Y-m-d');
                            }
                            if (!empty($time_start)) {
                                $start_date = $data_start_lic . ' ' . $time_start . ':00';
                            }
                            if (!empty($time_end)) {
                                $end_date = $data_end_lic . ' ' . $time_end . ':00';
                            }

                            $start = date('Ymd\THis', strtotime($start_date));
                            $end = date('Ymd\THis', strtotime($end_date));

                            $link = 'data:text/calendar;charset=utf-8,BEGIN:VCALENDAR%0AVERSION:2.0%0APRODID:-//Your Company//NONSGML My Product//EN%0A%0AEVENT%0ADTSTART:' . $start_date . 'Z%0ADTEND:' . $end_date . 'Z%0ASUMMARY:' . $event_title . '%0ADESCRIPTION:' . $info_description . '%0ALOCATION:' . $location . '%0AEND:VEVENT%0AEND:VCALENDAR';
                            ?>

                            <?php if (!empty($data_start) && !empty($data_end)):?>
                                <a href="<?php echo $link; ?>" download="event.ics">
                                    <i class="bi bi-plus-circle"></i> Lisää iCal / Outlook kalenteriin
                                </a>
                            <?php endif;?>

                        </div>
                    </div>

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