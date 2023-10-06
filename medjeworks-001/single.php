<?php
    // 投稿の種類に応じて分岐
    if ( in_category( array('announce') ) ) {
        get_template_part( 'single' , 'announce' );
    }
    else {
    get_template_part( 'single' , 'default');
}
?>