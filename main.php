<?php
	/*
	Plugin Name: Nearby Now Recent Reviews
	Plugin URI: http://servicepros.nearbynow.co/plugins/wordpress-plugins/
	Description: Nearby Now - Recent Reviews and Service Area Plugin.
	Version: 1.1.1
	Author: Nearby Now
	Author URI: http://www.nearbynow.co
	*/

	add_action('wp_print_styles', 'add_nearbynow_stylesheet');
	add_action('wp_enqueue_scripts', 'load_nearbynow_remote_scripts');
	add_shortcode('recentreviews','get_recent_reviews');
	add_shortcode('serviceareamap','get_service_area_map');
	add_shortcode('serviceareareviewcombo', 'get_service_area_review_combo_map');

	function add_nearbynow_stylesheet() {
	    wp_register_style( 'nearbynow_css', 'https://s3.amazonaws.com/cdn.nearbynow.co/css/nnplugin.css' );
	    wp_enqueue_style( 'nearbynow_css' );
	}

	function load_nearbynow_remote_scripts() {
	    wp_deregister_script('jquery');
	    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
	    wp_enqueue_script( 'jquery');

	    wp_register_script( 'nearbynow_map', 'http://maps.google.com/maps/api/js?sensor=false');
	    wp_enqueue_script( 'nearbynow_map', array('jquery') );

	    wp_register_script( 'nearbynow_heatmap', 'https://s3.amazonaws.com/cdn.nearbynow.co/scripts/heatmap.js');
	    wp_enqueue_script( 'nearbynow_heatmap', array('nearbynow_map') );

	    wp_register_script( 'nearbynow_heatmap_gmaps', 'https://s3.amazonaws.com/cdn.nearbynow.co/scripts/heatmap-gmaps.js');
	    wp_enqueue_script( 'nearbynow_heatmap_gmaps', array('nearbynow_heatmap') );

	    wp_register_script( 'nearbynow_map', 'http://maps.google.com/maps/api/js?sensor=false');
	    wp_enqueue_script( 'nearbynow_map', array('nearbynow_heatmap_gmaps') );
	}

	function get_recent_reviews($atts) {  
		$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
		$state = urlencode($atts['state']);
		$city = urlencode($atts['city']);
		$radius = $atts['radius'];
		$showMap = $atts['showmap'];
		$showFavorites = $atts['showfavorites'];
		$start = $atts['start'];
		$count = $atts['count'];
		$zoom = $atts['zoomlevel'];
		$mapScrollWheel = $atts['mapscrollwheel'];
		$fbLike = $atts['fblike'];
		$fbcomment = $atts['fbcomment'];
		$options = get_option('nearbynow_options');
		$token = $options['text_string'];
		$url = "http://api.sidebox.com/plugin/nearbyreviews?storefronttoken=$token&state=$state&city=$city&zoomlevel=$zoom&radius=$radius&count=$count&showmap=$showMap&showfavorites=$showFavorites&mapscrollwheel=$mapScrollWheel&fblike=$fbLike&fbcomment=$fbComment&agent=$agent";
		$response = wp_remote_get($url);
		if( is_wp_error( $response ) ) {
		   return 'Oops, something went wrong with the Nearby Now plugin';
		} else { 
		   return $response['body'];
		}
	}

	function get_service_area_map($atts) {  
		$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
		$state = urlencode($atts['state']);
		$city = urlencode($atts['city']);
		$radius = $atts['radius'];
		$showMap = $atts['showmap'];
		$showFavorites = $atts['showfavorites'];
		$start = $atts['start'];
		$count = $atts['count'];
		$zoom = $atts['zoomlevel'];
		$mapScrollWheel = $atts['mapscrollwheel'];
		$fbLike = $atts['fblike'];
		$fbcomment = $atts['fbcomment'];
		$options = get_option('nearbynow_options');
		$token = $options['text_string'];
		$url = "http://api.sidebox.com/plugin/nearbyservicearea?storefronttoken=$token&state=$state&city=$city&zoomlevel=$zoom&radius=$radius&count=$count&showmap=$showMap&showfavorites=$showFavorites&mapscrollwheel=$mapScrollWheel&fblike=$fbLike&fbcomment=$fbComment&agent=$agent";
		$response = wp_remote_get($url);
		if( is_wp_error( $response ) ) {
		   return 'Oops, something went wrong with the Nearby Now plugin';
		} else {
		   return $response['body'];
		}
	}
	
	function get_service_area_review_combo_map($atts) {  
		$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
		$state = urlencode($atts['state']);
		$city = urlencode($atts['city']);
		$radius = $atts['radius'];
		$showMap = $atts['showmap'];
		$showFavorites = $atts['showfavorites'];
		$reviewStart = $atts['reviewstart'];
		$checkinStart = $atts['checkinstart'];
		$reviewCount = $atts['reviewcount'];
		$checkinCount = $atts['checkincount'];
		$zoom = $atts['zoomlevel'];
		$reviewCityUrl = urlencode($atts['reviewcityurl']);
		$mapSize = $atts['mapsize'];
		$mapScrollWheel = $atts['mapscrollwheel'];
		$fbLike = $atts['fblike'];
		$fbcomment = $atts['fbcomment'];
		$options = get_option('nearbynow_options');
		$token = $options['text_string'];
		$url = "http://api.sidebox.com/plugin/nearbyserviceareareviewcombo?storefronttoken=$token&state=$state&city=$city&zoomlevel=$zoom&radius=$radius&reviewcityurl=$reviewCityUrl&reviewstart=$reviewStart&checkinstart=$checkinStart&reviewcount=$reviewCount&checkincount=$checkinCount&showmap=$showMap&mapsize=$mapSize&mapscrollwheel=$mapScrollWheel&fblike=$fbLike&fbcomment=$fbComment&showfavorites=$showFavorites&agent=$agent";
		$response = wp_remote_get($url);
		if( is_wp_error( $response ) ) {
		   return 'Oops, something went wrong with the Nearby Now plugin';
		} else {
		   return $response['body'];
		}
	}

	function nearbynow_admin() {  
	    $opt_name = array('api_token' => 'nbn_api_token');
	    $hidden_field_name = 'nbn_submit_hidden';
		if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
		    $opt_val = array('api_token' => $_POST[ $opt_name['api_token'] ]);
		}
	}

	function nearbynow_admin_actions() {  
	    add_options_page("NearbyNow", "NearbyNow", 1, "NearbyNow", "nearbynow_options_page");  
	}
	  
	add_action('admin_menu', 'nearbynow_admin_actions');

