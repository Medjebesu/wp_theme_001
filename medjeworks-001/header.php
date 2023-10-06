<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" type="text/css">
    <?php 
    /*
     * front-page判定
     */
    if (is_home()):
    ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/index.css" type="text/css">
    <?php else: 
    /* その他のページ */
    ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/subpage.css" type="text/css">
    <?php endif; ?>

    <?php 
    /*
     * ブログ系ページ判定 
     */
    if (is_single() or is_category() or is_archive()): 
    ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/blog.css" type="text/css">
    <?php endif; ?>

    <?php 
    /*
     * 検索結果ページ
     */
    if (is_search()): 
    ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/blog.css" type="text/css">
    <?php endif; ?>

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
                <a href="<?php echo home_url(); ?>">
                    <div id="nav_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="MedjeWorks">
                        <div id="logo_back_decoration"></div>
                    </div>
                </a>

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
            
            <?php 
            /* フロントページ用の見出し */
            if (is_home()): 
            ?>
            <hgroup id="header_main">
                <h1>MedjeWorks</h1>
                <p><?php bloginfo('description'); ?></p>
            </hgroup>
            
            <?php 
            /* ブログ系ページの見出し & パンくずリスト */
            elseif (is_single() or is_category() or is_archive()): 
            ?>
            <hgroup id="header_main">
                <h1>Blog</h1>
            </hgroup>
            <div id="breadcrumb">
                <?php 
                $blog_page = '';
                if( get_page_by_path('blog') ) 
                    $blog_page = '&gt; <a href="' . get_permalink( get_page_by_path('blog')->ID ) . '"> Blog</a>'; 
                ?>
                <?php if ( is_single() ) : ?>
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php echo home_url(); ?>">Home</a> <?php echo $blog_page; ?> &gt; <?php the_title(); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                <?php elseif ( is_category() ) : ?>
                    <a href="<?php echo home_url(); ?>">Home</a> <?php echo $blog_page; ?> &gt; <?php single_cat_title(); ?>
                <?php elseif ( is_archive() ) : ?>
                    <a href="<?php echo home_url(); ?>">Home</a> <?php echo $blog_page; ?> &gt; <?php the_archive_title('',''); ?>
                <?php endif; ?>
            </div>
            
            <?php 
            /* 検索結果ページの見出し & パンくずリスト */
            elseif (is_search()): 
            ?>
            <hgroup id="header_main">
                <h1>Search</h1>
            </hgroup>
            <div id="breadcrumb">
                <a href="<?php echo home_url(); ?>">Home</a> &gt; 検索結果: 「<?php the_search_query(); ?>」
            </div>

            <?php 
            /* 固定ページの見出し & パンくずリスト */
            elseif (is_page()): 
            ?>
            <hgroup id="header_main">
                <h1><?php the_title(); ?></h1>
            </hgroup>
            <div id="breadcrumb">
                <?php if (is_page() /* 親ページ判定 */) : ?>
                <a href="<?php echo home_url(); ?>">Home</a> &gt; <?php the_title(); ?>
                <?php else : /* 子ページ判定 */?>
                    <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php echo home_url(); ?>">Home</a> &gt; <a href="#">※親ページ</a> &gt; <?php the_title(); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <?php
            /*
             * エラー系ページの見出し
             */
            elseif(is_404()):
            ?>
            <hgroup id="header_main">
                <h1>Error...</h1>
            </hgroup>
            
            <?php endif; ?>
        </header>
