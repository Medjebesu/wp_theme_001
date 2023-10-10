<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" type="text/css">
    
    <?php 
    /* front-page専用<head>設定 */
    if (is_home()){
        get_template_part('header-head', 'frontpage');
    }
    /* その他ページの<head>設定 */
    else {
        get_template_part('header-head', 'subpage');

        /* ページ種別毎の設定 */
        if     (is_single()){
            get_template_part('header-head', 'single');
        }
        elseif (is_category()){
            get_template_part('header-head', 'category');
        }
        elseif (is_archive()){
            get_template_part('header-head', 'archive');
        }
        elseif (is_search()){
            get_template_part('header-head', 'search');
        }
    }
    ?>

    <link rel="icon"       href="<?php echo get_template_directory_uri(); ?>/assets/images/icon-001.svg" type="image/svg+xml" size="any">

    <!-- 外部参照 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" type="text/css" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <header>
            <nav>
                <div id="nav_logo">
                    <?php
                    if(has_custom_logo()) : the_custom_logo();
                    ?>
                    <?php else :?>
                        <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="MedjeWorks">
                        </a>
                    <?php endif; ?>
                    <div id="logo_back_decoration"></div>
                </div>

                <?php
                /* ナビゲーションメニュー */
                $args = [
                    'theme_location' => 'header-navigation',
                    'menu_class' => '',
                    'container' => false,
                ];
                wp_nav_menu($args);
                ?>
            </nav>
