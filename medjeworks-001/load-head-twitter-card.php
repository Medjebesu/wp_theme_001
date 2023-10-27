<?php
$site_title = get_bloginfo( 'name' );
$subtitle = get_option('title_subtext', '');
if(!empty($subtitle)) $site_title = $site_title . '(' . $subtitle . ')';

/* トップページとそれ以外でのカード上タイトル表示 */
if (is_home()){
    echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />';
}else{
    $site_title = wp_title('|', false, 'right') . $site_title;
}

/* 投稿ページで画像がある場合に、カードで表示する画像を投稿内の画像にする */
$card_size = "summary";
$card_img = get_template_directory_uri() . '/assets/images/MedjeWorks_x_card_summary.png';

if (is_single()){
    if (has_post_thumbnail()){
        $card_size = "summary_large_image";
        $card_img = get_the_post_thumbnail_url( null, 'full' );
    }
}

echo '<meta name="twitter:card" content="' . $card_size . '" />';
echo '<meta name="twitter:site" content="@' . get_option('twitter_card_Acount', '') .'" />';
echo '<meta property="og:url" content="' . get_the_permalink() . '" />';
echo '<meta property="og:title" content="' . $site_title . '" />';
echo '<meta property="og:image"  content="' . $card_img . '" />';
?>