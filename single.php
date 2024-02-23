<?php
/* Template Name: single */
?>

<?php get_header(); ?>

<div class="container">

    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>

            <div class="card">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" class="card-img" alt="<?php the_title(); ?>">
                <?php endif; ?>

                <div class="card-body">
                    <h2 class="card-title">
                        <?php the_title(); ?>
                    </h2>
                    <div class="card-text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <?php
        endwhile;
    endif;
    ?>

</div>

<?php get_footer(); ?>