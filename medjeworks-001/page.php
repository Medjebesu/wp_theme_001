<?php get_header(); ?>
    <hgroup id="header_main">
        <h1><?php the_title(); ?></h1>
    </hgroup>
    <div id="breadcrumb">
        <?php if (is_page() /* 親ページ判定 */) : ?>
        <a href="<?php echo home_url(); ?>">Home</a> &gt; <?php the_title(); ?>
        <?php else : /* 子ページ判定 */?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <a href="<?php echo home_url(); ?>">Home</a> &gt; <a href="#">※親ページ</a> &gt; <?php the_title(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</header>

<main>
    <h2><?php the_title(); ?></h2>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post() ;?>
            <?php the_content(); ?>
        <?php endwhile;?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>