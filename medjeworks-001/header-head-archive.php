<?php if(is_post_type_archive('announce')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/announce.css" type="text/css">
<?php else : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/blog.css" type="text/css">
<?php endif;?>