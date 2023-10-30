<?php get_header(); ?>
    <hgroup id="header_main">
        <h1><?php the_title(); ?></h1>
    </hgroup>
    <div id="breadcrumb">
        <?php 
            $this_post = get_post(get_the_ID());
            $result = '<a href="' . home_url() . '">Home</a>';

            if($this_post->post_parent){
                $ancestors = array_reverse($this_post->ancestors);

                foreach($ancestors as $value){
                    $result = $result . ' &gt; <a href="' . get_page_link($value) . '">'. get_the_title($value) . '</a>';
                }
            }
            echo ($result . ' &gt; '. $this_post->post_title);
        ?>
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