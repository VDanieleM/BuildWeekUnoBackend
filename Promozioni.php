<?php
/* Template Name: Promozioni */
?>

<?php get_header(); ?>

<div id="promozioni" class="container">

    <?php

    $promozioni_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 1, 'name' => 'promozioni'));

    if ($promozioni_query->have_posts()):
        while ($promozioni_query->have_posts()):
            $promozioni_query->the_post();
            ?>
            <div class="promozione">
                <h1>
                    Promozioni disponibili
                </h1>
                <div class="descrizione">
                    <div class="contenuto-promozione">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>Nessuna promozione disponibile al momento.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>