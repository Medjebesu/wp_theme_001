<?php get_header(); ?>
<main>
    <h2><?php the_title(); ></h2>
    <?php if(have_posts()): ?>
    <?php while(have_posts()) : thc_post(); ?>
        <?php the_content(); ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>