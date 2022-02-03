<div class="custom-shop-card justify-content-between page">


    <!------------------------------------------------------------ NAZWA I PODTYTUŁ ------------------------------------------------------------->

    <div class="head">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <h3 class='subtitle'><?php global $post; echo get_post_meta( $post->ID, '_subtitle', true ); ?></h3>
    </div>

    <div class="top-section">



    <!----------------------------------------------------------- MINI KARTA PRODUKTU ----------------------------------------------------------->
<div class="boxx">
    <div class="mush-box-card">
    <img src="<?php the_post_thumbnail_url('mini-mush-thumb'); ?>" alt="<?php the_title(); ?>" class='mush-box-photo'>
        <div class="mush-box-area">
            <div class="productof">
                <h6>Product of <span><?php echo wc_get_product_category_list( $cart_item['product_id'] ); ?></span></h6>
            </div>

            <div class="mush-box-rating">
                <?php
                    $product = wc_get_product( $id );
                    echo wc_get_rating_html( $product->get_average_rating() );
                ?>
            </div>

            <div class="mush-box-title">
                <h4><?php echo get_the_title() ; ?></h4>
            </div>

            <article class="mush-box-description">
                <?php the_excerpt(); ?>
            </article>

            <div class="mush-box-price">
                <?php echo $product->get_price_html(); ?>
            </div>
        </div>
    </div>




    <!------------------------------------------------------------- GALERIA ------------------------------------------------------------->

    <div class="gallery flexslider">
        <ul class="slides">
            <li>
                <img src="<?php the_post_thumbnail_url('mush-thumb'); ?>" alt="<?php the_title(); ?>">
            </li>
            <li>
                <?php
                        global $product;
                        $attachment_ids = $product->get_gallery_attachment_ids();

                        foreach( $attachment_ids as $attachment_id )
                        {
                            echo wp_get_attachment_image($attachment_id, 'mush-thumb-large');
                        }
                ?>
            </li>
        </ul>
    </div>

    <script>
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: jQuery(".custom-controls-container"),
                customDirectionNav: jQuery(".custom-navigation a")
            });
        });
    </script>
    </div>


    </div>
    <!---------------------------------------------------------- LISTWA ZAMÓWIENIA ---------------------------------------------------------->

    <div class="shopping-panel">

        <div class="item-size">
            <p>Syringe 10 ml</p>
        </div>

        <div class="three-little-fields">

            <div class="order-price"><?php woocommerce_total_product_price(); ?></div>
            <div class="order-qnty">
            <form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype="multipart/form-data">
                <?php
                    woocommerce_quantity_input();
                ?>
            </div>
            <div class="add-to-cart-button">
                <button type="submit" class="add-to-cart-button"><?php echo $link['label']; ?>ADD TO CART</button>
            </form>
           </div>
        </div>
    </div>

    <!---------------------------------------------------------- OPIS PRODUKTU ---------------------------------------------------------->

    <div class="product-description">
        <p><?php echo apply_filters( 'the_content', get_post_field('post_content', $product_id) ); ?></p>
    </div>

    <!---------------------------------------------------------- HARMONIJKA ---------------------------------------------------------->
    <div class="accordion-part">
        <button class="accordion">Product details</button>
        <div class="panel">
            <p><?php global $product; echo wc_display_product_attributes( $product ); ?></p>
        </div>

        <button class="accordion">Origin</button>
        <div class="panel">

        <div class="thumb-cat">

            <?php
                $terms = get_the_terms( $post->ID, 'product_cat' );
                foreach ( $terms as $term ){
                $category_name = $term->name;
                $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_url($category_thumbnail);
                echo '<img src="'.$image.'" alt="Category you choose" />';
                }
            ?>

        </div>
        </div>

        <button class="accordion">Reviews</button>
        <div class="panel">
            <p><?php comments_template(); ?></p>
        </div>



    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        panel.style.display = "none";
        } else {
        panel.style.display = "block";
        }
    });
    }
    </script>
</div>


 <!---------------------------------------------------------- HOT SALES ---------------------------------------------------------->

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
                        <p class="hot-price">
                            <?php global $product; $price = $product->get_price_html(); echo $price ?>
                        </p>
                </div>
                </a>
            </div>
        <?php endwhile; wp_reset_query(); ?>
        </div>

 <!---------------------------------------------------------- KONIEC ---------------------------------------------------------->

</div>