<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=1110">
        <title>Magic mushroom spore | Magicspore.com</title>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <link href="maps/cssmap-continents.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class( 'sleepyeye' ); ?> >

    <header>

        <div class="d-block align-items-center justify-content-between">
<!--------------------------------------------------------------------------- SHOP MENU --------------------------------------------------------------->
        <div class="shop-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'shop-menu' ) ); ?>
            <div class="language-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'language' ) ); ?>
            </div>
        </div>

<!------------------------------------------------------------------------- MENU DESKTOP -------------------------------------------------------------->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
<!----------------------------------------------------------------------------- LOGO ------------------------------------------------------------------>
                <div class="navbar-header">
                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                        }
                    ?>
                </div>
                <div class="nav navbar-nav d-flex">
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                </div>
<!------------------------------------------------------------------------- MENU MOBILE --------------------------------------------------------------->
                <div id="dropdown">
                    <button id="myBtn" class="dropbtn"><i class="fa fa-bars"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?> <!--
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?> -->
                        </div>
                </div>
            </div>
        </nav>
<!--------------------------------------------------------------------- SKRYPT DO CHOWANIA MENU ------------------------------------------------------->
        <script>
            document.getElementById("myBtn").onclick = function() {myFunction()};
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
	        }
        </script>


        </div>
    </header>

