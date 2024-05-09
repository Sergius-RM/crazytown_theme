<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// получаем ID термина на странице термина
$term_id = get_queried_object_id();
// получим ID картинки из метаполя термина
$image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
// ссылка на полный размер картинки по ID вложения
$tax_image = wp_get_attachment_image_url( $image_id, 'full' );

if ( wp_get_attachment_image_url( $image_id, 'full' )) {
    $header_image = $tax_image;
} else if ( is_tax('category') && get_field( 'category_header_image', 'option') ) {
    $header_image = get_field('category_header_image', 'option');
} else if ( get_post_type() === 'sijainnit' && get_field( 'sijainnit_header_image', 'option') ) {
    $header_image = get_field('sijainnit_header_image', 'option');
} else if ( get_post_type() === 'tapahtumat' && !is_category() && !is_tax(array('events_cat','citys')) && get_field( 'tapahtumat_header_image', 'option') ) {
    $header_image = get_field('tapahtumat_header_image', 'option');
} else if ( is_tax('events_cat') && get_field( 'events_header_image', 'option') ) {
    $header_image = get_field('events_header_image', 'option');
} else if ( is_tax('citys') && get_field( 'city_header_image', 'option') ) {
    $header_image = get_field('city_header_image', 'option');
} else {
    $header_image = '/wp-content/themes/crazy-town/assets/images/hero_head_img.jpg';
}

?>

<!-- Archive Hero Section Start -->
<section class="page_header_section" >
    <div class="banner_overlay"></div>
    <div class="page_header_container container-fluid" style="background-image: url('<?php echo $header_image;?>'); background-size: cover;">
        <div class="container">
            <div class="row align-items-center">
            <div class=" col-sm-10 col-md-8 col-lg-8 center-area">
                <h1 class="hero_title mx-auto">
                    <?php if (get_post_type() === 'tapahtumat' && !is_category() && !is_tax(array('koulutusohjelmat_cat','events_cat','citys')) ):?>
                        <?php
                        $obj = get_post_type_object( 'tapahtumat' );
                        echo $obj->labels->singular_name;
                        ?>
                    <?php elseif (get_post_type() === 'sijainnit'):?>
                        <?php
                        $obj = get_post_type_object( 'sijainnit' );
                        echo $obj->labels->singular_name;
                        ?>
                    <?php elseif (get_post_type() === 'koulutusohjelmat' && !is_tax('koulutusohjelmat_cat')):?>
                        <?php
                        $obj = get_post_type_object( 'koulutusohjelmat' );
                        echo $obj->labels->singular_name;
                        ?>
                    <?php else:?>
                        <?php single_cat_title();?>
                    <?php endif;?>
                </h1>
                <span class="page_header_content d-block">
                    <?php echo category_description();?>
                </span>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Archive Hero Section End -->
