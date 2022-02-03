<?php get_header(); the_post(); ?>

<section class='mainContent'>
    <div class="centerContent">

            <?php if(is_cart() || is_checkout()) : ?>

                <?php the_content(); ?>

                    <?php else : ?>

                        <div class="textContent">
                            <?php the_content(); ?>
                        </div>

                    <?php endif; ?>

    </div>
</section>


<?php get_footer(); ?>