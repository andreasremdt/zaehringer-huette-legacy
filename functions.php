<?php

/**
 * Load external CSS and JavaScript.
 */
function load_resources() {

  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Vollkorn', false);
  wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', false, '1.0', 'all');
  wp_enqueue_script('litebox', get_template_directory_uri() . '/assets/js/litebox.min.js', false, '1.0', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('litebox'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'load_resources');



/**
 * Register custom theme features.
 */
function theme_setup() {
	add_theme_support('disable-custom-colors');
	add_theme_support('html5', array('gallery', 'caption'));
	add_theme_support('title-tag');
	add_theme_support('custom-header', array(
		'width' => 1920,
		'height' => 800
	));
	
	register_nav_menus(array(
		'main_menu' => 'Kopfbereich',
		'footer_menu' => 'Fußbereich'
	));
}

add_action('after_setup_theme', 'theme_setup', 0);



/**
 * Make the site more customizable by adding custom fields that
 * can hold data, such as phone and email.
 */
function theme_customization($wp_customize) {
  $wp_customize->add_section('section_contact_info', array(
		'title' => 'Kontakt',
		'description' => 'Geben Sie hier die E-Mail-Adresse und Telefonnummer an, welche im Kopfbereich angezeigt werden.'
	));

	$wp_customize->add_section('section_features', array(
		'title' => 'Eigenschaften',
		'description' => 'Schreiben Sie hier über die 4 wichtigsten Eigenschaften der Hütte.'
	));

	$wp_customize->add_section('section_maps', array(
		'title' => 'Google Maps',
		'description' => 'Geben Sie hier die Daten für die Google Maps Karte ein.'
	));

	



	$wp_customize->add_setting('setting_contact_phone', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_attr'
	));

	$wp_customize->add_control('control_phone', array(
		'label' => 'Telefonnummer',
		'description' => 'Bitte geben Sie eine Telefonnummer an, unter welcher Gäste sie erreichen können.',
		'section' => 'section_contact_info',
		'settings' => 'setting_contact_phone',
		'type' => 'text'
	));
	


  $wp_customize->add_setting('setting_contact_email', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_attr'
	));
  
  $wp_customize->add_control('control_email', array(
		'label' => 'E-Mail-Adresse',
		'description' => 'Bitte geben Sie eine E-Mail-Adresse an, unter welcher Gäste Ihnen schreiben können.',
		'section' => 'section_contact_info',
		'settings' => 'setting_contact_email',
		'type' => 'text'
	));



	$wp_customize->add_setting('setting_feature-1', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_setting('setting_feature-2', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_setting('setting_feature-3', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_setting('setting_feature-4', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('control_feature-1', array(
		'label' => 'Idyllische Natur',
		'section' => 'section_features',
		'settings' => 'setting_feature-1',
		'type' => 'textarea'
	));

	$wp_customize->add_control('control_feature-2', array(
		'label' => 'Wintersport',
		'section' => 'section_features',
		'settings' => 'setting_feature-2',
		'type' => 'textarea'
	));

	$wp_customize->add_control('control_feature-3', array(
		'label' => 'Wanderwege',
		'section' => 'section_features',
		'settings' => 'setting_feature-3',
		'type' => 'textarea'
	));

	$wp_customize->add_control('control_feature-4', array(
		'label' => 'Modern & Komfortabel',
		'section' => 'section_features',
		'settings' => 'setting_feature-4',
		'type' => 'textarea'
	));



	$wp_customize->add_setting('setting_maps_key', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_setting('setting_maps_location', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_textarea'
	));

	$wp_customize->add_control('control_maps_key', array(
		'label' => 'Google Maps API Key',
		'description' => 'Bitte ändern Sie dieses Feld nur, wenn Sie sicher sind einen neuen API Key zu haben.',
		'section' => 'section_maps',
		'settings' => 'setting_maps_key',
		'type' => 'text'
	));

	$wp_customize->add_control('control_maps_location', array(
		'label' => 'Google Maps Link',
		'description' => 'Geben Sie hier die Adresse ein, welche in der Karte angezeigt werden soll.',
		'section' => 'section_maps',
		'settings' => 'setting_maps_location',
		'type' => 'textarea'
	));



	$wp_customize->remove_section('custom_css');
	$wp_customize->remove_section('colors');
}

add_action('customize_register', 'theme_customization');



function theme_sidebars() {
	register_sidebar(array(
		'name' => 'Austattung 1',
		'id' => 'facilities-1',
		'description' => 'Geben Sie hier Ausstattungsmerkmale, etwa die Anzahl der Zimmer, ein.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Austattung 2',
		'id' => 'facilities-2',
		'description' => 'Geben Sie hier Ausstattungsmerkmale, etwa sanitäre Anlagen, ein.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Ausstattung 3',
		'id' => 'facilities-3',
		'description' => 'Geben Sie hier Ausstattungsmerkmale, etwa zur Küche, ein.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Galerie',
		'id' => 'gallery',
		'description' => 'Wählen Sie hier Bilder für die Bildergalerie auf der Startseite aus.',
		'before_widget' => '<section class="gallery-section">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="fancy-title" id="galerie">',
		'after_title' => '</h2>'
	));

	register_sidebar(array(
		'name' => 'Preise - Sommer',
		'id' => 'prices-summer',
		'description' => 'Geben Sie hier die Preise für die Sommermonate an.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Preise - Winter',
		'id' => 'prices-winter',
		'description' => 'Geben Sie hier die Preise für die Wintermonate an.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Preise - Informationen',
		'id' => 'prices-infos',
		'description' => 'Geben Sie hier weitere Informationen zu den Preisen.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Reservierungen',
		'id' => 'booking',
		'description' => 'An dieser Stelle befindet sich der Buchungskalender.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="fancy-title">',
		'after_title' => '</h2>'
	));
}

add_action('widgets_init', 'theme_sidebars');



function submit_form_data() {
	$dir_name = dirname(__FILE__);

  require $dir_name . '/class.phpmailer.php';
	require $dir_name . '/class.smtp.php';
	
  try {
		$name = trim(htmlspecialchars($_POST['name']));
		$email = trim(htmlspecialchars($_POST['email']));
		$message = trim(htmlspecialchars($_POST['message']));
		$phone = trim(htmlspecialchars($_POST['phone']));

    if (empty($name) || empty($email) || empty($message)) {
      throw new Exception('Bad form parameters. Check the markup to make sure you are naming the inputs correctly.');
		}
		
    if (!is_email($email)) {
      throw new Exception('Email address not formatted correctly.');
    }
 
		$headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email . ' <' . $email . '>');
    $send_to = "info@zaehringer-huette.de";
    $subject = 'Anfrage zur Zähringer Hütte von ' . $name;
		$message = <<<EOF
		<style type="text/css">
			* {
				font-family: sans-serif;
			}
		</style>
    <p>Hallo Günther Effinger,<br /><br />
		Sie haben eine Anfrage zur Zähringer Hütte erhalten:<br /><br />
		<b>Absender:</b><br />
		$name (<a href="mailto:$email">$email</a>)<br /><br />
		<b>Rückrufnummer:</b><br >
		$phone<br /><br />
		<b>Nachricht:</b><br />
		$message
		</p>
		
    <p>Sie können direkt auf diese E-Mail antworten, um dem Absender eine Antwort zu senden.</p>
EOF;
		
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'wp12240570.mailout.server-he.de';
		$mail->SMTPAuth = true;
		$mail->Username = 'wp12240570-info';
		$mail->Password = '\wZx*68;/q8v3h(6';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->CharSet = 'UTF-8';

		$mail->From = $send_to;
		$mail->FromName = 'Zähringer Hütte';
		$mail->addAddress($send_to, 'Zähringer Hütte');
		$mail->addReplyTo($email, $name);

		$mail->WordWrap = 50;          
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = $message;

		if(!$mail->send()) {
			throw new Exception($mail->ErrorInfo);
    } else {
			echo json_encode(array('status' => 'success', 'message' => 'Contact message sent.'));
    }
  } catch (Exception $e) {
		echo json_encode(array('status' => 'success', 'message' => $e->getMessage()));
	}

	wp_die();
}

add_action('wp_ajax_submit_form_data', 'submit_form_data');
add_action('wp_ajax_nopriv_submit_form_data', 'submit_form_data');



function dequeue_styles() {
	wp_deregister_style('wpbc-calendar');
	wp_deregister_style('wpbc-calendar-skin');
	wp_deregister_style('wpbc-client-pages');
	wp_deregister_style('wpbc-admin-timeline');
	wp_deregister_style('wpdevelop-bts-theme');
	wp_deregister_style('wpdevelop-bts');
}

add_action('wp_print_styles', 'dequeue_styles', 100);



function remove_attr($tag, $handle) {
	return preg_replace("/type=['\"]text\/(javascript|css)['\"]\s/", '', $tag);
}

add_filter('script_loader_tag', 'remove_attr', 10, 2);
add_filter('style_loader_tag', 'remove_attr', 10, 2);



function wp_html_compression_finish($html) {
	$dir_name = dirname(__FILE__);

  require $dir_name . '/inc/compression.php';

	return new WP_HTML_Compression($html);
}

function wp_html_compression_start() {
	ob_start('wp_html_compression_finish');
}

add_action('get_header', 'wp_html_compression_start');