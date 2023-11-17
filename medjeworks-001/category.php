<?php 
    get_header();
    get_template_part('header-body', 'blog');
?>
</header>

<main>
    <h2>Category : <?php single_cat_title(); ?></h2>
    <section id="blog-wrapper">
        <div id="blog_content">
            <?php if( have_posts() ) : ?>
            <ul class="blog_card_list blog_list">
                <?php while( have_posts() ) : the_post(); ?>
                <li>
                    <div class="blog_card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail("thumbnail"); ?>
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
        </div>
        <?php get_template_part('load', 'blogsidebar'); ?>
    
        <?php if(function_exists('wp_pagenavi')): ?>
        <div id="list_navigation" class="pagenation">
            <?php wp_pagenavi(); ?>
        </div>
        <?php endif;?> 
    </section>
    
    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>
</main>
<?php get_footer(); ?>