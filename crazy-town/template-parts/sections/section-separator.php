<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<section class="separator_section <?php if ( get_sub_field('background') == true ) { echo'is_background'; } ?>" <?php if ( get_sub_field('separator_height') && get_sub_field('background') == false):?> style="height: <?php the_sub_field('separator_height');?>px" <?php endif; ?>>
    <div class="separator_item">
    </div>
</section>