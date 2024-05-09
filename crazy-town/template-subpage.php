<?php
/**
 * Template name: Subpage Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header();
?>

<?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows('sections' ) ) : the_row();
        if ( get_row_layout() == 'hero' ) :
            get_template_part('template-parts/sections/section', 'hero');

        elseif ( get_row_layout() == 'quick_order' ) :
            get_template_part('template-parts/sections/section', 'quick_order');

        elseif ( get_row_layout() == 'featured_benefits' ) :
            get_template_part('template-parts/sections/section', 'featured_benefits');

        elseif ( get_row_layout() == 'two_columns' ) :
            get_template_part('template-parts/sections/section', 'two_columns');

        elseif ( get_row_layout() == 'two_columns_stamp' ) :
            get_template_part('template-parts/sections/section', 'featuredblock');

        elseif ( get_row_layout() == 'highlighted_articles' ) :
            get_template_part('template-parts/sections/section', 'highlighted_articles');

        elseif ( get_row_layout() == 'podcast' ) :
            get_template_part('template-parts/sections/section', 'podcast');

        elseif ( get_row_layout() == 'contactus' ) :
            get_template_part('template-parts/sections/section', 'contactus');

        elseif ( get_row_layout() == 'page_header' ) :
            get_template_part('template-parts/sections/section', 'page_header');

        elseif ( get_row_layout() == 'page_header_contacts' ) :
            get_template_part('template-parts/sections/section', 'page_header_contacts');

        elseif ( get_row_layout() == 'pricing' ) :
            get_template_part('template-parts/sections/section', 'pricing');

        elseif ( get_row_layout() == 'blog_grid' ) :
            get_template_part('template-parts/sections/section', 'blog_grid');

        elseif ( get_row_layout() == 'events_grid' ) :
            get_template_part('template-parts/sections/section', 'events_grid');

        elseif ( get_row_layout() == 'team' ) :
            get_template_part('template-parts/sections/section', 'team');

        elseif ( get_row_layout() == 'related_articles' ) :
            get_template_part('template-parts/sections/section', 'related_articles');

        elseif ( get_row_layout() == 'service_cards' ) :
            get_template_part('template-parts/sections/section', 'service_cards');

        elseif ( get_row_layout() == 'video_section' ) :
            get_template_part('template-parts/sections/section', 'video_section');

        elseif ( get_row_layout() == 'grid_images' ) :
            get_template_part('template-parts/sections/section', 'grid_images');

        elseif ( get_row_layout() == 'customer_reviews' ) :
            get_template_part('template-parts/sections/section', 'customer_reviews');

        elseif ( get_row_layout() == 'community' ) :
            get_template_part('template-parts/sections/section', 'community');

        elseif ( get_row_layout() == 'comingevents' ) :
            get_template_part('template-parts/sections/section', 'comingevents');

        elseif ( get_row_layout() == 'posts_filter' ) :
            get_template_part('template-parts/blocks-archive/section', 'posts_filter');

        elseif ( get_row_layout() == 'koulutusohjelmat_slider' ) :
            get_template_part('template-parts/sections/section', 'koulutusohjelmat_slider');

        elseif ( get_row_layout() == 'premises' ) :
            get_template_part('template-parts/sections/section', 'premises');

        elseif ( get_row_layout() == 'single_photo' ) :
            get_template_part('template-parts/sections/section', 'single_photo');

        elseif ( get_row_layout() == 'embed_block' ) :
            get_template_part('template-parts/sections/section', 'embed_block');

        elseif ( get_row_layout() == 'calculator' ) :
            get_template_part('template-parts/sections/section', 'calculator');

        elseif ( get_row_layout() == 'locations_slider' ) :
            get_template_part('template-parts/sections/section', 'locations_slider');
            ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();