<?php
$image = get_sub_field('header_background_img');
?>

<!-- Page Header Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="page_header_section <?php if (get_sub_field('head_bottom_padding')):?>head_bottom_padding<?php else:?>no_padding<?php endif;?>" >
    <div class="banner_overlay"></div>
    <div class="page_header_container container-fluid" style="<?php if (get_sub_field( 'header_background_img')): ?>background-image: url('<?php echo esc_url($image['url']); ?>');<?php endif;?>">
        <div class="container mx-auto">

            <?php if (is_singular('sijainnit')):?>
                <?php
                $sijainnit = get_post_type_object('sijainnit');
                $current_id = get_the_ID();

                $args = array(
                    'post_type' => 'sijainnit',
                    'posts_per_page' => -1,
                    'order' => 'asc',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :?>
                    <div class="header_top_links d-flex">
                    <?php while ($query->have_posts()) : ?>
                        <?php $query->the_post();?>
                        <a
                            class="header_top_links_item
                            <?php if (isset($current_id) && $current_id === get_the_ID()):?>active_link<?php endif;?>"
                            href="<?php the_permalink();?>">
                            <?php the_title();?>
                        </a>
                    <?php endwhile; ?>
                    </div>
                <?php endif;?>
                <?php wp_reset_postdata();?>
            <?php endif;?>

            <?php if( have_rows('sijainnit_contacts_info') ): ?>
                <div class="header_contacts_info d-flex">
                    <?php while( have_rows('sijainnit_contacts_info') ) : the_row(); ?>
                        <?php $icon = get_sub_field('icon'); ?>
                        <a target="_blank"
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

            <div class="row align-items-center">
                <div class="col-sm-10 col-md-10 col-lg-8 center-area">
                    <h1 class="hero_title">
                        <?php echo get_sub_field('header_title_h1');?>
                    </h1>
                    <?php if (get_sub_field( 'content')): ?>
                        <span class="page_header_content d-block">
                            <?php echo get_sub_field('content');?>
                        </span>
                    <?php endif;?>

                    <div class="row page_header_autor_contacts d-flex">
                        <?php if( have_rows('member_contacts') ): ?>
                            <?php while( have_rows('member_contacts') ) : the_row(); ?>

                            <div class="col-12 col-md-6 contactus_content_item align-items-center d-flex">
                            <?php if ( get_sub_field('image') ):?>
                                <?php $about_content_img = get_sub_field('image');?>
                                <div class="about-content-img">
                                    <img src="<?php echo $about_content_img;?>">
                                </div>
                            <?php endif; ?>

                            <div class="about-content">
                                <?php if (get_sub_field('title')):?>
                                    <h4><?php $contacts_title = the_sub_field('title'); ?>
                                        <?php echo $contacts_title;?>
                                    </h4>
                                <?php endif;?>
                                <?php if (get_sub_field('subtitle')):?>
                                    <span><?php $contacts_subtitle = the_sub_field('subtitle'); ?>
                                        <?php echo $contacts_subtitle;?>
                                    </span>
                                <?php endif;?>

                                <?php if( have_rows('contacts_info') ): ?>
                                    <ul>
                                    <?php while( have_rows('contacts_info') ) : the_row(); ?>
                                        <li>
                                            <?php $icon = get_sub_field('icon'); ?>
                                            <a target="_blank"
                                                href="<?php if($icon == 'envelope-fill'): ?>
                                                    mailto:<?php the_sub_field('url'); ?>
                                                    <?php elseif($icon == 'telephone-fill'): ?>
                                                    tel:<?php the_sub_field('url'); ?>
                                                    <?php else:?>
                                                    <?php the_sub_field('url'); ?>
                                                    <?php endif; ?>">
                                                <i class="bi bi-<?php echo $icon;?>"></i> <?php the_sub_field('contact'); ?>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                                </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <?php if( have_rows('links_list') ): ?>
                        <div class="header_top_links d-flex">
                            <?php while( have_rows('links_list') ) : the_row(); ?>
                                <a
                                    class="header_top_links_item <?php if( get_sub_field('active') ): ?>active_link<?php endif; ?>"
                                    href="<?php the_sub_field('link_url');?>">
                                    <?php the_sub_field('link_name');?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_sub_field( 'enable_cta_button')): ?>
                        <a class="read_more_link" <?php if (get_sub_field('hero_link_id')):?>id="<?php the_sub_field('hero_link_id'); ?>"<?php endif;?> href="<?php echo get_sub_field('hero_link_url');?>"><?php echo get_sub_field('hero_link_text');?></a>
                    <?php endif;?>

                    <?php if (is_page_template('template-blog.php')):?>
                        <div class="search_form">
                            <?php get_search_form();?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Header Section End -->