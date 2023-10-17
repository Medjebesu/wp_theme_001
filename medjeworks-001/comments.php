<section id="comments">
    <?php
    comment_form(array(
        'title_reply' => 'コメントフォーム',
    ));
    if (have_comments()):
    ?>
    <ol>
        <?php 
        wp_list_comments(array(
            'avatar_size' => 50,
        ));
        ?>
    </ol>

    <?php 
    paginate_comments_links();
    endif;
    ?>
</section>