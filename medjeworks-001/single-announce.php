<?php get_header(); ?>
    <hgroup id="header_main">
        <h1>News</h1>
    </hgroup>
    <div id="breadcrumb">
        <a href="<?php echo home_url(); ?>">Home</a> &gt; <a href="<?php echo home_url() . '/category/announce';?>">News</a> &gt; <?php the_title(); ?>
    </div>
</header>

<main>
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <section id="announce_content">
        <div class="article_wrapper">
            <article>
                <div id="article_header">
                    <time datetime="<?php the_time('Y-m-d H:i');?>"><?php the_time('Y年m月d日 H時i分');?></time>
                </div>
                <div>
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    </section>

    <section id="announce_navigation">
        <ul>
            <?php
                $next_post = get_next_post(true);
                if ($next_post):
            ?>
            <li><a href="<?php the_permalink($next_post); ?>">&lt;&lt; <?php echo get_the_title($next_post); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php echo home_url() . '/category/announce';?>">おしらせ一覧へ戻る</a></li>
            <?php
                $pre_post = get_previous_post(true);
                if ($pre_post):
            ?>
            <li><a href="<?php the_permalink($pre_post); ?>"><?php echo get_the_title($pre_post); ?> &gt;&gt;</a></li>
            <?php endif; ?>
        </ul>
    </section>
    <?php endwhile; ?>

    <section id="announce_discussion">
        <?php comments_template(); ?>
    </section>

    <?php endif; ?>
    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>

</main>
<?php get_footer(); ?>