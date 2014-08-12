<?php
	/*
	Plugin Name: Nearby Now Reviews and Audio Testimonials
	Plugin URI: http://servicepros.nearbynow.co/plugins/wordpress-plugins/
	Description: Nearby Now - Recent Reviews, Service Area Plugin and Audio Testimonials.
	Version: 1.4.5
	Author: Nearby Now
	Author URI: http://www.nearbynow.co
	*/

	class NearbyNow_ShortCode {
		static $add_scripts;

		static function init() {
			add_shortcode('recentreviews', array(__CLASS__, 'get_recent_reviews'));
			add_shortcode('serviceareamap', array(__CLASS__, 'get_service_area_map'));
			add_shortcode('serviceareareviewcombo', array(__CLASS__, 'get_service_area_review_combo_map'));
			add_shortcode('nearbynowtestimonials', array(__CLASS__, 'get_testimonials'));
			add_shortcode('nearbynowphotogallery', array(__CLASS__, 'get_photogallery'));
			add_shortcode('checkin', array(__CLASS__, 'get_checkin'));
			add_shortcode('review', array(__CLASS__, 'get_review'));
			add_action('init', array(__CLASS__, 'register_scripts'));
			//add_action('wp_head', array(__CLASS__, 'register_open_graph'), 1);
			add_action('wp_footer', array(__CLASS__, 'render_scripts'));
		}

		/*
		static function register_open_graph() {
			$checkin_id = $_GET['usercheckin_id'];
			$survey_id = $_GET['css'];
			if (!empty($checkin_id) || !empty($survey_id)) {
				$options = get_option('nearbynow_options');
				$exclude_open_graph = $options['open_graph_exclude'];
				if (empty($exclude_open_graph) || !(bool)$exclude_open_graph) {
					$apitoken = $options['text_string'];
					$token = trim($apitoken);
					$url = "http://api.sidebox.com/plugin/opengraph?storefronttoken=$token&checkin_id=$checkin_id&review_id=$survey_id";
					$request = wp_remote_get($url);
					if ( is_wp_error( $request ) ) {
						return;
					}
					$body = wp_remote_retrieve_body( $request );
					if (!is_null($body)) {
						$json = json_decode( $body );
						if(!is_null($json)) {
							echo '<meta property="og:title" content="'.$json->title.'"/>';
							echo '<meta property="og:type" content="article"/>';
							echo '<meta property="og:url" content="'.$json->url.'"/>';
							echo '<meta property="og:image" content="'.$json->image.'"/>';
							echo '<meta property="og:site_name" content="'.$json->site_name.'"/>';
							echo '<meta property="og:description" content="'.$json->description.'"/>';
							echo '<meta property="fb:app_id" content="'.$json->app_id.'"/>';
						}
					}
				}
			}
		}
		*/

		static function get_checkin() {
			self::$add_scripts = true;
			$id = $_GET['usercheckin_id'];
			if (!empty($id)) {
				$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
				$options = get_option('nearbynow_options');
				$apitoken = $options['text_string'];
				$token = trim($apitoken);
				$url = "http://api.sidebox.com/plugin/usercheckin?storefronttoken=$token&id=$id&agent=$agent";
				$request = wp_remote_get($url, array( 'timeout' => 15));
				$body = wp_remote_retrieve_body( $request );
				if( is_wp_error( $request ) ) {
					return;
				} else {
					return $body;
				}
			}
		}

		static function get_review() {
			self::$add_scripts = true;
			$id = $_GET['css'];
			if (!empty($id)) {
				$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
				$options = get_option('nearbynow_options');
				$apitoken = $options['text_string'];
				$token = trim($apitoken);
				$url = "http://api.sidebox.com/plugin/survey?storefronttoken=$token&id=$id&agent=$agent";
				$request = wp_remote_get($url, array( 'timeout' => 15));
				$body = wp_remote_retrieve_body( $request );
				if( is_wp_error( $request ) ) {
					return;
				} else {
					return $body;
				}
			}
		}

		static function get_recent_reviews($atts) {
			self::$add_scripts = true;

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
			$apitoken = $options['text_string'];
			$token = trim($apitoken);
			$url = "http://api.sidebox.com/plugin/nearbyreviews?storefronttoken=$token&state=$state&city=$city&zoomlevel=$zoom&radius=$radius&count=$count&showmap=$showMap&showfavorites=$showFavorites&mapscrollwheel=$mapScrollWheel&fblike=$fbLike&fbcomment=$fbComment&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_service_area_map($atts) {
			self::$add_scripts = true;
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
			$apitoken = $options['text_string'];
			$token = trim($apitoken);
			$url = "http://api.sidebox.com/plugin/nearbyservicearea?storefronttoken=$token&state=$state&city=$city&zoomlevel=$zoom&radius=$radius&count=$count&showmap=$showMap&showfavorites=$showFavorites&mapscrollwheel=$mapScrollWheel&fblike=$fbLike&fbcomment=$fbComment&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_service_area_review_combo_map($atts) {
			self::$add_scripts = true;
			$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
			$state = urlencode($atts['state']);
			$city = urlencode($atts['city']);
			$radius = $atts['radius'];
			$showMap = $atts['showmap'];
			$showFavorites = $atts['showfavorites'];
			if (trim($atts['techemail'])) {
			  $techEmail = urlencode($atts['techemail']);
			}
			$reviewStart = $atts['reviewstart'];
			$checkinStart = $atts['checkinstart'];
			$reviewCount = $atts['reviewcount'];
			$checkinCount = $atts['checkincount'];
			$zoom = $atts['zoomlevel'];
			if (trim($atts['reviewcityurl'])) {
				$reviewCityUrl = urlencode(str_replace('\"', '', $atts['reviewcityurl']));
			}
			$mapSize = $atts['mapsize'];
			$mapScrollWheel = $atts['mapscrollwheel'];
			$fbLike = $atts['fblike'];
			$fbcomment = $atts['fbcomment'];
			$options = get_option('nearbynow_options');
			$apitoken = $options['text_string'];
			$token = trim($apitoken);
			$url = "http://api.sidebox.com/plugin/nearbyserviceareareviewcombo?storefronttoken=$token&state=$state&city=$city&zoomlevel=$zoom&radius=$radius&reviewcityurl=$reviewCityUrl&reviewstart=$reviewStart&checkinstart=$checkinStart&reviewcount=$reviewCount&checkincount=$checkinCount&showmap=$showMap&mapsize=$mapSize&mapscrollwheel=$mapScrollWheel&fblike=$fbLike&fbcomment=$fbComment&showfavorites=$showFavorites&techemail=$techEmail&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
				//$error_string = $response->get_error_message();
				//return $error_string;
			} else {
			   return $response['body'];
			}
		}

		static function get_testimonials($atts) {
			self::$add_scripts = true;
			$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
			$start = $atts['start'];
			$count = $atts['count'];
			$playlist = $atts['playlist'];
			$showTranscription = $atts['showtranscription'];
			$options = get_option('nearbynow_options');
			$apitoken = $options['text_string'];
			$token = trim($apitoken);
			$url = "http://api.sidebox.com/plugin/testimonials?storefronttoken=$token&start=$start&count=$count&playlist=$playlist&showtranscription=$showTranscription&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_photogallery($atts) {
			self::$add_scripts = true;
			$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
			$start = $atts['start'];
			$count = $atts['count'];
			$options = get_option('nearbynow_options');
			$apitoken = $options['text_string'];
			$token = trim($apitoken);
			$url = "http://api.sidebox.com/plugin/photogallery?storefronttoken=$token&start=$start&count=$count&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function register_scripts() {
			//wp_register_style( 'nearbynow_css', 'https://s3.amazonaws.com/cdn.nearbynow.co/css/nnplugin.css' );
			wp_register_style( 'nearbynow_css', 'https://d6at0twdth9j2.cloudfront.net/css/plugin.min.css' );
	    wp_register_script( 'nearbynow_map', 'http://maps.google.com/maps/api/js?sensor=false', null, null, true);
	    wp_register_script( 'nearbynow_heatmap', 'https://s3.amazonaws.com/cdn.nearbynow.co/scripts/heatmap.js', null, null, true);
	    wp_register_script( 'nearbynow_heatmap_gmaps', 'https://s3.amazonaws.com/cdn.nearbynow.co/scripts/heatmap-gmaps.js', array('nearbynow_heatmap') , null, true);
		}

		static function render_scripts() {
			if ( ! self::$add_scripts )
				return;

			wp_print_styles('nearbynow_css');
			wp_print_scripts('nearbynow_map');
			wp_print_scripts('nearbynow_heatmap');
			wp_print_scripts('nearbynow_heatmap_gmaps');
		}

	}

	NearbyNow_ShortCode::init();

	function nearbynow_admin() {
	  //$opt_name = array('api_token' => 'nbn_api_token', 'include_open_graph' => 'nbn_include_open_graph');
		$opt_name = array('api_token' => 'nbn_api_token');
	  $hidden_field_name = 'nbn_submit_hidden';
		if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
		    //$opt_val = array('api_token' => $_POST[ $opt_name['api_token'] ], 'include_open_graph' => $_POST[ $opt_name['include_open_graph'] ]);
				$opt_val = array('api_token' => $_POST[ $opt_name['api_token'] ]);
		}
	}

	function nearbynow_admin_actions() {
    add_options_page("Nearby Now", "Nearby Now", 1, "NearbyNow", "nearbynow_options_page");
	}

	add_action('admin_menu', 'nearbynow_admin_actions');
	add_action('admin_init', 'nearbynow_admin_init');

	function nearbynow_options_page() { ?>
		<div>
			<form action="options.php" method="post">
				<?php settings_fields('nearbynow_options'); ?>
				<?php do_settings_sections('nearbynow'); ?>
				<input name="Submit" type="submit" value="<?php esc_attr_e('Save Settings'); ?>" />
			</form>
		</div>
	<?php
	}

	function nearbynow_admin_init() {
		register_setting( 'nearbynow_options', 'nearbynow_options', 'nearbynow_options_validate' );
		add_settings_section('nearbynow_main', 'Nearby Now Settings', 'nearbynow_section_text', 'nearbynow');
		add_settings_field('nearbynow_text_string', 'API Token', 'nearbynow_setting_string', 'nearbynow', 'nearbynow_main');
		//add_settings_field('nearbynow_open_graph_string', 'Exclude Open Graph Headers', 'nearbynow_open_graph_string', 'nearbynow', 'nearbynow_main');
	}

	function nearbynow_section_text() {
		echo '<p>To use the plugin, simply enter one of the plugin short-codes into any page or blog post. To see an example of how to enter a short code, visit our <a href="http://servicepros.nearbynow.co/plugins/wordpress-plugins/">sample wordpress site</a>.</p><br/><p>The API Token is required for the Nearby Now plugin to function. If the token is missing or invalid the plugin will display an empty string. Enter your API key below and click save settings.</p>';
	}

	function nearbynow_setting_string() {
		$options = get_option('nearbynow_options');
		echo "<input id='nearbynow_text_string' name='nearbynow_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
	}

	//function nearbynow_open_graph_string() {
	//	$options = get_option('nearbynow_options');
	//	$html = '<input type="checkbox" id="open_graph_exclude" name="nearbynow_options[open_graph_exclude]" value="1"' . checked( 1, $options['open_graph_exclude'], false ) . '/>';

	//	echo $html;
	//}

	function nearbynow_options_validate($input) {
		return $input;
	}

?>
