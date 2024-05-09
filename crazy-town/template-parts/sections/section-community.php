<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Сommunity Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
    class="community_section">
    <div class="container-fluid">
        <div class="container">

            <!-- Сommunity Head  -->
            <div class="review_customer_info mx-auto text-center community_head">
                <?php if( get_sub_field('community_subtitle') ): ?>
                    <h6><?php the_sub_field('community_subtitle'); ?></h6>
                <?php endif; ?>

                <?php if( get_sub_field('community_head') ): ?>
                    <h2><?php the_sub_field('community_head'); ?></h2>
                <?php endif; ?>
            </div>
            <!-- Сommunity Head END -->

            <!-- Сommunity Advantages Section Start -->
            <div class="row align-items-center mx-auto community_advantages">

                <div class="col-lg-6 featured_benefits_content">
                    <h6><?php the_sub_field('subtitle'); ?></h6>
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>

                <div class="col-lg-6 featured_benefits_list">
                    <?php if( have_rows('community_advantages') ): ?>
                        <ul>
                        <?php while( have_rows('community_advantages') ) : the_row(); ?>
                            <li class="d-flex align-items-center">
                                <?php if ( get_sub_field('icon') ):?>
                                    <?php $quick_order_image = get_sub_field('icon');?>
                                    <img src="<?php echo $quick_order_image;?>">
                                <?php endif; ?>
                                <h4><?php the_sub_field('content'); ?></h4>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            </div>
            <!-- Сommunity Advantages Section END -->

            <!-- Сommunity Two Columns Section Start -->
            <div class="row align-items-center mx-auto community_two_columns">

                <div class="col-lg-6 statements_image">
                    <?php if ( get_sub_field('body_img') ):?>
                        <?php $body_img = get_sub_field('body_img');?>
                        <img class="left_img" src="<?php echo $body_img;?>">
                    <?php endif; ?>

                    <?php if ( get_sub_field('body_stamp') ):?>
                        <?php $body_stamp = get_sub_field('body_stamp');?>
                        <img class="stamp" src="<?php echo $body_stamp;?>">
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 statements_content">
                    <h6><?php the_sub_field('body_subtitle'); ?></h6>
                    <h2><?php the_sub_field('body_title'); ?></h2>
                    <div class="content"><?php the_sub_field('body_content'); ?></div>

                    <?php if (get_sub_field('enable_cta_button')):?>
                        <a class="cta_btn" <?php if (get_sub_field('body_link_id')):?>id="<?php the_sub_field('body_link_id'); ?>"<?php endif;?> href="<?php the_sub_field('body_link_url'); ?>">
                            <?php the_sub_field('body_link'); ?>
                        </a>
                    <?php endif;?>
                </div>

            </div>
            <!-- Сommunity Two Columns Section END -->

            <!-- Сommunity Member Slider Start -->
            <?php if( have_rows('member_slider') ): ?>

            <div class="community_separator_section">
                <div class="community_separator_item">
                </div>
            </div>
                <div class="community_members">
                <div class="row align-items-center mx-auto slider community_member_slider">
                <?php while( have_rows('member_slider') ) : the_row(); ?>

                    <div class="d-flex">
                        <?php if ( get_sub_field('member_image') ):?>
                            <div class="member_image">
                                <?php $member_image = get_sub_field('member_image');?>
                                <img src="<?php echo $member_image;?>">
                            </div>
                        <?php endif; ?>

                        <div class="member_info">
                            <?php if( get_sub_field('member_title') ): ?>
                                <h3><?php the_sub_field('member_title'); ?></h3>
                            <?php endif; ?>

                            <?php if( get_sub_field('member_content') ): ?>
                                <div class="member_content">
                                    <?php the_sub_field('member_content'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( get_sub_field('member_name') ): ?>
                                <h6><?php the_sub_field('member_name'); ?></h6>
                            <?php endif; ?>

                            <?php if( get_sub_field('member_company') ): ?>
                                <div class="member_company"><?php the_sub_field('member_company'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>
                </div>
                </div>
            <?php endif; ?>
           <!-- Сommunity Member Slider END -->
        </div>
    </div>

    <?php if( have_rows('list_of_features') ): ?>
    <!-- Сommunity Features Start -->
    <div class="container community_features_icon">
        <div class="row">

            <?php while( have_rows('list_of_features') ) : the_row(); ?>
                <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                    <?php if ( get_sub_field('icon') ):?>
                        <?php $quick_order_image = get_sub_field('icon');?>
                        <img src="<?php echo $quick_order_image;?>">
                    <?php endif; ?>
                    <h4><?php the_sub_field('content'); ?></h4>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
    <!-- Сommunity Features END -->
    <?php endif; ?>

</section>
<!-- Сommunity Section End -->