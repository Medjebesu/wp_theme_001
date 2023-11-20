    <footer>
        <?php
        /* フッターナビゲーション & サイト情報 */
        $args = [
            'theme_location' => 'footer-navigation',
            'container' => 'div',
            'container_id' => 'footer-nav-container',
        ];
        wp_nav_menu($args);

        /* SNSリンク */
        $args = [
            'theme_location' => 'social-links',
            'container' => 'div',
            'container_id' => 'footer-sns-container',
        ];
        wp_nav_menu($args);
        ?>
        <p id="copy_rights">
        <?php
            $copyright = get_option('custom_copyright', '©MedjeWorks');
            if (empty($copyright)) $copyright = '©MedjeWorks';
                
            $copyright_year = get_option('custom_copyright_year', '2023'); 
            if (empty($copyright_year)) $copyright_year = '2023';
            echo $copyright . ' ' . $copyright_year;
        ?>
        </p>
    </footer>
    <?php wp_footer(); ?>
</body>