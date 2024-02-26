<?php

/* Template Name: Cose da fare */

?>

<?php get_header(); ?>



<div class="container-fluid">

    <h1 class="cosedafare nellepuntateprecedenti">

        Tutto quello che c'è da fare </h1>

    <?php



    if (have_posts()):

        while (have_posts()):

            the_post();





            the_content();



        endwhile;

    endif;

    ?>

</div>



<?php get_footer(); ?>