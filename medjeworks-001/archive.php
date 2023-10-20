<?php 
    get_header();
    get_template_part('header-body', 'blog');
?>
</header>

<main>
    <h2>Archive : <?php the_archive_title(); ?></h2>
    
    <section id="blog_content">
        <?php if( have_posts() ) : ?>
        <ul class="content_card_list blog_list">
            <?php while( have_posts() ) : the_post(); ?>
            <li>
                <div class="content_card">
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
    </section>
    <?php get_template_part('load', 'blogsidebar'); ?>
    
    <?php if(function_exists('wp_pagenavi')): ?>
    <section id="list_navigation" class="pagenation">
        <?php wp_pagenavi(); ?>
    </section>
    <?php endif;?> 
    
    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>
</main>
<?php get_footer(); ?>