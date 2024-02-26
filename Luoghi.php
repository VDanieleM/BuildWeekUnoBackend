<?php

/* Template Name: Luoghi */

?>



<?php get_header(); ?>


<div class="luoghi">
    <div class="contenuto_luoghi container">

        <h1 class="nellepuntateprecedenti">

            Luoghi da esplorare

        </h1>



        <?php



        $consigli_page = get_page_by_path('luoghi-da-esplorare');



        if ($consigli_page) {



            echo apply_filters('the_content', $consigli_page->post_content);

        }

        ?>



    </div>
</div>


<?php get_footer(); ?>