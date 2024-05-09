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

            <div class="header_title text-center">
                <?php if (get_sub_field( 'header_subtitle')): ?>
                    <h6 class="hero_title">
                        <?php echo get_sub_field('header_subtitle');?>
                    </h6>
                <?php endif;?>
                <h1 class="hero_title">
                    <?php echo get_sub_field('header_title_h1');?>
                </h1>
            </div>

            <div class="row mx-auto">
                <div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center center-area">
                    <div class="page_header_autor_contacts">
                        <?php if( have_rows('autor_contacts') ): ?>
                            <?php while( have_rows('autor_contacts') ) : the_row(); ?>

                            <div class="contactus_content_item align-items-center d-flex">
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

                                <?php if( have_rows('contacts_contacts_info') ): ?>
                                    <ul>
                                    <?php while( have_rows('contacts_contacts_info') ) : the_row(); ?>
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
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center contactus_form">
                    <?php if (get_sub_field('contactus_shortcode_form')):?>
                        <?php $form_id = get_sub_field('contactus_shortcode_form');?>
                        <?php echo do_shortcode('[gravityform id="'. $form_id[0] .'" title="false" description="false" ajax="true"]');?>
                    <?php endif;?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Page Header Section End -->