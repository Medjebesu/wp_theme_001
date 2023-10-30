<?php get_header(); ?>
    <hgroup id="header_main">
        <h1><?php the_title(); ?></h1>
    </hgroup>
</header>

<main>
    <h2><?php the_title(); ?></h2>
    <?php if(have_posts()): ?>
    <?php while(have_posts()) : thc_post(); ?>
        <?php the_content(); ?>
    <?php endwhile;?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>