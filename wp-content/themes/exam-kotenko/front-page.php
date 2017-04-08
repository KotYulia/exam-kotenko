<?php
/**
 * The template for displaying front page
 * Created by PhpStorm.
 * User: Yuliya
 * Date: 25.03.2017
 * Time: 12:50
 */

get_header(); ?>

    <section class="home-info">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif; ?>
            </div>
        </div>
    </section>
    <section id="about" class="welcome-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <img src="<?php
                $title = get_post_custom_values('img section welcome');
                foreach( $title as $key => $value ) {
                    echo "$value";
                    }
                    ?>">
                </div>
                <div class="col-sm-6 col-md-8">
                    <h2>
                        <?php
                        $title = get_post_custom_values('title section welcome');
                        foreach( $title as $key => $value ) {
                            echo "$value";
                        }
                        ?>
                    </h2>
                    <p>
                        <?php
                        $title = get_post_custom_values('info section welcome');
                        foreach( $title as $key => $value ) {
                            echo "$value";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>

    </section>
    <section class="services">
        <div class="container">
            <h2>
                <?php
                $title = get_post_custom_values('title section offering');
                foreach( $title as $key => $value ) {
                    echo "$value";
                }
                ?>
            </h2>
            <p>
                <?php
                $title = get_post_custom_values('info section offering');
                foreach( $title as $key => $value ) {
                    echo "$value";
                }
                ?>
            </p>
            <ul class="row services-content">
                <?php
                $query = new WP_Query( array('post_type' => 'services-reviews', 'posts_per_page' => 4 ) );
                if ($query->have_posts()):?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="col-sm-4">
                            <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </li>
                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <h2>
                <?php
                $title = get_post_custom_values('title section works');
                foreach( $title as $key => $value ) {
                    echo "$value";
                }
                ?>
            </h2>
            <p>
                <?php
                $title = get_post_custom_values('info section works');
                foreach( $title as $key => $value ) {
                    echo "$value";
                }
                ?>
            </p>
            <ul class="row">
                <?php
                $args = array(
                    'post_type' => 'works-reviews'
                );
                $the_query = new WP_Query($args);
                if ($the_query -> have_posts()) : ?>

                    <?php while($the_query -> have_posts()) : ?>
                        <li class="col-sm-6 col-md-4">
                            <?php $the_query -> the_post(); ?>
                            <a href="<?php echo get_the_excerpt(); ?>">
                                <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php else : //no posts ?>
                <?php endif; wp_reset_postdata(); ?>
            </ul>

        </div>

    </section>
    <section class="carousel-logo">
        <div class="container">
            <h2>
                <?php
                $title = get_post_custom_values('logo clients');
                foreach( $title as $key => $value ) {
                    echo "$value";
                }
                ?>
            </h2>
            <ul class="responsive">
                <?php
                $args = array(
                    'post_type' => 'carousel-reviews'
                );
                $the_query = new WP_Query($args);
                if ($the_query -> have_posts()) : ?>

                    <?php while($the_query -> have_posts()) : ?>
                        <li class="slick-slide">
                            <?php $the_query -> the_post(); ?>
                            <a href="<?php echo get_the_excerpt(); ?>">
                                <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php else : //no posts ?>
                <?php endif; wp_reset_postdata(); ?>
            </ul>
        </div>

    </section>


    </main>


<?php get_footer(); ?>