<?php
/* Template Name: Promozioni */
?>

<?php get_header(); ?>

<div class="container promozione">
    <h1 class="nellepuntateprecedenti">
        Promozioni disponibili
    </h1>

    <?php

    $consigli_page = get_page_by_path('promozioni-in-loco');

    if ($consigli_page) {

        echo apply_filters('the_content', $consigli_page->post_content);
    }
    ?>

</div>

<?php get_footer(); ?>