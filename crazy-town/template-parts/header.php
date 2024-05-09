<?php
/**
 * The template for displaying header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>

<!-- START Top Header Area -->
<div class="container-fluid header_top align-items-center justify-content-end">
    <!-- Socials Area Start -->
    <div class="social_links">
        <?php if( have_rows('social_links', 'option') ): ?>
            <?php while( have_rows('social_links', 'option') ) : the_row(); ?>
                <a target="_blank" href="<?php the_sub_field('url'); ?>">
                        <i class="bi <?php the_sub_field('service_ico'); ?>"></i>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <!-- END Socials Area Start -->

    <div class="lang_select align-items-center d-flex">
        <!-- <div class="lang_ico"></div> -->
        <?php dynamic_sidebar( 'header_top' ); ?>
    </div>
</div>
<!-- END Top Header Area -->

<!-- Start main Header -->
<header class="header_area full-width" role="banner">
    <!--Header-Upper-->

    <div class="site-header">
        <div class="site-branding d-flex">

            <span class="navbar-brandlogo_area no_mobile">
                <span class="header-logo-darkmode">
                    <?php the_custom_logo();?>
                </span>
            </span>

            <!-- Main Menu -->
            <nav class="site-navigation">
                <div class="no_mobile" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                </div>
            </nav>
            <!-- Main Menu End-->

            <!-- Mobile Menu -->
            <div class="navbar navbar-dark bg-dark <?php print $navbar_style;?> is_onmobile">
                <span class="navbar-brandlogo_area">
                    <span class="header-logo-darkmode">
                        <?php the_custom_logo();?>
                    </span>

                </span>
                <div class="banner_overlay"></div>
                <div class="collapse mob_menu" id="navbarToggleExternalContent">
                    <div role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                    </div>
                </div>

                <button class="navbar-toggler is_onmobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Mobole Menu End-->
        </div>
    </div>
    <!--End Header Upper-->
</header>
