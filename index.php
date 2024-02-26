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
					echo '<a href="' . esc_url($category_link) . '" class="btn btn-dark mt-3">Visitala ora</a>';
					wp_reset_postdata();
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var heroBg = document.querySelector('.hero-bg');

        if (heroBg) {
            var windowHeight = window.innerHeight;
            var heroHeight = heroBg.offsetHeight;

            window.addEventListener('scroll', function () {
                var scrollPosition = window.scrollY;

                // Calcola la posizione dello sfondo in modo che sia centrato e fermato ai bordi
                var backgroundPosition = (scrollPosition / (heroHeight - windowHeight)) * 100;
                backgroundPosition = Math.max(0, Math.min(100, backgroundPosition)); // Assicura che la posizione sia tra 0% e 100%
                
                heroBg.style.backgroundPosition = 'center ' + backgroundPosition + '%';
            });
        }
    });
</script>

</div>

<?php get_footer(); ?>
