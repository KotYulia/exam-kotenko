<?php
/**
 * exam-kotenko Theme Customizer
 *
 * @package exam-kotenko
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function exam_kotenko_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


    $wp_customize->add_setting( 'theme_footer_bg' );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,'theme_footer_bg',array(
                'label' => 'Footer Background Image',
                'section' => 'title_tagline',
                'settings' => 'theme_footer_bg',
                'priority' => 2
            )
        )
    );

    $wp_customize->add_section(
        'contacts-section',
        array(
            'title' => esc_html__( 'Contacts section', 'test' )
        )
    );

    $wp_customize->add_setting(
        'contacts-title',
        array('default' => 'Contact Us:')
    );

    $wp_customize->add_control(
        'contacts-title',
        array(
            'label' => esc_html__('Titel contacts:', 'test' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'contacts-description',
        array('default' => 'It is a long established fact that a reader will be distracted by 
the readable content of a page when looking at its layout.')
    );

    $wp_customize->add_control(
        'contacts-description',
        array(
            'label' => esc_html__('Description contacts:', 'test' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'tel',
        array('default' => '+1 123 4567 891')
    );

    $wp_customize->add_control(
        'tel',
        array(
            'label' => esc_html__('Phone:', 'test' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'tel-icon',
        array('default' => 'fa fa-phone')
    );

    $wp_customize->add_control(
        'tel-icon',
        array(
            'label' => esc_html__('Icon for tel:', 'test' ) ,
            'description' => esc_html__('Font Awesome icon','exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'address',
        array('default' => '123 Office, Street No 2, Parkview.
Sednney, Australia.')
    );

    $wp_customize->add_control(
        'address',
        array(
            'label' => esc_html__('Address:', 'Office' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'address-icon',
        array('default' => 'fa fa-map-marker')
    );

    $wp_customize->add_control(
        'address-icon',
        array(
            'label' => esc_html__('Icon for address:', 'test' ) ,
            'description' => esc_html__('Font Awesome icon','test' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $wp_customize->add_section(
        'site-info-section',
        array(
            'title' => esc_html__( 'Site info section', 'test' )
        )
    );
    $wp_customize->add_setting(
        'site-info',
        array('default' => ' © 2015  All Rights Reserved.')
    );

    $wp_customize->add_control(
        'site-info',
        array(
            'label' => esc_html__('Site info', 'Office' ) ,
            'section' => 'site-info-section',
            'type' => 'text',
        )
    );

}
add_action( 'customize_register', 'exam_kotenko_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function exam_kotenko_customize_preview_js() {
	wp_enqueue_script( 'exam_kotenko_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'exam_kotenko_customize_preview_js' );
