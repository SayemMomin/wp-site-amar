<?php
/**
 * Internet Provider Theme Customizer
 *
 * @package Internet Provider
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function internet_provider_customize_register( $wp_customize ) {

	function internet_provider_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function internet_provider_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function internet_provider_sanitize_email( $email, $setting ) {
		// Strips out all characters that are not allowable in an email address.
		$email = sanitize_email( $email );
		
		// If $email is a valid email, return it; otherwise, return the default.
		return ( ! is_null( $email ) ? $email : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Theme Options
	$wp_customize->add_panel( 'internet_provider_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'internet-provider' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('internet_provider_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','internet-provider'),
		'priority'	=> 1,
		'panel' => 'internet_provider_panel_area',
	));		
	
	$wp_customize->add_setting('internet_provider_box_layout',array(
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( 'internet_provider_box_layout', array(
	   'section'   => 'internet_provider_site_layoutsec',
	   'label'	=> __('Check to Box Layout','internet-provider'),
	   'type'      => 'checkbox'
 	));

	// Home Category Dropdown Section
	$wp_customize->add_section('internet_provider_one_cols_section',array(
		'title'	=> __('Manage Slider','internet-provider'),
		'description'	=> __('Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 600).','internet-provider'),
		'priority'	=> null,
		'panel' => 'internet_provider_panel_area'
	));

	$wp_customize->add_setting('internet_provider_pgboxes_title',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'internet_provider_pgboxes_title', array(
	   'section' 	=> 'internet_provider_one_cols_section',
	   'label'	 	=> __('Short Text','internet-provider'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'internet_provider_pageboxes', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Internet_Provider_Category_Dropdown_Custom_Control( $wp_customize, 'internet_provider_pageboxes', array(
		'section' => 'internet_provider_one_cols_section',
		'settings'   => 'internet_provider_pageboxes',
	) ) );
	
	//Hide Section
	$wp_customize->add_setting('internet_provider_hide_categorysec',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'internet_provider_hide_categorysec', array(
	   'settings' => 'internet_provider_hide_categorysec',
	   'section'   => 'internet_provider_one_cols_section',
	   'label'     => __('Uncheck To Enable This Section','internet-provider'),
	   'type'      => 'checkbox'
	));

	// Home Three Boxes Section 
	$wp_customize->add_section('internet_provider_below_banner_section', array(
		'title'	=> __('Manage Services Section','internet-provider'),
		'description'	=> __('Select Pages from the dropdown for Services, Also use the given image dimension (500 x 500).','internet-provider'),
		'priority'	=> null,
		'panel' => 'internet_provider_panel_area',
	));

	$wp_customize->add_setting('internet_provider_pageboxes1',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'internet_provider_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'internet_provider_pageboxes1',array(
		'type' => 'dropdown-pages',
		'section' => 'internet_provider_below_banner_section',
	));	

	$wp_customize->add_setting('internet_provider_pageboxes2',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'internet_provider_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'internet_provider_pageboxes2',array(
		'type' => 'dropdown-pages',
		'section' => 'internet_provider_below_banner_section',
	));
	
	$wp_customize->add_setting('internet_provider_pageboxes3',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'internet_provider_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'internet_provider_pageboxes3',array(
		'type' => 'dropdown-pages',
		'section' => 'internet_provider_below_banner_section',
	));
	
	$wp_customize->add_setting('internet_provider_disabled_pgboxes',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( 'internet_provider_disabled_pgboxes', array(
	   'settings' => 'internet_provider_disabled_pgboxes',
	   'section'   => 'internet_provider_below_banner_section',
	   'label'     => __('Uncheck To Enable This Section','internet-provider'),
	   'type'      => 'checkbox'
	));

	// Footer Section 
	$wp_customize->add_section('internet_provider_footer', array(
		'title'	=> __('Manage Footer Section','internet-provider'),
		'priority'	=> null,
		'panel' => 'internet_provider_panel_area',
	));

	$wp_customize->add_setting('internet_provider_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'internet_provider_copyright_line', array(
	   'section' 	=> 'internet_provider_footer',
	   'label'	 	=> __('Copyright Line','internet-provider'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));
}
add_action( 'customize_register', 'internet_provider_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function internet_provider_customize_preview_js() {
	wp_enqueue_script( 'internet_provider_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'internet_provider_customize_preview_js' );