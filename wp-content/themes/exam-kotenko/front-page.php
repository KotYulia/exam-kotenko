<?php
/**
 * The template for displaying front page
 * Created by PhpStorm.
 * User: Yuliya
 * Date: 25.03.2017
 * Time: 12:50
 */

get_header(); ?>

<main class="main-content">
    <section class="container main-info">
        <?php if ( have_posts() ) : ?>
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        endif; ?>
    </section>


</main>

<?php get_footer(); ?>