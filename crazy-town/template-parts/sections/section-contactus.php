<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Contact US Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="contactus_section wrap_two_columns">
    <div class="container">
        <div class="row mx-auto justify-content-end section_two_columns">

            <h6 class="sub-title"><?php the_sub_field('contactus_subtitle_h4'); ?></h6>
            <h3><?php the_sub_field('contactus_title_h2'); ?></h3>
            <p><?php the_sub_field('contactus_content_area'); ?></p>

            <div class="col-sm-12 col-md-6 col-lg-6 contactus_form">
                <?php if (get_sub_field('contactus_shortcode_form')):?>
                    <?php $form_id = get_sub_field('contactus_shortcode_form');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 contactus_content">
                <?php if( have_rows('contacts_array_info') ): ?>
                    <?php while( have_rows('contacts_array_info') ) : the_row(); ?>

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
                                        href="<?php if($icon == 'envelope-fill'): ?>mailto:<?php the_sub_field('url'); ?><?php elseif($icon == 'telephone-fill'): ?>tel:<?php the_sub_field('url'); ?><?php else:?><?php the_sub_field('url'); ?><?php endif; ?>">
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

                <?php if( get_sub_field('enable_cta_button') ): ?>
                    <a <?php if (get_sub_field('button_id')):?>id="<?php the_sub_field('button_id'); ?>"<?php endif;?> class="cta_btn" href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>
<!-- Contact US Section End -->