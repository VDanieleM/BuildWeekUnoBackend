<?php
/* Template Name: Consigli */
?>

<?php get_header(); ?>

<div class="container">
    <h1 class="nellepuntateprecedenti">
        Consigli per godersi la vacanza
    </h1>

    <?php

    $consigli_page = get_page_by_path('consigli-utili');

    if ($consigli_page) {

        echo apply_filters('the_content', $consigli_page->post_content);
    }
    ?>

</div>

<?php get_footer(); ?>