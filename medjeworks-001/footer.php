        <footer>
            <?php
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
    </div>
    <?php wp_footer(); ?>
</body>