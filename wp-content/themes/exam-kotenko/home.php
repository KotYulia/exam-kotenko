<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam-kotenko
 */

get_header(); ?>

<?php if (have_posts()):
    while (have_posts()): the_post(); ?>
        <article class="col-md-6 article-inline">
        <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
        <div>
        <h2>
            <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
        </h2>
        <?php the_excerpt(); ?>
        <div>
        </div>
        </div>
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts found</p>
<?php endif; ?>

<?php
//get_sidebar();
get_footer();
