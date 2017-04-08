<?php
/**
 * The template for displaying home
 * Created by PhpStorm.
 * User: Yuliya
 * Date: 25.03.2017
 * Time: 12:50
 */

get_header(); ?>
    <section class="title-banner" style="background: url('<?php echo get_theme_mod('img-upload');?>') center/cover no-repeat;">
        <div class="container">
            <h1>
                <?php single_post_title(); ?>
            </h1>
        </div>
    </section>
<main class="main-content">

    <section class="blog-content">

        <div class="blog-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="row blog-list">
                            <?php if (have_posts()):
                                while (have_posts()): the_post(); ?>
                                    <li>
                                        <article class="col-md-6 article-inline">
                                            <a href="<?php the_permalink(); ?>" class="fa fa-share-square"></a>
                                            <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                                            <div>
                                                <h2>
                                                    <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
                                                </h2>
                                                <?php the_excerpt(); ?>
                                                <span class="fa fa-clock-o"><?php the_time( 'j,m,Y ' ); ?></span>
                                            </div>
                                        </article>
                                    </li>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <p>No posts found</p>
                            <?php endif; ?>
                            <div class="blog-pages">
                                <?php
                                global $wp_query;

                                $big = 999999999; // need an unlikely integer

                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'total' => $wp_query->max_num_pages,
                                    'prev_text' => 'Prev',
                                    'next_text' => 'Next'
                                ) );
                                ?>
                            </div>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>