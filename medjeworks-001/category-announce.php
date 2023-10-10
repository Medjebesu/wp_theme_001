<?php get_header(); ?>
<hgroup id="header_main">
        <h1>News</h1>
    </hgroup>
    <div id="breadcrumb">
        <a href="<?php echo home_url(); ?>">Home</a> &gt; News
    </div>
</header>

<main>
    <h2>News</h2>
    <section id="news_list">
        <ul>
        <?php if( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
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
            
    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>
</main>
<?php get_footer(); ?>