<?php
/* Template Name: Cose da fare */
?>

<?php get_header(); ?>

<div class="container-fluid">
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

            echo '<h1 class="nellepuntateprecedenti">Tutto quello che c\'è da fare a ' . $second_herosection_category . '</h1>';
        }
    } else {
        echo '<h1 class="nellepuntateprecedenti">Tutto quello che c\'è da fare</h1>';
    }
    ?>

    <?php
    if (have_posts()):
        while (have_posts()): the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
