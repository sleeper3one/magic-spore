<?php get_header(); ?>


<div id="main_navbar" class="navbar navbar-expand-md navbar-light bg-light">
    <!-- you can remove this container wrapper if you want things full width -->
    <div class="container">
        <a class="navbar-brand" href="#"><?php esc_html_e( bloginfo( 'name' ), 'themeslug' ); ?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNav" aria-controls="headerNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'best-reloaded' ); ?>">
            <span class="navbar-toggler-icon"></span><span class="sr-only"><?php esc_html_e( 'Toggle Navigation', 'themeslug' ); ?></span>
        </button>
        <nav class="collapse navbar-collapse" id="headerNav" role="navigation" aria-label="Main Menu">
            <span class="sr-only"><?php esc_html_e( 'Main Menu', 'themeslug' ); ?></span>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'header-menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'navbar-nav mr-auto',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            ) );
        ?>
        </nav>
    </div>
</div>




  <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand">
                <?php 
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                ?>
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <?php 
                                wp_nav_menu( 
                                    array( 
                                        'theme_location' => 'header-menu',
                                        'depth' => 2,
                                        'container' => false,
                                        'menu-class' => 'navbar-nav mr-auto',
                                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker' => new WP_Bootstrap_Navwalker()
                                    ) 
                                ); 
                            ?>
                        </a>
                    </li>
                </ul>

                <div class="language-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'language' ) ); ?>
                </div>

                <span class="menu-info">
                    Tel: +48 539330803 (opening hours: Mon-Fri, 8 a.m. - 4 p.m.)<br>
                    Email: Piotr@Producingline.com
                </span>
                
            </div>
            <div class="shop-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'shop-menu' ) ); ?>
            </div>
        </nav>


<?php get_footer(); ?>