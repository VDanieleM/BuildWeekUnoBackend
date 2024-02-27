<?php
/* Template Name: Luoghi */
?>

<?php get_header(); ?>

<div class="contenuto_consigli container">
 <?php
    $herosection_post_id = get_posts(array(
        'posts_per_page' => 1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => 'herosection',
            ),
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'herosection',
            ),
        ),
        'fields' => 'ids',
        'post_type' => 'post',
    ));

    if ($herosection_post_id) {
        $herosection_categories = get_the_category($herosection_post_id[0]);

        if (count($herosection_categories) >= 2) {
            $second_herosection_category = esc_html($herosection_categories[1]->name);

            echo '<h1 class="nellepuntateprecedenti"> Luoghi da esplorare a ' . $second_herosection_category . '</h1>';
        }
    } else {
        echo '<h1 class="nellepuntateprecedenti">Luoghi da esplorare</h1>';
    }
    ?>

    <?php

    $consigli_page = get_page_by_path('luoghi-da-esplorare');

    if ($consigli_page) {

        echo apply_filters('the_content', $consigli_page->post_content);
    }
    ?>

</div>

<?php get_footer(); ?>
