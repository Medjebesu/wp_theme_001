<?php get_header(); ?>
<main>
    <h2>Search result: 「<?php the_search_query(); ?>」</h2>
    <section id="blog_content">
        <?php if(have_posts()):?>
        <?php 
        while(have_posts()) : the_post(); ?>
        <?php 
        if( ($post->post_type == 'page') or (get_the_category()[0]->cat_name == 'announce')){
            continue;
        }
        else{ 
            if($hit_count == 0): ?>
        <ul class="content_card_list blog_list">
            <?php
            $hit_count++;
            endif;
        }
        ?>
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
            <?php if($hit_count == 0) : ?>
                <h3>該当する記事はありませんでした。</h3>
            <?php else: ?>
        </ul>
            <?php endif; ?>
        <?php else: ?>
        <h3>該当する記事はありませんでした。</h3>
        <?php endif; ?>
    </section>

    <?php get_template_part('load', 'blogsidebar'); ?>
            
    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>
</main>
<?php get_footer(); ?>