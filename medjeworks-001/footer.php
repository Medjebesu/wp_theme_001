        <footer>
            <?php
            /* フッターメニュー */
            $args = [
                'theme_location' => 'footer-navigation',
                'container' => 'div',
            ];
            wp_nav_menu($args);
            ?>
            <p id="copy_rights">©MedjeWorks 2023</p>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>