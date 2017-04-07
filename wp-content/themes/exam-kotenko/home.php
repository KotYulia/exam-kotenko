<?php
/**
 * The template for displaying home
 * Created by PhpStorm.
 * User: Yuliya
 * Date: 25.03.2017
 * Time: 12:50
 */

get_header(); ?>

<main class="main-content">

    <section class="media-content">

        <div class="media-block">
            <div class="container">
                <ul class="row media-list">
                    <?php if (have_posts()):
                        while (have_posts()): the_post(); ?>
                            <li>
                                <article class="col-md-6 article-inline">
                                    <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                                    <div>
                                        <h2>
                                            <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
                                        </h2>
                                        <?php the_excerpt(); ?>
                                        <div>
                                            <a href="<?php the_permalink() ?>#likes">
                                                <span class="fa fa-heart"> <?php comments_number('0', '1', '%'); ?></span>
                                            </a>
                                            <div>
                                                <span>by
                                                    <?php the_author(); ?> /
                                                </span>
                                                <a href="<?php the_permalink() ?>#comments">
                                                    <?php comments_number('0 comments', '1 comment', '% comments'); ?> /
                                                </a>
                                                <span><?php the_time( 'F j, Y ' ); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No posts found</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>