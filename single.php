<?php
/* Template Name: Single */
?>
<?php get_header(); ?>

<div fluid class="container-fòuid contenitorePagina">
    <?php
    // Query for the hero section post based on category
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category_name' => 'herosection',
    );

    $hero_query = new WP_Query($args);

    if ($hero_query->have_posts()):
        while ($hero_query->have_posts()):
            $hero_query->the_post();

            $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $post_title = get_the_title();
            $post_content = get_the_excerpt();

            // Filter out "Facebook Twitter Pinterest" from $post_content
            $post_content = str_replace(array('Facebook', 'Twitter', 'Pinterest'), '', $post_content);
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
                <?php
                $category_slug = 'heroarticle';

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'category_name' => $category_slug,
                );
                $category_query = new WP_Query($args);

                if ($category_query->have_posts()) {
                    $category_query->the_post();
                    $category_link = get_permalink();
                    wp_reset_postdata();
                }
                ?>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <div class="post card">
                <div class="card-body">
                    <div class="card-text text-center mb-2">
                        <h1 class="card-title">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
