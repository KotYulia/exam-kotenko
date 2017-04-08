<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam-kotenko
 */

?>


	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php
        if( get_theme_mod( 'theme_footer_bg' ) != '') { // if there is a background img
            $theme_footer_bg = get_theme_mod('theme_footer_bg'); // Assigning it to a variable to keep the markup clean
        }
        ?>
        <div class="contact-content" style="background: url('<?php echo $theme_footer_bg ?>') center/cover no-repeat;">

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><?php echo get_theme_mod('contacts-title'); ?></h2>
                        <p><?php echo get_theme_mod('contacts-description'); ?></p>
                        <address class="address">
                            <ul>
                                <li>
                                    <span class="<?php echo get_theme_mod('tel-icon'); ?>"></span>
                                    <a href="tel:<?php echo get_theme_mod('tel'); ?>"><?php echo get_theme_mod('tel'); ?></a>
                                </li>
                                <li>
                                    <span class="<?php echo get_theme_mod('address-icon'); ?>"></span>
                                    <span><?php echo get_theme_mod('address'); ?></span>
                                </li>
                            </ul>
                        </address>
                        <div id="map"></div>
                    </div>
                    <form class="col-sm-6">
                        <?php echo do_shortcode('[contact-form-7 id="26" title="form contact"]') ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="container"><?php the_custom_logo(); ?></a>
        </div>
		<div class="site-info">

			<p class="container">&copy; <?php echo get_theme_mod('site-info'); ?></p>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe9vlvtLQqIeBn7U-lEnaaBWOZhkqnrCA&callback=initMap">
</script>

</body>
</html>
