<?php
/* ページスラッグと同名のcssファイルを読めるようにする */
$basepath = '/assets/css/page/' . basename(get_permalink()) . '.css';
$csspath = get_template_directory() . $basepath;
if (file_exists($csspath)): 
?>
    <link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri() . $basepath; ?>' type='text/css'/>
<?php endif; ?>

