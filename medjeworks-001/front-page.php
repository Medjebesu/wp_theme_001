<?php get_header(); ?>
    <hgroup id="header_main">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
    </hgroup>
</header>

<main>
    <h2>Announce</h2>
    <section id="announce">
        <ul>
        <?php 
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'announce',
            'order' => 'DESC'
        );
        $query_posts = new WP_Query( $args );

        if( $query_posts->have_posts() ): 
            while( $query_posts->have_posts() ) : $query_posts->the_post(); 
        ?>
            <li>
                <time datetime="<?php the_time('Y-m-d H:i'); ?>">
                    <?php the_time('Y年m月d日'); ?> <br>
                    <?php the_time('H:i'); ?>
                </time>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php
            endwhile; 
            wp_reset_postdata();
            ?>
        </ul>
        <a id="announce_archive" href="<?php echo home_url() . '/announce';?>">お知らせ一覧</a>
        <?php else: ?>
            <li>お知らせはありません</li>
        </ul>
        <?php endif; ?>
    </section>

    <h2>Contents</h2>
    <section id="contents_list">
        <?php get_template_part('load', 'bloglist'); ?>
    </section>
</main>
<?php get_footer(); ?>