<?php
    get_header();
    get_template_part('header-body', 'blog');
?>
</header>

<main>
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <section id="blog_content">
        <div class="article_wrapper">
            <article>
                <div id="article_header">
                <time datetime="<?php the_time('Y-m-d H:i');?>"><?php the_time('Y年m月d日 H時i分');?></time>
                </div>
                <div>
                    <?php the_content(); ?>
                </div>
                <?php
                    $cates = get_the_category();
                    if ($cates) :
                    ?>
                <ul id="blog_category_list">
                    <span>カテゴリタグ:</span>
                    <?php foreach ($cates as $cate) : ?>
                    <li><a href="<?php echo get_category_link($cate); ?>"><?php echo $cate->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </article>
        </div>

        <?php comments_template(); ?>
    </section>

    </section>
    <section id="blog_navigation">
        <ul>
            <?php
                $next_post = get_next_post();
                if ($next_post):
            ?>
            <li><a href="<?php the_permalink($next_post); ?>">&lt;&lt; <?php echo get_the_title($next_post); ?></a></li>
            <?php 
                endif;
                
                $pre_post = get_previous_post();
                if ($pre_post):
            ?>
            <li><a href="<?php the_permalink($pre_post); ?>"><?php echo get_the_title($pre_post); ?> &gt;&gt;</a></li>
            <?php endif; ?>
        </ul>
    </section>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part('load', 'blogsidebar'); ?>
    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>

</main>
<?php get_footer(); ?>