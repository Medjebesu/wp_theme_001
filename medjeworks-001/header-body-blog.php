<hgroup id="header_main">
    <h1>Blog</h1>
</hgroup>
<div id="breadcrumb">
    <?php 
    $blog_page = '';
    if( get_page_by_path('blog') ) 
        $blog_page = '&gt; <a href="' . get_permalink( get_page_by_path('blog')->ID ) . '"> Blog</a>'; 
    ?>
    <?php if ( is_single() ) : ?>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <a href="<?php echo home_url(); ?>">Home</a> <?php echo $blog_page; ?> &gt; <?php the_title(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php elseif ( is_category() ) : ?>
        <a href="<?php echo home_url(); ?>">Home</a> <?php echo $blog_page; ?> &gt; <?php single_cat_title(); ?>
    <?php elseif ( is_archive() ) : ?>
        <a href="<?php echo home_url(); ?>">Home</a> <?php echo $blog_page; ?> &gt; <?php the_archive_title('',''); ?>
    <?php endif; ?>
</div>