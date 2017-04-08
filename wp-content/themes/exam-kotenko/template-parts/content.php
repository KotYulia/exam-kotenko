<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam-kotenko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <section class="title-banner" style="background: url('<?php echo get_theme_mod('img-upload');?>') center/cover no-repeat;">
            <div class="container">
                <h1>
                    <?php single_post_title(); ?>
                </h1>
            </div>
        </section>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                    the_content( sprintf(
                    /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'exam-kotenko' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'exam-kotenko' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php exam_kotenko_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
