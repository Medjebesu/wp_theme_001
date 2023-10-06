<?php get_header(); ?>
<main>
    <section id="news">
        <h2>News</h2>
        <ul>
        <?php 
        $args = array(
            'posts_per_page'   => 5,
            'category_name'    => 'announce', 
            'order'            => 'DESC'
        );
        $query_posts = new WP_Query( $args );

        if( $query_posts->have_posts() ): 
            while( $query_posts->have_posts() ) : $query_posts->the_post(); ?>
            <li>
                <time datetime="<?php the_time('Y-m-d H:i'); ?>">
                    <?php the_time('Y年m月d日'); ?> <br>
                    <?php the_time('H:i'); ?>
                </time>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php endwhile; ?>
        <?php else: ?>
            <li>お知らせはありません</li>
        <?php endif; ?>
        </ul>
    </section>
    <section id="contents_list">
        <h2>Contents</h2>
        <?php get_template_part('load', 'blogcontent'); ?>
    </section>
</main>
<?php get_footer(); ?>