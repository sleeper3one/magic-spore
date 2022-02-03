<div id="footer">
    <div class="row justify-content-around">
        <?php
            wp_nav_menu( array(
                'theme_location' =>'footer-menu',
                'menu_class' => 'd-flex'
            ));
        ?>

    </div>

    <?php wp_footer(); ?>
    <a href="#" class="topbutton"><i class="fa fa-arrow-up"></i></a>
</div>


</body>
</html>