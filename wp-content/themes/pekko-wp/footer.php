
<footer class="footer">
    <div class="footer-content center-relative content-1170">
        <?php get_sidebar(); ?>
        <?php
        if (get_theme_mod('cocobasic_select_footer') != '') :
            cocobasic_custom_footer();
        endif;
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>