function nearbynow_options_page() { ?>
	<div>
		<form action="options.php" method="post">
			<?php settings_fields('nearbynow_options'); ?>
			<?php do_settings_sections('nearbynow'); ?>
			<input name="Submit" type="submit" value="<?php esc_attr_e('Save Token'); ?>" />
		</form>
	</div>
<?php
} 

	add_action('admin_init', 'nearbynow_admin_init');

	function nearbynow_admin_init() {
		register_setting( 'nearbynow_options', 'nearbynow_options', 'nearbynow_options_validate' );
		add_settings_section('nearbynow_main', 'Nearby Now Settings', 'nearbynow_section_text', 'nearbynow');
		add_settings_field('nearbynow_text_string', 'API Token', 'nearbynow_setting_string', 'nearbynow', 'nearbynow_main');
	}

	function nearbynow_section_text() {
		echo '<p>To use the plugin, simply enter one of the plugin short-codes into any page or blog post. To see an example of how to enter a short code, visit our <a href="http://servicepros.nearbynow.co/plugins/wordpress-plugins/">sample wordpress site</a>.</p><br/><p>The API Token is required for the Nearby Now plugin to function. If the token is missing or invalid the plugin will display an emoty string. Enter your API key below and click save token.</p>';
	}

	function nearbynow_setting_string() {
		$options = get_option('nearbynow_options');
		echo "<input id='nearbynow_text_string' name='nearbynow_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
	}

	function nearbynow_options_validate($input) {
		return $input;
	}
?>