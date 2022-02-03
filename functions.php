<?php
// ŁADOWANIE STYLI
function load_stylesheets() {
    wp_register_style( 'stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all' );
    wp_enqueue_style( 'stylesheet' );

    wp_register_style( 'custom', get_template_directory_uri() . '/app.css', '', 1, 'all' );
    wp_enqueue_style( 'custom' );
}

add_action( 'wp_enqueue_scripts', 'load_stylesheets' );


// ŁADOWANIE JAVASCRIPT`u
function load_javascript() {
    wp_register_script( 'custom', get_template_directory_uri() . '/app.js', 'jquery', 1, true );
    wp_enqueue_script( 'custom' );
}

add_action( 'wp_enqueue_scripts', 'load_javascript' );


// WŁASNE LOGO
function sleepyeye_custom_logo_setup() {
  $defaults = array(
  'height'      => 120,
  'width'       => 120,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
 }
 add_action( 'after_setup_theme', 'sleepyeye_custom_logo_setup' );


// DODAWANIE MENU
add_theme_support( 'menus' );

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu'  => __( 'Extra Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
        'shop-menu'   => __( 'Shop Menu' ),
        'language'    => __( 'Language Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );


// WSPARCIE WOOCOMMERCE
function sleepyeye_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    }

add_action( 'after_setup_theme', 'sleepyeye_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// CZYSTY WYGLĄD
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


// WYŚWIETLANIE 'HOT SALES' - parametry ilościowe
function woo_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 7;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 7; // ilość powiązanych postów
	$args['columns'] = 7; // liczba kolumn
	return $args;
}


// WYŁĄCZENIE WYŚWIETLANIA 'RELATED PRODUCTS'
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
// WYŁĄCZENIE WYŚWIETLANIA ŚCIEŻKI PRODUKTU >> SKLEP/KATEGORIA/NAZWA_PRODUKTU
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
// WYŁĄCZENIE WYŚWIETLANIA PANELU BOCZNEGO Z WYSZUKIWANIEM, BIBILOTEKĄ ARTYKUŁÓW ETC.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


// PODTYTUŁ PRODUKTU
add_action( 'woocommerce_product_options_general_product_data', 'my_custom_field' );

function my_custom_field() {

woocommerce_wp_text_input( array(
        'id'          => '_subtitle',
        'label'       => __( 'Subtitle', 'woocommerce' ),
        'placeholder' => 'Subtitle....',
        'description' => __( 'Enter the subtitle.', 'woocommerce' )
    ));
}

add_action( 'woocommerce_process_product_meta', 'my_custom_field_save' );

function my_custom_field_save( $post_id ){

    $subtitle = $_POST['_subtitle'];
    if( !empty( $subtitle ) )
        update_post_meta( $post_id, '_subtitle', esc_attr( $subtitle ) );

}


// OBRAZKI DO GALERII
add_image_size( 'mush-thumb', 790, 480, true );
add_image_size( 'break-mush-thumb', 570, 380, true );
add_image_size( 'mini-mush-thumb', 250, 250, true );


//WYŚWIETLANIE ŁĄCZNEJ SUMY ZA ILOŚĆ DANEGO PRODUKTU
add_action( 'woocommerce_single_product_summary', 'woocommerce_total_product_price', 31 );
function woocommerce_total_product_price() {
    global $woocommerce, $product;

    echo sprintf('<div id="product_total_price" style="margin-bottom:20px;">%s %s</div>',__('Total:','woocommerce'),'<span class="price">'.get_woocommerce_currency_symbol().$product->get_price().'</span>');
    ?>
        <script>
            jQuery(function($){
                var price = <?php echo $product->get_price(); ?>,
                    currency = '<?php echo get_woocommerce_currency_symbol(); ?>';

                $('[name=quantity]').change(function(){
                    if (!(this.value < 1)) {
                        var product_total = parseFloat(price * this.value);
                        $('#product_total_price .price').html( currency + product_total.toFixed(2));
                    }
                });
            });
        </script>
    <?php
}


// PAGINACJA
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

function sleepyeye_pagination() {

    global $wp_query;
    $big = 999999999;

    $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'total' => $wp_query->max_num_pages,
        'show_all' => false,
        'end_size' => 0,
        'mid_size' => 0,
        'type'  => 'array',
        'prev_text'    => __('<'),
        'next_text'    => __('>')
    ));

        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

            foreach ( $pages as $page ) {
                    echo $page;
        }}
}


// KOSZYK ZAMIAST NAPISU
add_filter( 'woocommerce_product_add_to_cart_text', 'change_text_woo' );
function change_text_woo() {
        return '<i class="fa fa-shopping-basket" aria-hidden="true"></i>';
}


// UP BUTTON
function my_scripts_method() {
    wp_enqueue_script(
          'custom-script',
          get_stylesheet_directory_uri() . '/js/topbutton.js',
          array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

