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
            	if (get_theme_mod('my_colors_header_background')) {
                    echo get_theme_mod( 'my_colors_header_background' );
                }
                else {
                    echo '©MedjeWorks 2023'
                }
            ?>    
            </p>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>