<?php get_header(); ?>
    <hgroup id="header_main">
        <h1><?php the_title(); ?></h1>
    </hgroup>
    <div id="breadcrumb">
        <a href="<?php echo home_url(); ?>">Home</a> &gt; <a href="<?php echo home_url() . '/contents_top' ?>">Contents</a> &gt; <?php the_title(); ?>
    </div>
</header>

<main>
    <div id="content-wrapper">
        <section id="contents_side_list">
            <h3>コンテンツ一覧</h3>
            <?php
            $args = array(
                'post_type' => 'content',
                'order'     => 'DESC'
            );
            $query_posts = new WP_Query( $args );

            if( $query_posts->have_posts() ): 
            ?>
            <ul>
                <?php while( $query_posts->have_posts() ): $query_posts->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <section id="content_area">
            <iframe src="<?php echo get_field('content_url');?>"></iframe>
        </section>
        <section id="content_description">
            <p><?php echo get_field('description');?></p>
        </section>

    </div>

    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>

</main>
<?php get_footer(); ?>