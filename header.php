<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo home_url(); ?>" class="logo">
                <?php bloginfo('name'); ?>
            </a>
            
            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'fallback_cb' => function() {
                        echo '<ul>';
                        echo '<li><a href="' . home_url() . '">Home</a></li>';
                        echo '<li><a href="' . home_url('/properties') . '">Properties</a></li>';
                        echo '<li><a href="' . home_url('/about') . '">About</a></li>';
                        echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
                        echo '</ul>';
                    }
                ));
                ?>
            </nav>
        </div>
    </div>
</header>
