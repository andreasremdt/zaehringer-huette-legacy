<?php

/**
 * Load external CSS and JavaScript.
 */
function load_resources() {

  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Vollkorn', false);
  wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', false, '1.0', 'all');
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', false, '1.0', true);
  wp_enqueue_script('litebox', get_template_directory_uri() . '/assets/js/litebox.min.js', array('main'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'load_resources');



/**
 * Register custom menus.
 */
function register_menus() {
	register_nav_menus(array(
		'main_menu' => 'Kopfbereich',
		'footer_menu' => 'Fußbereich'
	));
}

add_action('after_setup_theme', 'register_menus', 0);



/**
 * Make the site more customizable by adding custom fields that
 * can hold data, such as phone and email.
 */
function theme_customization($wp_customize) {
  $wp_customize-> add_section('section_contact_info', array(
		'title' => 'Kontakt',
		'description' => 'Geben Sie hier die E-Mail-Adresse und Telefonnummer an, welche im Kopfbereich angezeigt werden.'
	));

	$wp_customize-> add_setting('setting_contact_phone', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_attr'
	));

	$wp_customize-> add_control('control_phone', array(
		'label' => 'Telefonnummer',
		'description' => 'Bitte geben Sie eine Telefonnummer an, unter welcher Gäste sie erreichen können.',
		'section' => 'section_contact_info',
		'settings' => 'setting_contact_phone',
		'type' => 'text'
  ));

  $wp_customize-> add_setting('setting_contact_email', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_attr'
	));
  
  $wp_customize-> add_control('control_email', array(
		'label' => 'E-Mail-Adresse',
		'description' => 'Bitte geben Sie eine E-Mail-Adresse an, unter welcher Gäste Ihnen schreiben können.',
		'section' => 'section_contact_info',
		'settings' => 'setting_contact_email',
		'type' => 'text'
	));
}

add_action('customize_register', 'theme_customization');
