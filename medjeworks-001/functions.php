<?php 
add_action( 'wp_body_open', function() {
/* ↓関数定義↓ */?>

<?php 
/* ↑関数定義↑ */
});
?>

<?php 
/* <title>関連の制御 */
add_theme_support('title-tag');
add_filter('document_title_separator', 'set_document_title_separator');
function set_document_title_separator($sep){
    $sep = '｜';
    return $sep;
}
?>

<?php 
/* カスタムメニュー用設定 */
add_theme_support('menus');
register_nav_menus(array(
    'header-navigation' => 'Header Navigation',
    'footer-navigation' => 'Footer Navigation',
    'social-links'      => 'Social Links',
    ) 
);
?>

<?php
/* アイキャッチ画像用設定 */ 
add_theme_support('post-thumbnails');
?>

<?php 
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
 * 外部PHPを読み込むショートコード
 */
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
    // ブログトップページ
    if (is_page('blog')) {
        wp_register_style('blog-style', get_bloginfo('template_directory') . '/assets/css/blog.css');
        wp_enqueue_style('blog-style');
    }
}
add_action( 'wp_print_styles', 'add_stylesheet');
?>

<?php
/* カスタムロゴ選択用メニューを追加 */
add_theme_support('custom-logo');
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
    $wp_customize->add_section('footer_section', array(
        'title' => 'Footer settings',
        'priority' => 100,
        'panel' => 'theme_panel'
    ));

    /* 設定値定義: Copyright */
    $wp_customize->add_setting('custom_copyright', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'custom_copyright', array(
        'settings' => 'custom_copyright',
        'label' => 'Copy right',
        'section' => 'footer_section',
        'type' => 'text',
    ));

    /* 設定値定義: Copyright(期間) */
    $wp_customize->add_setting('custom_copyright_year', array(
        'type' => 'option',
    ));
    $wp_customize->add_control( 'custom_copyright_year', array(
        'settings' => 'custom_copyright_year',
        'label' => 'From year',
        'section' => 'footer_section',
        'type' => 'text',
    ));

}
add_action('customize_register', 'customizer_register');
?>
