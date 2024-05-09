<?php
/**
 * The template for displaying the header
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$expires = 60 * 60 * 24 * 30; // 30 дней в секундах
header("Cache-Control: max-age=$expires, must-revalidate");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expires) . " GMT");
?>

<!DOCTYPE html>
<html
    <?php language_attributes(); ?>
    class="no-js"
>

    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <?php $viewport_content = apply_filters('hello_elementor_viewport_content', 'width=device-width, initial-scale=1'); ?>
        <meta
            name="viewport"
            content="<?php echo esc_attr($viewport_content); ?>"
        >
        <!-- favicon here -->

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>

        <?php if (  get_field( 'google_analytics', 'option') ) :?>
            <?php $headcode = get_field('google_analytics', 'option');
                print $headcode;?>
        <?php endif ?>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NQD9F85');</script>
		
        <!-- End Google Tag Manager -->
    </head>

    <body <?php body_class();?>>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQD9F85"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

        <?php if (  get_field( 'google_analytics_body', 'option') ) :?>
            <?php $bodycode = get_field('google_analytics_body', 'option');
                print $bodycode; ?>
        <?php endif ?>

        <?php wp_body_open();
            get_template_part('template-parts/header');
        ?>
