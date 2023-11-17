<div id="blog-wrapper">
    <section id="blog_content">
        <?php
        $args = array(
            'order'            => 'DESC',
        );
        $query_posts = new WP_Query( $args );

        if( $query_posts->have_posts() ): 
        ?>
        <ul class="blog_card_list blog_list">
            <?php while( $query_posts->have_posts() ): $query_posts->the_post(); ?>
            <li>
                <div class="blog_card">
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
            <?php
                endwhile; 
                wp_reset_postdata();
            ?>
        </ul>
        <?php endif; ?>
    </section>

    <?php get_template_part('load', 'blogsidebar'); ?>

    <?php if(function_exists('wp_pagenavi')): ?>
    <section id="list_navigation" class="pagenation">
        <?php wp_pagenavi(array('query' => $query_posts)); ?>
    </section>
    <?php endif;?> 
</div>

<aside id="web_adds">
    <!-- <div>※広告用領域※</div> -->
</aside>
