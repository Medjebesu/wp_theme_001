<?php get_header(); ?>
    <hgroup id="header_main">
        <h1><?php the_title(); ?></h1>
    </hgroup>
    <div id="breadcrumb">
        <a href="<?php echo home_url(); ?>">Home</a> &gt; <a href="<?php echo home_url() . '/content';?>">Content</a> &gt; <?php the_title(); ?>
    </div>
</header>

<main>
    <div id="content-wrapper">
        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <section id="contents_list">
            <ul>
            <?php
                $cat_args = [
                    'title_li' => '', // 見出し削除
                ];
                wp_list_categories($cat_args);
            ?>
            </ul>
        </section>

        <section id="content_area">
            <iframe src="<?php echo get_field('content_url');?>"></iframe>
        </section>
        <section id="content_description">
            <p><?php echo get_field('description');?></p>
        </section>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <aside id="web_adds">
        <!-- <div>※広告用領域※</div> -->
    </aside>

</main>
<?php get_footer(); ?>