<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$copyright_data = get_field('copyright_data', 'option');

?>

<!-- Footer Area Start -->
<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container-fluid">
        <div class="row">

            <!-- Branding Area Start -->
            <div class="col-sm-12 col-md-4 col-xl-4 site-branding">

                <?php the_custom_logo();?>

            <!-- Socials Area Start -->
            <div class="footer_socials">
                <?php if( have_rows('social_links', 'option') ): ?>
                    <?php while( have_rows('social_links', 'option') ) : the_row(); ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>">
                                <i class="bi <?php the_sub_field('service_ico'); ?>"></i>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Socials Area Start -->
            </div>
            <!-- END Branding Area -->

            <!-- Footer Nav Area Start -->
            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 footer_nav" role="navigation">
                <?php dynamic_sidebar( 'footer_1' ); ?>
            </div>
            <!-- Footer Nav Area -->

            <!-- Ordering Area Start -->
            <div class="col-12 col-xs-6 col-sm-6 col-md-4 col-xl-4 footer_ordering">
                <?php if( have_rows('orderind_link', 'option') ): ?>
                    <?php while( have_rows('orderind_link', 'option') ) : the_row(); ?>
                        <h3>
                            <?php the_sub_field('title'); ?>
                        </h3>
                        <a target="_blank" id="<?php the_sub_field('link_id'); ?>" href="<?php the_sub_field('url'); ?>">
                            <?php the_sub_field('link_text'); ?> <i class="bi bi-arrow-right"></i>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Ordering Area -->

            <!-- Contacts Info Area Start -->
            <div class="row footer_contact_wiget">
                <?php if( have_rows('contact_wiget', 'option') ): ?>
                    <?php while( have_rows('contact_wiget', 'option') ) : the_row(); ?>

                        <div class="col-12 col-xs-6 col-sm-5 col-md-4 col-xl-4 mx-auto footer_contacts">

                            <h3><?php $contacts_title = the_sub_field('contacts_title', 'option'); ?>
                            <?php echo $contacts_title;?></h3>

                            <?php if (have_rows('topbaremails', 'option')) { ?>
                                <?php while (have_rows('topbaremails', 'option')) {
                                    the_row(); ?>
                                        <a href="mailto:<?php the_sub_field('top_bar_email_link');?>" target="_blank">
                                            <i class="bi bi-envelope-fill"></i> <?php the_sub_field('top_bar_email');?></a>
                                <?php } ?>
                            <?php } ?>

                            <?php if (have_rows('topbarphones', 'option')) { ?>
                                <?php while (have_rows('topbarphones', 'option')) {
                                    the_row(); ?>
                                        <a href="tel:<?php the_sub_field('top_bar_phone_link');?>" target="_blank">
                                            <i class="bi bi-telephone-fill"></i><?php the_sub_field('top_bar_phone');?></a>
                                <?php } ?>
                            <?php } ?>

                            <?php if (have_rows('physical_adress', 'option')) {
                                while (have_rows('physical_adress', 'option')) {
                                    the_row(); ?>
                                        <div class="physical_adress"><i class="bi bi-geo-alt-fill"></i> <?php the_sub_field('short_physical_adress');?></div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Contacts Info Area -->

            <!-- Ordering Area Start -->
            <div class="footer_entrepreneurs d-flex">
                <?php if( have_rows('footer_logo_area', 'option') ): ?>
                    <?php while( have_rows('footer_logo_area', 'option') ) : the_row(); ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>">
                            <img src="<?php the_sub_field('logo_img'); ?>" alt="footer_entrepreneurs logo">
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Ordering Area -->

        </div>
    </div>

</footer>
 <!-- Footer Area End -->

<!-- START Copyright Area -->
<div class="container-fluid footer_copyright">
    <div class="row align-items-center">
        <div class="col-12 col-sm-6 col-xl-6 footer_copyright_menu">
            <?php dynamic_sidebar( 'footer_bottom' ); ?>
        </div>
        <div class="col-12 col-sm-6 col-xl-6 copyright_data">
            <?php echo $copyright_data;?>
        </div>
    </div>
</div>
<!-- END Copyright Area -->