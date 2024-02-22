<?php
/* Template Name: Home */
?>

<?php get_header(); ?>

<div class="hero-section">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category_name' => 'Herosection',
    );

    $hero_query = new WP_Query($args);

    if ($hero_query->have_posts()):
        while ($hero_query->have_posts()):
            $hero_query->the_post();


            $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');


            $post_title = get_the_title();


            $post_content = get_the_excerpt();
            ?>

            <div class="hero-bg" style="background-image: url('<?php echo esc_url($post_thumbnail_url); ?>');">
            </div>
            <div class="hero-content">
                <?php
                if ($post_title) {
                    echo '<h1>' . esc_html($post_title) . '</h1>';
                }
                if ($post_content) {
                    echo '<h4>' . esc_html($post_content) . '</h4>';
                }
                ?>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <div class="container home">
        <h1 class="nellepuntateprecedenti">
            Le destinazioni che abbiamo visitato
        </h1>
        <?php

        if (have_posts()):
            while (have_posts()):
                the_post();


                the_content();

            endwhile;
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>