<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri() . '?ver=' . time()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo esc_html(get_bloginfo('name')); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php
                    $page_order = array('Home', 'Promozioni in loco', 'Luoghi da esplorare', 'Cose da fare', 'Consigli utili');
                    foreach ($page_order as $page_title) {
                        $page = get_page_by_title($page_title);
                        if ($page) {
                            $page_link = get_page_link($page->ID);
                            $current_style = is_page($page->ID) ? 'font-weight: bold; color: red;' : ''; // Inline style for current page
                            echo '<li class="nav-item" style="' . esc_attr($current_style) . '"><a class="nav-link" href="' . esc_url($page_link) . '">' . esc_html($page->post_title) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php wp_footer(); ?>
</body>

</html>