<?php 
add_action( 'wp_body_open', function(){
/* ↓関数定義↓ */?>

<?php 
/* ↑関数定義↑ */
});
?>

<?php 
/*
 * <title>関係の設定
 */
add_theme_support('title-tag');

/* タイトル・説明の区切り文字設定 */
add_filter('document_title_separator', 'set_document_title_separator');
function set_document_title_separator($sep){
    $sep = '｜';
    return $sep;
}

/* タイトルにふりがなを設定する */
function custom_add_sub_title($title){
    $subtext = get_option('title_subtext', '');
    if (!empty($subtext)){
        if(is_home()) $title['title'] = $title['title'] . ' ('. $subtext .')';
        else          $title['site']  = $title['site']  . ' ('. $subtext .')';
    }
    return $title;
};
add_filter('document_title_parts', 'custom_add_sub_title');
?>

<?php 
/*
 * カスタムメニュー用設定
 */
add_theme_support('menus');
register_nav_menus(array(
    'header-navigation' => 'Header Navigation',
    'footer-navigation' => 'Footer Navigation',
    'social-links'      => 'Social Links',
    ) 
);
?>

<?php
/*
 * オプション機能の割り当て
 */
add_theme_support('post-thumbnails');   /* 投稿時アイキャッチ画像設定有効化 */
add_theme_support('custom-logo');       /* カスタムロゴ選択メニューを有効化 */
?>

<?php 
/*
 * データ取得時の加工設定
 */
/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
    if(is_archive()){
        $title = get_the_time('Y年m月');
    };
    
    return $title;
});
?>

<?php 
/*
 * テーマ用ショートコード 
 */
/* 外部PHPを読み込むショートコード */
function loadThemePHP($args) {
    //$fileに引数をセット
    extract(shortcode_atts(array('file' => 'nothing.php'), $args));

    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file");
    return ob_get_clean();

}
add_shortcode('loadPHP', 'loadThemePHP');
?>

<?php 
/*
 * 固定ページの追加CSS設定
 */
function add_stylesheet() {
    // 問い合わせの確認ページと完了ページに同一スタイル適用
    if (is_page('confirm') or is_page('thanks')) {
        wp_register_style('blog-style', get_bloginfo('template_directory') . '/assets/css/page/contact.css');
        wp_enqueue_style('blog-style');
    }
}
add_action( 'wp_print_styles', 'add_stylesheet');
?>

<?php
/* オリジナルカスタマイザメニューの追加 */
function customizer_register($wp_customize) {

    /* パネル */
    $wp_customize->add_panel('theme_panel', array(
        'title' => 'Theme settings',
        'priority' => 100,
    ));
    
    /* セクション */
    $wp_customize->add_section('additional_head_tag_setting', array(
        'title' => 'Additional <head> settings',
        'priority' => 50,
        'panel' => 'theme_panel'
    ));
    $wp_customize->add_section('header_setting', array(
        'title' => 'Header settings',
        'priority' => 100,
        'panel' => 'theme_panel'
    ));
    $wp_customize->add_section('blogpart_setting', array(
        'title' => 'Blog parts settings',
        'priority' => 110,
        'panel' => 'theme_panel'
    ));
    $wp_customize->add_section('footer_setting', array(
        'title' => 'Footer settings',
        'priority' => 150,
        'panel' => 'theme_panel'
    ));

    /*
    * additional_head_tag_setting
    */
    $wp_customize->add_setting('aditional_tag_in_the_head_tag', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'aditional_tag_in_the_head_tag', array(
        'settings' => 'aditional_tag_in_the_head_tag',
        'label' => 'Additional tag in <head>',
        'section' => 'additional_head_tag_setting',
        'type' => 'textarea',
    ));

    /*
     * Header Section
     */
     /* 設定値定義: タイトルのふりがな */
    $wp_customize->add_setting('title_subtext', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'title_subtext', array(
        'settings' => 'title_subtext',
        'label' => 'Title subtext',
        'section' => 'header_setting',
        'type' => 'text',
    ));

    /*
     * Blog parts Section
     */
    /* 著者名 */
    $wp_customize->add_setting('blog_author', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'blog_author', array(
        'settings' => 'blog_author',
        'label' => 'Author',
        'section' => 'blogpart_setting',
        'type' => 'text',
    ));

    /* ブログプロフィール */
    $wp_customize->add_setting('blog_profile', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'blog_profile', array(
        'settings' => 'blog_profile',
        'label' => 'Blog profile',
        'section' => 'blogpart_setting',
        'type' => 'textarea',
    ));

    /*
     * Footer Section
     */
     /* 設定値定義: Copyright */
    $wp_customize->add_setting('custom_copyright', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'custom_copyright', array(
        'settings' => 'custom_copyright',
        'label' => 'Copy right',
        'section' => 'footer_setting',
        'type' => 'text',
    ));
    /* 設定値定義: Copyright(期間) */
    $wp_customize->add_setting('custom_copyright_year', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'custom_copyright_year', array(
        'settings' => 'custom_copyright_year',
        'label' => 'From year',
        'section' => 'footer_setting',
        'type' => 'text',
    ));

}
add_action('customize_register', 'customizer_register');
?>

<?php 
/*
 * プラグイン関連の設定
 */

/* Contact Form 7 の整形機能 OFF */
add_filter('wpcf7_autop_or_not', 'custom_wpcf7_autop');
function custom_wpcf7_autop(){
    return false;
}
?>