<?php get_header(); ?>
<div class="justify-content-between page">
<!--------------------------------------------------------------------------- SENTENCJA ---------------------------------------------------------->
<div class="sentence">
            <div class="the">The</div>
            <div class="second-line">
                <span class="firm">Magicspore</span>
                <span class="baseline">is an evolving collection of syringes for the purpose of research.</span>
            </div>
    </div>
<!-------------------------------------------------------------------------- STRONA GŁÓWNA ------------------------------------------------------->

<!-------------------------------------------------------------------------- MENU SKLEPOWE ------------------------------------------------------->

    <div id="offer">

	<div class="thumb-cat">
            <?php echo do_shortcode( '[wd_map]' ) ?>
        </div>

        <div class="menu-name">
            <h2>Product origin</h2>
        </div>

        <div class="menu-cat">
            <?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
        </div>


        <!-------------------------------------------------------------------------- SEKCJA PRODUKTÓW ------------------------------------------------------->

        <div class="pagination">
            <?php sleepyeye_pagination(); ?>
        </div>
        <div class="cards-main woocommerce ajax_loader">
            <?php woocommerce_content(); ?>
        </div>

        <!-------------------------------------------------------------------------- SEKCJA HOT SALES ------------------------------------------------------->

        <div class="hot-sales-header">
            <h2>Hot sales</h2>
        </div>

        <div class="hot-sales">

        <?php
            $args = array (
                'post_per_page' => 7,
                'post_type' => 'product',
                'product_tag' => 'bestseller'
            );

            $related_products = new WP_Query($args);
        ?>

        <?php while ( $related_products -> have_posts() ) : $related_products -> the_post(); ?>

            <div class="hot-showroom">
                <a href="<?php the_permalink(); ?>">
                <div class='hot-product product'>
                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" class='hot-photo'>
                        <h3>
                            <a href="<?php the_permalink(); ?>">
                            <?php if( has_post_thumbnail() ) : ?>
                            <?php endif; ?>
                            </a>
                        </h3>
						<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> hot-price">
							<?php global $product; $price = $product->get_price_html(); echo $price ?>
						</p>
                </div>
                </a>
            </div>
        <?php endwhile; wp_reset_query(); ?>
        </div>

    </div>


</div>
<?php get_footer(); ?>