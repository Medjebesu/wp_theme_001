<?php if($post->comment_status == 'open'): ?>
<section id="comments">
    <?php 
    /* コメントフォーム表示 */
    comment_form(array(
        'title_reply' => 'コメントフォーム',
    ));
    ?>
    
    <?php
    /* 投稿済みコメント表示 */
    if (have_comments()):
    ?>
    <ol>
        <?php 
        wp_list_comments(array(
            'avatar_size' => 50,
        ));
        ?>
    </ol>
    <?php endif; ?>
    <?php paginate_comments_links(); ?>

<?php else: ?>
<section id="comment_disable">
    <strong>※この投稿へのコメントは制限されています。</strong>
<?php endif; ?>
</section>