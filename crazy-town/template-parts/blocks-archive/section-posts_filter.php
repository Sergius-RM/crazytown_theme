<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Posts Filter Section Start -->
<section <?php if( get_sub_field('enable_anchor') ): ?>
            id="<?php the_sub_field('anchor_name'); ?>"
        <?php endif;?> 
        class="blogrid_articles posts_filter_section" >

    <div class="container posts_filter_list">

        <ul class="blogrid_categories">
            <?php $posts_filter_type = get_sub_field('posts_filter_type');?>

            <?php if (get_sub_field('button_link')):?>
                <li class="cat-item current-cat">
                    <a aria-current="page" href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                </li>
            <?php elseif (is_category( )):?>
                <li class="cat-item">
                    <a aria-current="page" href="/blogi/">Kaikki</a>
                </li>
            <?php endif;?>

            <?php if (get_sub_field('posts_filter_type') && in_array('post_cat',$posts_filter_type)):?>
                <?php wp_list_categories('orderby=name&title_li='); ?><br>
            <?php endif;?>

            <?php if (get_sub_field('posts_filter_type') && in_array('evetn_cat',$posts_filter_type)):?>
                <?php wp_list_categories('taxonomy=events_cat&orderby=name&title_li='); ?><br>
            <?php endif;?>

            <?php if (get_sub_field('posts_filter_type') && in_array('event_city',$posts_filter_type)):?>
                <?php wp_list_categories('taxonomy=citys&orderby=name&title_li='); ?>
            <?php endif;?>

            <?php if (is_category( )):?>
                <?php wp_list_categories('orderby=name&title_li='); ?>
            <?php endif;?>

            <?php if (is_archive('tapahtumat') && !is_archive('koulutusohjelmat') && !is_category() && !is_tax(array('events_cat','koulutusohjelmat_cat', 'citys') )):?>
                <?php if (!is_category()):?>
                <li class="cat-item <?php if(is_page('tapahtumaluettelo')):?>current-cat<?php endif;?>">
                    <a aria-current="page" href="/tapahtumaluettelo/">Kaikki</a>
                </li>
                <?php endif;?>
                <?php wp_list_categories('taxonomy=events_cat&orderby=name&title_li='); ?><br>
                <?php wp_list_categories('taxonomy=citys&orderby=name&title_li='); ?>
            <?php endif;?>

            <?php if (is_tax('events_cat')):?>
                <li class="cat-item <?php if(is_page('tapahtumaluettelo')):?>current-cat<?php endif;?>">
                    <a aria-current="page" href="/tapahtumaluettelo/">Kaikki</a>
                </li>
                <?php wp_list_categories('taxonomy=events_cat&orderby=name&title_li='); ?>
            <?php endif;?>

            <?php if (is_tax('citys') ):?>
                <li class="cat-item <?php if(is_page('tapahtumaluettelo')):?>current-cat<?php endif;?>">
                    <a aria-current="page" href="/tapahtumaluettelo/">Kaikki</a>
                </li>
                <?php wp_list_categories('taxonomy=citys&orderby=name&title_li='); ?>
            <?php endif;?>

            <?php if (is_archive('koulutusohjelmat') && !is_tax('citys') && !is_archive('category') || is_tax('koulutusohjelmat_cat') && !is_tax('citys') && !is_archive('category') ):?>
                <li class="cat-item <?php if (!is_tax()):?>current-cat<?php endif;?>">
                    <a aria-current="page" href="/koulutusohjelmat/">Kaikki</a>
                </li>
                <?php wp_list_categories('taxonomy=koulutusohjelmat_cat&orderby=name&title_li='); ?>
            <?php endif;?>
        </ul>

    </div>

</section>
<!-- Posts Filter Section Start -->