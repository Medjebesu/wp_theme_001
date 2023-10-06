<aside id="sidebar">
    <section id="short_profile">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/profile.png" width="180" height="240">
            <p>ショートプロフィール文章</p>
    </section>
    <section id="widget_list">
        <form action="<?php echo home_url('/'); ?>" method="get">
            <label for="search"><h3>検索</h3></label>
            <input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="キーワードを入力" id="search" size="20">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        <h3>カテゴリ</h3>
        <ul>
            <?php 
                $cat_args = ['title_li' => '', // 見出し削除
                             'exclude'  => get_category_by_slug('announce')->cat_ID // お知らせ専用カテゴリを除外
                ];
                wp_list_categories($cat_args);
            ?>
        </ul>
        <h3>アーカイブ</h3>
        <ul>
            <?php 
                $arch_args = ['type' => 'monthly'];
                wp_get_archives($arch_args);
            ?>
        </ul>
    </section>
</aside>
