<?php if (have_comments()): ?>
<section id="comments">
    <?php
    comment_form(array(
        'title_reply' => 'コメントフォーム',
    ));
    ?>
    <ol>
        <?php 
        wp_list_comments(array(
            'avatar_size' => 50,
        ));
        ?>
    </ol>

    <?php paginate_comments_links(); ?>
</section>
<?php endif; ?>