<?php
/**
 * Template Name: Blog Post
 * Template Post Type: post
 * The template for displaying all single posts
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- start of the loop -->
<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/blocks-blogs/section-single_event' ); ?>

<?php endwhile; ?>
<!-- end of the loop -->

<!-- Blog Wigets Area Start -->
<?php if ( have_rows( 'blog_default_sections' ) ) : ?>
    <?php while ( have_rows('blog_default_sections' ) ) : the_row();
        if ( get_row_layout() == 'event_infobox' ) :
            get_template_part('template-parts/blocks-blogs/section', 'event_infobox');

        elseif ( get_row_layout() == 'event_related' ) :
            get_template_part('template-parts/blocks-blogs/section', 'event_related');

        elseif ( get_row_layout() == 'event_custom_form' ) :
            get_template_part('template-parts/blocks-blogs/section', 'event_custom_form');

        ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Blog Wigets Area End -->


<?php get_footer();