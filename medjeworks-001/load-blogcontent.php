<?php
/* 'announceカテゴリを除外して取得する' */
$announce_catid = get_cat_ID( 'announce' );
$args = null;
if($announce_catid != 0){
    $args = array(
        'order'            => 'DESC',
        'category__not_in' => array($announce_catid)
    );
}
else {
    $args = array(
        'order'            => 'DESC'
    );
}
$query_posts = new WP_Query( $args );

if( $query_posts->have_posts() ): 
?>
    <ul class="content_card_list blog_list">
    <?php while( $query_posts->have_posts() ): $query_posts->the_post(); ?>
        <li>
            <div class="content_card">
                <a href="<?php the_permalink(); ?>">
                
                <?php if( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail("thumbnail");?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no_image.png" alt="No image.">
                <?php endif; ?>
                
                <p><?php the_title(); ?></p>
                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
                </a>
            </div>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>

<?php if(function_exists('wp_pagenavi')): ?>
    <section id="list_navigation" class="pagenation">
        <?php wp_pagenavi(array('query' => $query_posts)); ?>
    </section>
<?php endif;?> 