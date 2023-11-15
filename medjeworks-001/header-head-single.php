<?php if(is_singular('announce')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/announce.css" type="text/css">
<?php elseif(is_singular('content')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/content.css" type="text/css">
<?php else :?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page/blog.css" type="text/css">
<?php endif;?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/comments.css" type="text/css">