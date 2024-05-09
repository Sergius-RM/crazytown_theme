<?php
/**
 * The template for displaying archive pages
 *
 */

get_header();

?>

<?php get_template_part( 'template-parts/blocks-archive/archive-head' ); ?>

<?php get_template_part( 'template-parts/blocks-archive/section-posts_filter' ); ?>

<?php get_template_part( 'template-parts/blocks-archive/koulutusohjelmat-body' ); ?>

<?php
get_footer();
