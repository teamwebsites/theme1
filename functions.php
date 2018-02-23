<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_action( 'plugins_loaded', 'wpse_232287_init' );

function wpse_232287_init() { // Initiate the function
    ob_start( 'wpse_232287_remove_http' );
}

function wpse_232287_remove_http( $buffer ) {
    // Check for a Content-Type header, only apply rewriting to "text/html" or undefined
    $headers = headers_list();
    $content_type = null;

    foreach ( $headers as $header ) {
        if (strpos( strtolower( $header ), 'content-type:' ) === 0 ) {
            $pieces = explode( ':', strtolower( $header ) );
            $content_type = trim( $pieces[1] );
            break;
        }
    }

    if ( is_null( $content_type ) || substr( $content_type, 0, 9 ) === 'text/html' ) { // Replace 'href'/'src' attributes within script/link/base/img tags with '//'
        $return = preg_replace( "/(<(script|link|base|img|form)([^>]*)(href|src|action)=[\"'])https?:\\/\\//i", "$1//", $buffer );
        if ( $return ) { // On regex error, skip overwriting content
            $buffer = $return;
        }
    }
    return $buffer;
}

/* Main redirection of the default login page */
function redirect_login_page() {
	$login_page  = home_url('/login/');
	$page_viewed = basename($_SERVER['REQUEST_URI']);

	if($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
		wp_redirect($login_page);
		exit;
	}
}
add_action('init','redirect_login_page');

/* Where to go if a login failed */
function custom_login_failed() {
	$login_page  = home_url('/login/');
	wp_redirect($login_page . '?login=failed');
	exit;
}
add_action('wp_login_failed', 'custom_login_failed');

function wp_authenticate_user() {
    $login_page  = home_url('/login/');
	wp_redirect($login_page . '?login=wpau_confirmation_error');
	exit;
}
add_action('wp_login_failed', 'wp_authenticate_user');

/* Where to go if any of the fields were empty */
function verify_user_pass($user, $username, $password) {
	$login_page  = home_url('/login/');
	if($username == "" || $password == "") {
		wp_redirect($login_page . "?login=empty");
		exit;
	}
}
add_filter('authenticate', 'verify_user_pass', 1, 3);

/* What to do on logout */
function logout_redirect() {
	$login_page  = home_url('/login/');
	wp_redirect($login_page . "?login=false");
	exit;
}
add_action('wp_logout','logout_redirect');


function admin_pages_redirect() {
$current_url = add_query_arg(NULL, NULL);
$parts = explode('/', $current_url);
$last = end($parts);
$admin_pages = array(
    'index.php?page=wpcm-about',
    'admin.php?page=ultimatemember',
);
if (in_array($last, $admin_pages)) {
    wp_redirect(admin_url('/options-general.php?page=general'));
    exit;
    }
}
add_action('admin_init', 'admin_pages_redirect');



add_action('admin_menu', function() {
    add_options_page( 'General Settings', 'my awesome plugin', 'manage_options', 'general', 'my_awesome_plugin_page' );
});
 
 
 
add_action( 'admin_init', function() {
    
    register_setting( 'my-awesome-plugin-settings', 'map_option_1' );
    register_setting( 'my-awesome-plugin-settings', 'blogname' );
    register_setting( 'my-awesome-plugin-settings', 'isyouthclub' );
    register_setting( 'my-awesome-plugin-settings', 'site-isverified' );
    register_setting( 'my-awesome-plugin-settings', 'clubeventsq' );
    register_setting( 'my-awesome-plugin-settings', 'wpcm_sport' );
    register_setting( 'my-awesome-plugin-settings', 'wpcm_default_club' );
    register_setting( 'my-awesome-plugin-settings', 'wpcm_default_country' );
    register_setting( 'my-awesome-plugin-settings', 'blogdescription' );
    register_setting( 'my-awesome-plugin-settings', 'map_option_2' );
    register_setting( 'my-awesome-plugin-settings', 'map_option_3' );
    register_setting( 'my-awesome-plugin-settings', 'map_option_4' );
    register_setting( 'my-awesome-plugin-settings', 'map_option_5' );
    register_setting( 'my-awesome-plugin-settings', 'map_option_6' );
    
    register_setting( 'my-awesome-plugin-settings', 'teammanagementfeature' );
    register_setting( 'my-awesome-plugin-settings', 'fixturesresultsable' );
    register_setting( 'my-awesome-plugin-settings', 'photosnvideosable' );
    register_setting( 'my-awesome-plugin-settings', 'playerpaymentsdisplay' );
    register_setting( 'my-awesome-plugin-settings', 'clubshopable' );
});
 
 
function my_awesome_plugin_page() {
    
    $sitetitle1 = get_option( 'blogname' );
    $tagline1 = get_option( 'blogdescription' );
  ?>
    <div class="wrap" style="padding-top:5px;margin-top: 12px; padding-right:20px !important;">
        <style>
        
            @media screen and (max-width: 950px) { .thirtypcblock span {font-size: 10px !important;} .settings_page_general tr {margin: 5px 0px;} .settings_page_general tr, .settings_page_general table, .settings_page_general input, .settings_page_general tbody, .settings_page_general td, .settings_page_general th { display: block; clear: both; width: 100%; } }    
            
            #slogannote {font-size: 9px !important; font-weight: normal !important; margin-left: 1.4px;} .settings_page_general table {border-collapse: separate; border-spacing: 0em 0.99em;} .settings_page_general table, .settings_page_general table input {font-size: 12px !important;} .settings_page_general table th {padding-right: 25px; font-weight: 600;} .settings_page_general form {color: #535353;} .settings_page_general h2 {font-size: 16px !important; font-weight: 600 !important; color: #373737;} .settings_page_general table th, .settings_page_general table td {font-family: 'Montserrat', sans-serif !important;} .settings_page_general #wpbody-content .updated {display: none !important;} tr th {text-align: left;}
            
            .thirtypcblock:before {position: absolute; color: rgba(172, 172, 172, 0.76); display: block; font-size: 49px; position: absolute; top: 0px; right: 0px; font-family: FontAwesome;}
            
            .thirtypcblock {min-height: 150.33px;}
            
            .clubshop:before {content: "\f291";}
            
            .playerpaymentsdisplay:before {content: "\f283";}
            
            .photosandvideos:before {content: "\f03e";}
            
            .fixturesresultsopt:before {content: "\f0cb";}
            
            .teammanagement:before {content: "\f0c0";}
            
            .photosandvideos, .clubshop, .playerpaymentsdisplay, .fixturesresultsopt, .teammanagement, .clubevents {background: grey;}
            .clubevents:before { content: "\f271";}
            
            .thirtypcblock h4 {width: calc(100% - 50px); font-weight: 500; padding-bottom: 7px; margin: 0px !important; font-size: 14.5px !important;}
            .thirtypcblock input[type=radio]:checked:before {margin: 0px !important; width: 50% !important; height: 50% !important; align-items: center; justify-content: center; display: flex;}
            .thirtypcblock input[type=radio] {align-items: center; justify-content: center; display: flex; width: 25px !important; height: 25px !important;}
            .thirtypcblock p {margin-top: 0px !important; margin-left: 0px !important; margin-right: 0px !important; margin-bottom: 13px !important;}
            
            .thirtypcblock div {position: relative; z-index: 11;}
            
            @media screen and (min-width: 1050px) and (max-width: 1150px) { .thirtypcblock h4 {font-size: 10px !important;} .inputdiv:first-child {margin-bottom: 17px;} }
            @media screen and (max-width: 750px) { .inputdiv:first-child {margin-bottom: 17px;} }
            
            .thirtypcblock {position: relative; padding: 15px; color: #fff; float: left; width: calc(33.3% - 3px); margin-right: 3px; display: block;}
            
            .inputdiv {margin-right: 11px;} #eventsactivate div span {line-height: 0px !important; margin-top: -4px !important; margin-left: 3px;} #eventsactivate div {display: flex; align-items: center; justify-content: flex-start; flex-wrap: wrap;} </style>
        
      <form action="options.php" method="post">
 
        <?php
          settings_fields( 'my-awesome-plugin-settings' );
          do_settings_sections( 'my-awesome-plugin-settings' );
        ?>
        
        <h2>Website Features</h2>
        
        
        
        <div class="clubevents thirtypcblock">
            
        <div>
        <h4>Club Events</h4>
        <p>Got a team social or meeting coming up? Simply post details of location and time.</p>    
        </div>
        
        <div id="eventsactivate">
        
        <div>
        
        <div class="inputdiv">
        <input name="clubeventsq" type="radio" value="1" checked="checked" <?php checked( '1', get_option( 'clubeventsq' ) ); ?> />
        <span>Activate</span>    
        </div>
        
        <div class="inputdiv">
        <input name="clubeventsq" type="radio" value="0" <?php checked( '0', get_option( 'clubeventsq' ) ); ?> />
        <span>Deactivate</span>    
        </div>
            
        </div>
        </div>
        </div>
        
        <div class="cleareverythird" style="display: none !important;"></div>
        
         <div class="teammanagement thirtypcblock">
            
        <div>
        <h4>Team Management</h4>
        <p>Display a list of players on your site by adding them under the <i>Team Management</i> section.</p>    
        </div>
        
        <div id="eventsactivate">
        
        <div>
        
        <div class="inputdiv">
        <input name="teammanagementfeature" type="radio" value="1" checked="checked" <?php checked( '1', get_option( 'teammanagementfeature' ) ); ?> />
        <span>Activate</span>    
        </div>
        
        <div class="inputdiv">
        <input name="teammanagementfeature" type="radio" value="0" <?php checked( '0', get_option( 'teammanagementfeature' ) ); ?> />
        <span>Deactivate</span>    
        </div>
            
        </div>
        </div>
        </div>
        
        
        
        <div class="cleareverythird"></div>
        
        <div class="fixturesresultsopt thirtypcblock">
            
        <div>
        <h4>Fixtures & Results</h4>
        <p>Embed FA Full-Time fixtures, results <strong>AND</strong> league tables? You may disable this section.</p>    
        </div>
        
        <div id="eventsactivate">
        
        <div>
        
        <div class="inputdiv">
        <input name="fixturesresultsable" type="radio" value="1" checked="checked" <?php checked( '1', get_option( 'fixturesresultsable' ) ); ?> />
        <span>Activate</span>    
        </div>
        
        <div class="inputdiv">
        <input name="fixturesresultsable" type="radio" value="0" <?php checked( '0', get_option( 'fixturesresultsable' ) ); ?> />
        <span>Deactivate</span>    
        </div>
            
        </div>
        </div>
        </div>
        
        
        <div class="cleareverythird" style="display: block !important;"></div>
        
        <div class="photosandvideos thirtypcblock">
            
        <div>
        <h4>Photos & Videos</h4>
        <p>You may hide and deactivate this feature, which allows you to upload documents and photos to your site.</p>    
        </div>
        
        <div id="eventsactivate">
        
        <div>
        
        <div class="inputdiv">
        <input name="photosnvideosable" type="radio" value="1" checked="checked" <?php checked( '1', get_option( 'photosnvideosable' ) ); ?> />
        <span>Activate</span>    
        </div>
        
        <div class="inputdiv">
        <input name="photosnvideosable" type="radio" value="0" <?php checked( '0', get_option( 'photosnvideosable' ) ); ?> />
        <span>Deactivate</span>    
        </div>
            
        </div>
        </div>
        </div>
        
        <div class="cleareverythird"></div>
        
        <div class="playerpaymentsdisplay thirtypcblock">
            
        <div>
        <h4>Player Payments</h4>
        <p>Collect payments from players and club members with our online portal for collecting subs, fees and fines.</p>    
        </div>
        
        <div id="eventsactivate">
        
        <div>
        
        <div class="inputdiv">
        <input name="playerpaymentsdisplay" type="radio" value="1" <?php checked( '1', get_option( 'playerpaymentsdisplay' ) ); ?> />
        <span>Activate</span>    
        </div>
        
        <div class="inputdiv">
        <input name="playerpaymentsdisplay" type="radio" value="0" checked="checked" <?php checked( '0', get_option( 'playerpaymentsdisplay' ) ); ?> />
        <span>Deactivate</span>    
        </div>
            
        </div>
        </div>
        </div>
        
        
        <div class="cleareverythird"></div>
        
        <div class="clubshop thirtypcblock">
            
        <div>
        <h4>Club Shop</h4>
        <p>Collect payments from players and club members with our online portal for collecting subs, fees and fines.</p>    
        </div>
        
        <div id="eventsactivate">
        
        <div>
        
        <?php if ( is_multisite() ) : ?>
        
        <p style="height: 21.01px !important; font-weight: bold; margin-top: 0px !important; font-size: 9.3112px !important; margin-bottom: 0px !important;">This feature is only available with Paid packages.</p>
        
        <?php else: ?>
        
        <div class="inputdiv">
        <input name="clubshopable" type="radio" value="1" <?php checked( '1', get_option( 'clubshopable' ) ); ?> />
        <span>Activate</span>    
        </div>
        
        <div class="inputdiv">
        <input name="clubshopable" type="radio" value="0" checked="checked" <?php checked( '0', get_option( 'clubshopable' ) ); ?> />
        <span>Deactivate</span>    
        </div>
        
        <?php endif; ?>
            
        </div>
        </div>
        </div>
        
        <div style="clear: both; display: block; height: 7px;"></div>
        
        <h2>General Settings</h2>
        
        <table>
             
            <tr>
                <th>Club Name</th>
                <td><input type="text" placeholder="Club Name" name="blogname" value="<?php echo esc_attr( get_option('blogname') ); ?>" size="50" /></td>
            </tr>
            <tr>
                <th>Slogan <span id="slogannote">(or year club founded)</span></th>
                <td><input type="text" placeholder="Slogan" name="blogdescription" value="<?php echo esc_attr( get_option('blogdescription') ); ?>" size="50" /></td>
            </tr>
            
            
            <tr>
                <th>Site URL <span id="slogannote"><a href="mailto:support@teamwebsites.co.uk?subject=Request Website URL Change: <?php echo site_url(''); ?>&body=Hi, I wish to change our site URL FROM <?php echo site_url(); ?>, TO: [PLEASE DELETE AND REPLACE WITH NEW URL SUFFIX]">(request to change)</a></span></th>
                <td><input type="text" placeholder="Site URL" name="siteurl" value="<?php echo site_url( '/', 'http' ); ?>" size="50" readonly/></td>
            </tr>
            
            <tr id="switchsport">
            
            <th>Blog ID <span id="slogannote">(for multisite, displays only to the TW Team)</span></th>
            
            <td>
            <input type="text" placeholder="<?php $blog_id1 = get_current_blog_id(); echo $blog_id1;?>" name="multisite-blog-id" value="<?php $blog_id1 = get_current_blog_id(); echo $blog_id1;?>" readonly/>    
            </td>
                
            </tr>
            
            
            <tr>
                <th>Username <span id="slogannote">(cannot be changed)</span></th>
                <td><input type="text" placeholder="<?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?>" name="user_login" value="<?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?>" size="50" readonly/></td>
            </tr>
            
            <tr>
            <th>Select Default Club <span id="slogannote">(if you enter results manually, select your club name)</span></th>
            
            <td>
            
            <select name="wpcm_default_club" id="wpcm_default_club" class="postform chosen_select">
            <?php
            $args = array( 'post_type' => 'wpcm_club', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
            global $post;
            ?>
            <option class="level-0" value="<?php echo $post->ID; ?>" <?php echo esc_attr( get_option('wpcm_default_club') ) == $post->ID ? 'selected="selected"' : ''; ?>>
            <?php the_title(); ?>
            </option>
            <?php
            endwhile;
            ?>    
		    </select>
            
            
</td>

</tr>
            
            <tr>
            
            <th>Sport</th>
            
            <td>
            
            <select name="wpcm_sport" id="wpcm_sport" class="chosen_select">
            <option value="soccer" <?php echo esc_attr( get_option('wpcm_sport') ) == 'football' ? 'selected="selected"' : ''; ?>>Football</option>
            <option value="baseball" <?php echo esc_attr( get_option('wpcm_sport') ) == 'baseball' ? 'selected="selected"' : ''; ?>>Baseball</option>
			<option value="basketball" <?php echo esc_attr( get_option('wpcm_sport') ) == 'basketball' ? 'selected="selected"' : ''; ?>>Basketball</option>
			<option value="cricket" <?php echo esc_attr( get_option('wpcm_sport') ) == 'cricket' ? 'selected="selected"' : ''; ?>>Cricket</option>
			<option value="floorball" <?php echo esc_attr( get_option('wpcm_sport') ) == 'floorball' ? 'selected="selected"' : ''; ?>>Floorball</option>
			<option value="football" <?php echo esc_attr( get_option('wpcm_sport') ) == 'football' ? 'selected="selected"' : ''; ?>>American Football</option>
			<option value="footy" <?php echo esc_attr( get_option('wpcm_sport') ) == 'footy' ? 'selected="selected"' : ''; ?>>Australian Rules Football</option>
			<option value="gaelic" <?php echo esc_attr( get_option('wpcm_sport') ) == 'gaelic' ? 'selected="selected"' : ''; ?>>Gaelic Football / Hurling</option>
			<option value="handball" <?php echo esc_attr( get_option('wpcm_sport') ) == 'handball' ? 'selected="selected"' : ''; ?>>Handball</option>
			<option value="hockey_field" <?php echo esc_attr( get_option('wpcm_sport') ) == 'hockey_field' ? 'selected="selected"' : ''; ?>>Field Hockey</option>
			<option value="hockey" <?php echo esc_attr( get_option('wpcm_sport') ) == 'hockey' ? 'selected="selected"' : ''; ?>>Ice Hockey</option>
			<option value="lacrosse" <?php echo esc_attr( get_option('wpcm_sport') ) == 'lacrosse' ? 'selected="selected"' : ''; ?>>Lacrosse</option>
			<option value="netball" <?php echo esc_attr( get_option('wpcm_sport') ) == 'netball' ? 'selected="selected"' : ''; ?>>Netball</option>
			<option value="rugby_league" <?php echo esc_attr( get_option('wpcm_sport') ) == 'rugby_league' ? 'selected="selected"' : ''; ?>>Rugby League</option>
			<option value="rugby" <?php echo esc_attr( get_option('wpcm_sport') ) == 'rugby' ? 'selected="selected"' : ''; ?>>Rugby Union</option>
			<option value="volleyball" <?php echo esc_attr( get_option('wpcm_sport') ) == 'volleyball' ? 'selected="selected"' : ''; ?>>Volleyball</option>
		    </select>
		    
		    </td>
		    
		    </tr>
		    
		    
		    <tr>
		    
		    <th>Select Country <span id="slogannote">(for sports plugin)</span></th>
		    
		    <td>
		    
		                    <select name="wpcm_default_country" data-placeholder="Choose a country…" title="Country" class="chosen_select">
				        	<option value="ax" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ax' ? 'selected="selected"' : ''; ?>>Åland Islands</option>
				        	<option value="af" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'af' ? 'selected="selected"' : ''; ?>>Afghanistan</option>
				        	<option value="al" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'al' ? 'selected="selected"' : ''; ?>>Albania</option>
				        	<option value="dz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'dz' ? 'selected="selected"' : ''; ?>>Algeria</option>
				        	<option value="as" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'as' ? 'selected="selected"' : ''; ?>>American Samoa</option>
				        	<option value="ad" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ad' ? 'selected="selected"' : ''; ?>>Andorra</option>
				        	<option value="ao" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ao' ? 'selected="selected"' : ''; ?>>Angola</option>
				        	<option value="ai" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ai' ? 'selected="selected"' : ''; ?>>Anguilla</option>
				        	<option value="aq" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'aq' ? 'selected="selected"' : ''; ?>>Antarctica</option>
				        	<option value="ag" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ag' ? 'selected="selected"' : ''; ?>>Antigua and Barbuda</option>
				        	<option value="ar" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ar' ? 'selected="selected"' : ''; ?>>Argentina</option>
				        	<option value="am" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'am' ? 'selected="selected"' : ''; ?>>Armenia</option>
				        	<option value="aw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'aw' ? 'selected="selected"' : ''; ?>>Aruba</option>
				        	<option value="au" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'au' ? 'selected="selected"' : ''; ?>>Australia</option>
				        	<option value="at" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'at' ? 'selected="selected"' : ''; ?>>Austria</option>
				        	<option value="az" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'az' ? 'selected="selected"' : ''; ?>>Azerbaijan</option>
				        	<option value="bs" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bs' ? 'selected="selected"' : ''; ?>>Bahamas</option>
				        	<option value="bh" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bh' ? 'selected="selected"' : ''; ?>>Bahrain</option>
				        	<option value="bd" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bd' ? 'selected="selected"' : ''; ?>>Bangladesh</option>
				        	<option value="bb" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bb' ? 'selected="selected"' : ''; ?>>Barbados</option>
				        	<option value="by" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'by' ? 'selected="selected"' : ''; ?>>Belarus</option>
				        	<option value="be" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'be' ? 'selected="selected"' : ''; ?>>Belgium</option>
				        	<option value="bz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bz' ? 'selected="selected"' : ''; ?>>Belize</option>
				        	<option value="bj" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bj' ? 'selected="selected"' : ''; ?>>Benin</option>
				        	<option value="bm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bm' ? 'selected="selected"' : ''; ?>>Bermuda</option>
				        	<option value="bt" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bt' ? 'selected="selected"' : ''; ?>>Bhutan</option>
				        	<option value="bo" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bo' ? 'selected="selected"' : ''; ?>>Bolivia</option>
				        	<option value="ba" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ba' ? 'selected="selected"' : ''; ?>>Bosnia and Herzegovina</option>
				        	<option value="bw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bw' ? 'selected="selected"' : ''; ?>>Botswana</option>
				        	<option value="bv" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bv' ? 'selected="selected"' : ''; ?>>Bouvet Island</option>
				        	<option value="br" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'br' ? 'selected="selected"' : ''; ?>>Brazil</option>
				        	<option value="io" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'io' ? 'selected="selected"' : ''; ?>>British Indian Ocean Territory</option>
				        	<option value="bn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bn' ? 'selected="selected"' : ''; ?>>Brunei Darussalam</option>
				        	<option value="bg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bg' ? 'selected="selected"' : ''; ?>>Bulgaria</option>
				        	<option value="bf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bf' ? 'selected="selected"' : ''; ?>>Burkina Faso</option>
				        	<option value="bi" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'bi' ? 'selected="selected"' : ''; ?>>Burundi</option>
				        	<option value="kh" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kh' ? 'selected="selected"' : ''; ?>>Cambodia</option>
				        	<option value="cm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cm' ? 'selected="selected"' : ''; ?>>Cameroon</option>
				        	<option value="ca" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ca' ? 'selected="selected"' : ''; ?>>Canada</option>
				        	<option value="cv" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cv' ? 'selected="selected"' : ''; ?>>Cape Verde</option>
				        	<option value="ct" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ct' ? 'selected="selected"' : ''; ?>>Catalonia</option>
				        	<option value="ky" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ky' ? 'selected="selected"' : ''; ?>>Cayman Islands</option>
				        	<option value="cf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cf' ? 'selected="selected"' : ''; ?>>Central African Republic</option>
				        	<option value="td" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'td' ? 'selected="selected"' : ''; ?>>Chad</option>
				        	<option value="cl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cl' ? 'selected="selected"' : ''; ?>>Chile</option>
				        	<option value="cn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cn' ? 'selected="selected"' : ''; ?>>China</option>
				        	<option value="cx" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cx' ? 'selected="selected"' : ''; ?>>Christmas Island</option>
				        	<option value="cc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cc' ? 'selected="selected"' : ''; ?>>Cocos (Keeling) Islands</option>
				        	<option value="co" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'co' ? 'selected="selected"' : ''; ?>>Colombia</option>
				        	<option value="km" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'km' ? 'selected="selected"' : ''; ?>>Comoros</option>
				        	<option value="cg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cg' ? 'selected="selected"' : ''; ?>>Congo</option>
				        	<option value="cd" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cd' ? 'selected="selected"' : ''; ?>>Congo DR</option>
				        	<option value="ck" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ck' ? 'selected="selected"' : ''; ?>>Cook Islands</option>
				        	<option value="cr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cr' ? 'selected="selected"' : ''; ?>>Costa Rica</option>
				        	<option value="hr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'hr' ? 'selected="selected"' : ''; ?>>Croatia</option>
				        	<option value="cu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cu' ? 'selected="selected"' : ''; ?>>Cuba</option>
				        	<option value="cy" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cy' ? 'selected="selected"' : ''; ?>>Cyprus</option>
				        	<option value="cz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'cz' ? 'selected="selected"' : ''; ?>>Czech Republic</option>
				        	<option value="dk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'dk' ? 'selected="selected"' : ''; ?>>Denmark</option>
				        	<option value="dj" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'dj' ? 'selected="selected"' : ''; ?>>Djibouti</option>
				        	<option value="dm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'dm' ? 'selected="selected"' : ''; ?>>Dominica</option>
				        	<option value="do" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'do' ? 'selected="selected"' : ''; ?>>Dominican Republic</option>
				        	<option value="ec" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ec' ? 'selected="selected"' : ''; ?>>Ecuador</option>
				        	<option value="eg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'eg' ? 'selected="selected"' : ''; ?>>Egypt</option>
				        	<option value="sv" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sv' ? 'selected="selected"' : ''; ?>>El Salvador</option>
				        	<option value="en" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'en' ? 'selected="selected"' : ''; ?>>England</option>
				        	<option value="gq" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gq' ? 'selected="selected"' : ''; ?>>Equatorial Guinea</option>
				        	<option value="er" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'er' ? 'selected="selected"' : ''; ?>>Eritrea</option>
				        	<option value="ee" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ee' ? 'selected="selected"' : ''; ?>>Estonia</option>
				        	<option value="et" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'et' ? 'selected="selected"' : ''; ?>>Ethiopia</option>
				        	<option value="fk">Falkland Islands</option>
				        	<option value="fo" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'fo' ? 'selected="selected"' : ''; ?>>Faroe Islands</option>
				        	<option value="fj" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'fj' ? 'selected="selected"' : ''; ?>>Fiji</option>
				        	<option value="fi" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'fi' ? 'selected="selected"' : ''; ?>>Finland</option>
				        	<option value="fr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'fr' ? 'selected="selected"' : ''; ?>>France</option>
				        	<option value="gf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gf' ? 'selected="selected"' : ''; ?>>French Guiana</option>
				        	<option value="pf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pf' ? 'selected="selected"' : ''; ?>>French Polynesia</option>
				        	<option value="tf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tf' ? 'selected="selected"' : ''; ?>>French Southern Territories</option>
				        	<option value="ga" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ga' ? 'selected="selected"' : ''; ?>>Gabon</option>
				        	<option value="gm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gm' ? 'selected="selected"' : ''; ?>>Gambia</option>
				        	<option value="ge" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ge' ? 'selected="selected"' : ''; ?>>Georgia</option>
				        	<option value="de" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'de' ? 'selected="selected"' : ''; ?>>Germany</option>
				        	<option value="gh" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gh' ? 'selected="selected"' : ''; ?>>Ghana</option>
				        	<option value="gi" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gi' ? 'selected="selected"' : ''; ?>>Gibraltar</option>
				        	<option value="gr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gr' ? 'selected="selected"' : ''; ?>>Greece</option>
				        	<option value="gl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gl' ? 'selected="selected"' : ''; ?>>Greenland</option>
				        	<option value="gd" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gd' ? 'selected="selected"' : ''; ?>>Grenada</option>
				        	<option value="gp" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gp' ? 'selected="selected"' : ''; ?>>Guadeloupe</option>
				        	<option value="gu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gu' ? 'selected="selected"' : ''; ?>>Guam</option>
				        	<option value="gt" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gt' ? 'selected="selected"' : ''; ?>>Guatemala</option>
				        	<option value="gg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gg' ? 'selected="selected"' : ''; ?>>Guernsey</option>
				        	<option value="gn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gn' ? 'selected="selected"' : ''; ?>>Guinea</option>
				        	<option value="gw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gw' ? 'selected="selected"' : ''; ?>>Guinea-Bissau</option>
				        	<option value="gy" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gy' ? 'selected="selected"' : ''; ?>>Guyana</option>
				        	<option value="ht" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ht' ? 'selected="selected"' : ''; ?>>Haiti</option>
				        	<option value="hm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'hm' ? 'selected="selected"' : ''; ?>>Heard Island and McDonald Islands</option>
				        	<option value="va" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'va' ? 'selected="selected"' : ''; ?>>Holy See (Vatican City State)</option>
				        	<option value="hn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'hn' ? 'selected="selected"' : ''; ?>>Honduras</option>
				        	<option value="hk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'hk' ? 'selected="selected"' : ''; ?>>Hong Kong</option>
				        	<option value="hu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'hu' ? 'selected="selected"' : ''; ?>>Hungary</option>
				        	<option value="is" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'is' ? 'selected="selected"' : ''; ?>>Iceland</option>
				        	<option value="in" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'in' ? 'selected="selected"' : ''; ?>>India</option>
				        	<option value="id" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'id' ? 'selected="selected"' : ''; ?>>Indonesia</option>
				        	<option value="ir" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ir' ? 'selected="selected"' : ''; ?>>Iran</option>
				        	<option value="iq" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'iq' ? 'selected="selected"' : ''; ?>>Iraq</option>
				        	<option value="ie" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ie' ? 'selected="selected"' : ''; ?>>Ireland</option>
				        	<option value="im" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'im' ? 'selected="selected"' : ''; ?>>Isle of Man</option>
				        	<option value="il" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'il' ? 'selected="selected"' : ''; ?>>Israel</option>
				        	<option value="it" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'it' ? 'selected="selected"' : ''; ?>>Italy</option>
				        	<option value="ci" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ci' ? 'selected="selected"' : ''; ?>>Ivory Coast</option>
				        	<option value="jm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'jm' ? 'selected="selected"' : ''; ?>>Jamaica</option>
				        	<option value="jp" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'jp' ? 'selected="selected"' : ''; ?>>Japan</option>
				        	<option value="je" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'je' ? 'selected="selected"' : ''; ?>>Jersey</option>
				        	<option value="jo" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'jo' ? 'selected="selected"' : ''; ?>>Jordan</option>
				        	<option value="kz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kz' ? 'selected="selected"' : ''; ?>>Kazakhstan</option>
				        	<option value="ke" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ke' ? 'selected="selected"' : ''; ?>>Kenya</option>
				        	<option value="ki" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ki' ? 'selected="selected"' : ''; ?>>Kiribati</option>
				        	<option value="ks" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ks' ? 'selected="selected"' : ''; ?>>Kosovo</option>
				        	<option value="kw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kw' ? 'selected="selected"' : ''; ?>>Kuwait</option>
				        	<option value="kg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kg' ? 'selected="selected"' : ''; ?>>Kyrgyzstan</option>
				        	<option value="la" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'la' ? 'selected="selected"' : ''; ?>>Laos</option>
				        	<option value="lv" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lv' ? 'selected="selected"' : ''; ?>>Latvia</option>
				        	<option value="lb" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lb' ? 'selected="selected"' : ''; ?>>Lebanon</option>
				        	<option value="ls" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ls' ? 'selected="selected"' : ''; ?>>Lesotho</option>
				        	<option value="lr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lr' ? 'selected="selected"' : ''; ?>>Liberia</option>
				        	<option value="ly" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ly' ? 'selected="selected"' : ''; ?>>Libya</option>
				        	<option value="li" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'li' ? 'selected="selected"' : ''; ?>>Liechtenstein</option>
				        	<option value="lt" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lt' ? 'selected="selected"' : ''; ?>>Lithuania</option>
				        	<option value="lu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lu' ? 'selected="selected"' : ''; ?>>Luxembourg</option>
				        	<option value="mo" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mo' ? 'selected="selected"' : ''; ?>>Macao</option>
				        	<option value="mk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mk' ? 'selected="selected"' : ''; ?>>Macedonia</option>
				        	<option value="mg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mg' ? 'selected="selected"' : ''; ?>>Madagascar</option>
				        	<option value="mw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mw' ? 'selected="selected"' : ''; ?>>Malawi</option>
				        	<option value="my" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'my' ? 'selected="selected"' : ''; ?>>Malaysia</option>
				        	<option value="mv" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mv' ? 'selected="selected"' : ''; ?>>Maldives</option>
				        	<option value="ml" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ml' ? 'selected="selected"' : ''; ?>>Mali</option>
				        	<option value="mt" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mt' ? 'selected="selected"' : ''; ?>>Malta</option>
				        	<option value="mh" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mh' ? 'selected="selected"' : ''; ?>>Marshall Islands</option>
				        	<option value="mq" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mq' ? 'selected="selected"' : ''; ?>>Martinique</option>
				        	<option value="mr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mr' ? 'selected="selected"' : ''; ?>>Mauritania</option>
				        	<option value="mu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mu' ? 'selected="selected"' : ''; ?>>Mauritius</option>
				        	<option value="yt" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'yt' ? 'selected="selected"' : ''; ?>>Mayotte</option>
				        	<option value="mx" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mx' ? 'selected="selected"' : ''; ?>>Mexico</option>
				        	<option value="fm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'fm' ? 'selected="selected"' : ''; ?>>Micronesia, Federal States of</option>
				        	<option value="md" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'md' ? 'selected="selected"' : ''; ?>>Moldova, Republic of</option>
				        	<option value="mc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mc' ? 'selected="selected"' : ''; ?>>Monaco</option>
				        	<option value="mn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mn' ? 'selected="selected"' : ''; ?>>Mongolia</option>
				        	<option value="ms" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ms' ? 'selected="selected"' : ''; ?>>Monserrat</option>
				        	<option value="me" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'me' ? 'selected="selected"' : ''; ?>>Montenegro</option>
				        	<option value="ma" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ma' ? 'selected="selected"' : ''; ?>>Morocco</option>
				        	<option value="mz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mz' ? 'selected="selected"' : ''; ?>>Mozambique</option>
				        	<option value="mm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mm' ? 'selected="selected"' : ''; ?>>Myanmar</option>
				        	<option value="na" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'na' ? 'selected="selected"' : ''; ?>>Namibia</option>
				        	<option value="nr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nr' ? 'selected="selected"' : ''; ?>>Nauru</option>
				        	<option value="np" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'np' ? 'selected="selected"' : ''; ?>>Nepal</option>
				        	<option value="nl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nl' ? 'selected="selected"' : ''; ?>>Netherlands</option>
				        	<option value="nc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nc' ? 'selected="selected"' : ''; ?>>New Caledonia</option>
				        	<option value="nz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nz' ? 'selected="selected"' : ''; ?>>New Zealand</option>
				        	<option value="ni" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ni' ? 'selected="selected"' : ''; ?>>Nicaragua</option>
				        	<option value="ne" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ne' ? 'selected="selected"' : ''; ?>>Niger</option>
				        	<option value="ng" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ng' ? 'selected="selected"' : ''; ?>>Nigeria</option>
				        	<option value="nu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nu' ? 'selected="selected"' : ''; ?>>Niue</option>
				        	<option value="nf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nf' ? 'selected="selected"' : ''; ?>>Norfolk Island</option>
				        	<option value="kp" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kp' ? 'selected="selected"' : ''; ?>>North Korea</option>
				        	<option value="nd" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'nd' ? 'selected="selected"' : ''; ?>>Northern Ireland</option>
				        	<option value="mp" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'mp' ? 'selected="selected"' : ''; ?>>Northern Mariana Islands</option>
				        	<option value="no" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'no' ? 'selected="selected"' : ''; ?>>Norway</option>
				        	<option value="om" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'om' ? 'selected="selected"' : ''; ?>>Oman</option>
				        	<option value="pk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pk' ? 'selected="selected"' : ''; ?>>Pakistan</option>
				        	<option value="pw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pw' ? 'selected="selected"' : ''; ?>>Palau</option>
				        	<option value="ps" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ps' ? 'selected="selected"' : ''; ?>>Palestine, State of</option>
				        	<option value="pa" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pa' ? 'selected="selected"' : ''; ?>>Panama</option>
				        	<option value="pg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pg' ? 'selected="selected"' : ''; ?>>Papua New Guinea</option>
				        	<option value="py" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'py' ? 'selected="selected"' : ''; ?>>Paraguay</option>
				        	<option value="pe" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pe' ? 'selected="selected"' : ''; ?>>Peru</option>
				        	<option value="ph" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ph' ? 'selected="selected"' : ''; ?>>Philippines</option>
				        	<option value="pn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pn' ? 'selected="selected"' : ''; ?>>Pitcairn</option>
				        	<option value="pl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pl' ? 'selected="selected"' : ''; ?>>Poland</option>
				        	<option value="pt" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pt' ? 'selected="selected"' : ''; ?>>Portugal</option>
				        	<option value="pr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pr' ? 'selected="selected"' : ''; ?>>Puerto Rico</option>
				        	<option value="qa" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'qa' ? 'selected="selected"' : ''; ?>>Qatar</option>
				        	<option value="re" <?php echo esc_attr( get_option('wpcm_default_country') ) == 're' ? 'selected="selected"' : ''; ?>>Reunion</option>
				        	<option value="ro" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ro' ? 'selected="selected"' : ''; ?>>Romania</option>
				        	<option value="ru" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ru' ? 'selected="selected"' : ''; ?>>Russian Federation</option>
				        	<option value="rw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'rw' ? 'selected="selected"' : ''; ?>>Rwanda</option>
				        	<option value="st" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'st' ? 'selected="selected"' : ''; ?>>São Tomé and Príncipe</option>
				        	<option value="sh" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sh' ? 'selected="selected"' : ''; ?>>Saint Helena</option>
				        	<option value="kn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kn' ? 'selected="selected"' : ''; ?>>Saint Kitts and Nevis</option>
				        	<option value="lc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lc' ? 'selected="selected"' : ''; ?>>Saint Lucia</option>
				        	<option value="pm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'pm' ? 'selected="selected"' : ''; ?>>Saint Pierre &amp; Miquelon</option>
				        	<option value="vc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'vc' ? 'selected="selected"' : ''; ?>>Saint Vincent and the Grenadines</option>
				        	<option value="ws" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ws' ? 'selected="selected"' : ''; ?>>Samoa</option>
				        	<option value="sm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sm' ? 'selected="selected"' : ''; ?>>San Marino</option>
				        	<option value="sa" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sa' ? 'selected="selected"' : ''; ?>>Saudi Arabia</option>
				        	<option value="sf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sf' ? 'selected="selected"' : ''; ?>>Scotland</option>
				        	<option value="sn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sn' ? 'selected="selected"' : ''; ?>>Senegal</option>
				        	<option value="rs" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'rs' ? 'selected="selected"' : ''; ?>>Serbia</option>
				        	<option value="sc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sc' ? 'selected="selected"' : ''; ?>>Seychelles</option>
				        	<option value="sl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sl' ? 'selected="selected"' : ''; ?>>Sierre Leone</option>
				        	<option value="sg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sg' ? 'selected="selected"' : ''; ?>>Singapore</option>
				        	<option value="sk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sk' ? 'selected="selected"' : ''; ?>>Slovakia</option>
				        	<option value="si" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'si' ? 'selected="selected"' : ''; ?>>Slovenia</option>
				        	<option value="sb" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sb' ? 'selected="selected"' : ''; ?>>Solomon Islands</option>
				        	<option value="so" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'so' ? 'selected="selected"' : ''; ?>>Somalia</option>
				        	<option value="za" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'za' ? 'selected="selected"' : ''; ?>>South Africa</option>
				        	<option value="gs" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gs' ? 'selected="selected"' : ''; ?>>South Georgia / Sandwich Islands</option>
				        	<option value="kr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'kr' ? 'selected="selected"' : ''; ?>>South Korea</option>
				        	<option value="es" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'es' ? 'selected="selected"' : ''; ?>>Spain</option>
				        	<option value="lk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'lk' ? 'selected="selected"' : ''; ?>>Sri Lanka</option>
				        	<option value="sd" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sd' ? 'selected="selected"' : ''; ?>>Sudan</option>
				        	<option value="sr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sr' ? 'selected="selected"' : ''; ?>>Suriname</option>
				        	<option value="sj" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sj' ? 'selected="selected"' : ''; ?>>Svalbard and Jan Mayen</option>
				        	<option value="sz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sz' ? 'selected="selected"' : ''; ?>>Swaziland</option>
				        	<option value="se" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'se' ? 'selected="selected"' : ''; ?>>Sweden</option>
				        	<option value="ch" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ch' ? 'selected="selected"' : ''; ?>>Switzerland</option>
				        	<option value="sy" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'sy' ? 'selected="selected"' : ''; ?>>Syrian Arab Republic</option>
				        	<option value="tw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tw' ? 'selected="selected"' : ''; ?>>Taiwan, Province of China</option>
				        	<option value="tj" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tj' ? 'selected="selected"' : ''; ?>>Tajikstan</option>
				        	<option value="tz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tz' ? 'selected="selected"' : ''; ?>>Tanzania, United Republic of</option>
				        	<option value="th" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'th' ? 'selected="selected"' : ''; ?>>Thailand</option>
				        	<option value="tl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tl' ? 'selected="selected"' : ''; ?>>Timor-Leste</option>
				        	<option value="tg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tg' ? 'selected="selected"' : ''; ?>>Togo</option>
				        	<option value="tk" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tk' ? 'selected="selected"' : ''; ?>>Tokelau</option>
				        	<option value="to" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'to' ? 'selected="selected"' : ''; ?>>Tonga</option>
				        	<option value="tt">Trinidad and Tobago</option>
				        	<option value="tn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tn' ? 'selected="selected"' : ''; ?>>Tunisia</option>
				        	<option value="tr" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tr' ? 'selected="selected"' : ''; ?>>Turkey</option>
				        	<option value="tm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tm' ? 'selected="selected"' : ''; ?>>Turkmenistan</option>
				        	<option value="tc" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tc' ? 'selected="selected"' : ''; ?>>Turks and Caicos Islands</option>
				        	<option value="tv" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'tv' ? 'selected="selected"' : ''; ?>>Tuvalu</option>
				        	<option value="um" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'um' ? 'selected="selected"' : ''; ?>>US Minor Outlying Islands</option>
				        	<option value="ug" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ug' ? 'selected="selected"' : ''; ?>>Uganda</option>
				        	<option value="ua" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ua' ? 'selected="selected"' : ''; ?>>Ukraine</option>
				        	<option value="ae" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ae' ? 'selected="selected"' : ''; ?>>United Arab Emirates</option>
				        	<option selected="selected" value="gb" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'gb' ? 'selected="selected"' : ''; ?>>United Kingdom (UK)</option>
				        	<option value="us" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'us' ? 'selected="selected"' : ''; ?>>United States (US)</option>
				        	<option value="uy" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'uy' ? 'selected="selected"' : ''; ?>>Uruguay</option>
				        	<option value="uz" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'uz' ? 'selected="selected"' : ''; ?>>Uzbekistan</option>
				        	<option value="vu" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'vu' ? 'selected="selected"' : ''; ?>>Vanuata</option>
				        	<option value="ve" <?php echo esc_attr( get_option('wpcm_default_country') ) == 've' ? 'selected="selected"' : ''; ?>>Venezuala</option>
				        	<option value="vn" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'vn' ? 'selected="selected"' : ''; ?>>Vietnam</option>
				        	<option value="vg" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'vg' ? 'selected="selected"' : ''; ?>>Virgin Islands, British</option>
				        	<option value="vi" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'vi' ? 'selected="selected"' : ''; ?>>Virgin Islands, U.S.</option>
				        	<option value="wl" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'wl' ? 'selected="selected"' : ''; ?>>Wales</option>
				        	<option value="wf" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'wf' ? 'selected="selected"' : ''; ?>>Wallis and Futuna</option>
				        	<option value="eh" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'eh' ? 'selected="selected"' : ''; ?>>Western Sahara</option>
				        	<option value="ye" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'ye' ? 'selected="selected"' : ''; ?>>Yemen</option>
				        	<option value="an" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'an' ? 'selected="selected"' : ''; ?>>Yugoslavia</option>
				        	<option value="zm" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'zm' ? 'selected="selected"' : ''; ?>>Zambia</option>
				        	<option value="zw" <?php echo esc_attr( get_option('wpcm_default_country') ) == 'zw' ? 'selected="selected"' : ''; ?>>Zimbabwe</option>
				        	    </select>      
		        
		    </td>
		        
		    </tr>
		    
		    
            
            <tr>
                <th>Website Package <span id="slogannote"><a href="mailto:support@teamwebsites.co.uk?subject=Upgrade Website Package: <?php echo site_url(''); ?>&body=Hi, I wish to upgrade the website package of <?php echo site_url(); ?>. [Please also leave your phone number so we can contact you ASAP]">(upgrade)</a></span></th>
                <td><input type="text" placeholder="Website Package" name="siteurl" value="<?php if ( is_multisite() ) { echo 'Free'; } else { echo 'Paid'; } ?>" size="50" readonly/></td>
            </tr>
            
            
            <tr>
                <th>Are you a youth/junior club? <span id="slogannote">(this includes having a mixture of adult and junior/youth teams - tick if so)</span></th>
                <td><?php 
    $post_meta = get_option('term', true);
    if (!empty($post_meta)) {
?>
        <div class="pre_box">Term: </div>
        <div class="entry"><?php echo $post_meta; ?></div>
<?php
    }
?>

                    <?php $checkbox = get_theme_mod('isyouthclub');
                    if ( isset( $checkbox ) ) { ?>
                    <label>
                    <input type="checkbox" id="isyouthclub" value="" name="isyouthclub" <?php $youthclubq = get_option('isyouthclub');
                    if ( isset( $youthclubq ) ) { ?> checked="checked" <?php } ?> /> Tick for yes
                    <?php } ?>
                    </label>
                </td>
            </tr>
            
            <?php if ( is_multisite() ) : ?>
            
            <?php if ( current_user_can( 'setup_network' ) ) { ?>
            
            <tr>
                <th>Verify Site? <span id="slogannote">(displays tick of verification)</span></th>
                <td>
                    <label>
                        <input type="checkbox" value="1" name="site-isverified" <?php checked( '1', get_theme_mod( 'site-isverified' ) ); ?> />
                        
                        
 Tick for yes
                    </label>
                </td>
            </tr>
            
            <?php } ?>
            
            <?php else: ?>
            
            <tr>
                <th>Verify Site? <span id="slogannote">(displays tick of verification)</span></th>
                <td>
                    <label> Tick for yes
                    </label>
                </td>
            </tr>
            
            <?php endif; ?>
 
            <tr>
                <td><?php submit_button(); ?></td>
            </tr>
 
        </table>
 
      </form>
    </div>
  <?php
}
 
// That's it, have fun !!




add_action( 'admin_init', 'wpse_136058_remove_menu_pages' );

function wpse_136058_remove_menu_pages() {

    remove_menu_page( 'index.php?page=wpcm-about' );
    remove_menu_page( 'wpcm-about' );
}


// remove the unwanted <meta> links
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'woo_version'); 


function loadTemplate( $template_name ){
    $plugin_path = plugin_dir_path(__FILE__);
    $original_template = content_url('/') . "plugins/wp-club-manager/templates/shortcodes/matches-2.php";

    $theme_path = get_template_directory();
    $override_template = $theme_path . "/wpclubmanager/shortcodes/matches-2.php";

    if(file_exists($override_template)){
         include( $override_template );
    }
    else{
         include( $original_template );
    }
}


update_option( 'wpcm_disable_cache', 'yes' );
update_option( 'wpclubmanager_club_slug', 'clubs' );
update_option( 'permalink_structure', '/%postname%/' );
update_option( 'wpcm_google_map_api', 'AIzaSyCga6ihQ2h9ElfdjfLne-C7zWkfiW0ZVpA' );


// Add inline CSS in the admin head with the style tag
function my_custom_admin_head() {
	echo '<head><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>';
}
add_action( 'admin_head', 'my_custom_admin_head' );


add_filter( 'wc_product_sku_enabled', '__return_false' );


    add_filter( 'woocommerce_product_tabs', 'wpb_remove_product_tabs', 98 );
    function wpb_remove_product_tabs( $tabs ) {
        global $product;
        
        if ( $product->is_type('wsspg_subscription') ) {
            unset( $tabs['description'] );             // Remove the description tab
            unset( $tabs['reviews'] );                 // Remove the reviews tab
            unset( $tabs['additional_information'] );  // Remove the additional information tab
            unset( $tabs['test_tab'] );                // Remove the discount tab
            
        }
        
        return $tabs;
        
    }

  


add_action( 'admin_head', 'wpse_59652_list_terms_exclusions' );

function wpse_59652_list_terms_exclusions() 
{
    global $current_screen;

    if( 'product' != $current_screen->post_type )
        return;
        echo "<style>@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i');</style>";
        echo "<style>body {font-family: 'Montserrat', sans-serif;}</style>";
    echo '<style>.product_data_tabs a {
    padding: 7px 7px !important;
    font-size: 90%;
    font-weight: 600;
    font-family: inherit;
}</style>';
}

/**
 * Adds a box to the main column on the Post add/edit screens.
 */
function wdm_add_meta_box() {

        add_meta_box(
                'wdm_sectionid', 'Radio Buttons Meta Box', 'wdm_meta_box_callback', 'wpcm_player', 'side', 'high'
        ); //you can change the 4th paramter i.e. post to custom post type name, if you want it for something else

}

add_action( 'add_meta_boxes', 'wdm_add_meta_box' );

function wps_translation_mangler($translation, $text, $domain) {
        global $post;
    if ($post->post_type == 'event') {
        $translations = &get_translations_for_domain( $domain);
        if ( $text == 'Scheduled for: <b>%1$s</b>') {
            return $translations->translate( 'Event Date: <b>%1$s</b>' );
        }
        if ( $text == 'Published on: <b>%1$s</b>') {
            return $translations->translate( 'Event Date: <b>%1$s</b>' );
        }
        if ( $text == 'Publish <b>immediately</b>') {
            return $translations->translate( 'Event Date: <b>%1$s</b>' );
        }
    }
    return $translation;
}
add_filter('gettext', 'wps_translation_mangler', 10, 4);



/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function wdm_meta_box_callback( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'wdm_meta_box', 'wdm_meta_box_nonce' );

        /*
         * Use get_post_meta() to retrieve an existing value
         * from the database and use the value for the form.
         */
        $value = get_post_meta( $post->ID, 'my_key', true ); //my_key is a meta_key. Change it to whatever you want

        ?>
        
<script>$('#radios').radiosToSlider({
    animation: true,
});</script>
        
       
        <label for="wdm_new_field"><?php _e( "Choose value:", 'choose_value' ); ?></label>
        <br />  
         <div class="switch">
        
        <input type="radio" name="the_name_of_the_radio_buttons" class="switch-input week" id="hidden" value="value1" <?php checked( $value, 'value1' ); ?> >
        <label class="switch-label switch-label-off onswitch" for="the_name_of_the_radio_buttons" class="switch-label switch-label-off onswitch">Hide</label>
        
        <input class="switch-input" type="radio" name="the_name_of_the_radio_buttons" id="month" value="value2" <?php checked( $value, 'value2' ); ?> >
        <label for="the_name_of_the_radio_buttons" class="switch-label switch-label-on offswitch">Public</label>
        <span class="switch-selection"></span>
        
        </div>
        
        <style>
    
    .week:checked + label {font-weight: normal !important; background: #a2a2a2 !important; color: #eee !important;} #month:checked + label {color: #eee !important; font-weight: normal !important; background: #24ab41 !important;}
    
    .switch-input:checked:before {margin: 0px; display: none !important;}
    
    .switch .onswitch {left: 0px; top: 1px;}
    
    .switch input {height: 100%;}
    
    .switch .offswitch {right: 0px !important; top: 1px !important;}
    
    .switch label {width: 50% !important; position: absolute; float: left; clear: none; padding: 0px !important; margin: 0px !important;}
    
    .switch {margin: 9px 0px !important; position: relative;}
    
    .switch-input{margin: 0px !important; padding: 0px !important; border:none !important; z-index: 11; position: relative; background: transparent !important; box-shadow: none !important; float: left; width: 50% !important;}
    
    .switch {
  position: relative;
  height: 26px;
  width: 120px;
  margin: 20px auto;
  background: rgba(0, 0, 0, 0.25);
  border-radius: 3px;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
}

.switch-label {
  position: relative;
  z-index: 2;
  float: left;
  width: 58px;
  line-height: 26px;
  font-size: 11px;
  color: rgba(255, 255, 255, 0.35);
  text-align: center;
  cursor: pointer;
}
.switch-label:active {
  font-weight: bold;
}

.switch-label-off {
  padding-left: 2px;
}

.switch-label-on {
  padding-right: 2px;
}


.switch-input {
  display: none;
}
.switch-input:checked + .switch-label {
  font-weight: bold;
  color: rgba(0, 0, 0, 0.65);
  text-shadow: 0 1px rgba(255, 255, 255, 0.25);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -ms-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: color, text-shadow;
  -moz-transition-property: color, text-shadow;
  -ms-transition-property: color, text-shadow;
  -o-transition-property: color, text-shadow;
  transition-property: color, text-shadow;
}
.switch-input:checked + .switch-label-on ~ .switch-selection {
  left: 60px;
  /* Note: left: 50%; doesn't transition in WebKit */
}

.switch-selection {
  position: absolute;
  z-index: 1;
  top: 2px;
  left: 2px;
  display: block;
  width: 58px;
  height: 22px;
  border-radius: 3px;
  background-color: #24ab41;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #9dd993), color-stop(100%, #65bd63));
  background-image: -webkit-linear-gradient(top, #9dd993, #65bd63);
  background-image: -moz-linear-gradient(top, #9dd993, #65bd63);
  background-image: -ms-linear-gradient(top, #9dd993, #65bd63);
  background-image: -o-linear-gradient(top, #9dd993, #65bd63);
  background-image: linear-gradient(top, #9dd993, #65bd63);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -ms-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-blue .switch-selection {
  background-color: #3aa2d0;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #4fc9ee), color-stop(100%, #3aa2d0));
  background-image: -webkit-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -moz-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -ms-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -o-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: linear-gradient(top, #4fc9ee, #3aa2d0);
}</style>
        
        <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function wdm_save_meta_box_data( $post_id ) {

        /*
         * We need to verify this came from our screen and with proper authorization,
         * because the save_post action can be triggered at other times.
         */

        // Check if our nonce is set.
        if ( !isset( $_POST['wdm_meta_box_nonce'] ) ) {
                return;
        }

        // Verify that the nonce is valid.
        if ( !wp_verify_nonce( $_POST['wdm_meta_box_nonce'], 'wdm_meta_box' ) ) {
                return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
        }

        // Check the user's permissions.
        if ( !current_user_can( 'edit_post', $post_id ) ) {
                return;
        }

// Checks for input and saves if needed
if( isset( $_POST[ 'the_name_of_the_radio_buttons' ] ) ) {
update_post_meta( $post_id, 'meta-radio', $_POST[ 'the_name_of_the_radio_buttons' ] );
}
        // Sanitize user input.
        $new_meta_value = ( isset( $_POST['the_name_of_the_radio_buttons'] ) ? sanitize_html_class( $_POST['the_name_of_the_radio_buttons'] ) : '' );

        // Update the meta field in the database.
        update_post_meta( $post_id, 'my_key', $new_meta_value );
        
        

}

add_action( 'save_post', 'wdm_save_meta_box_data' );

function my_theme_add_editor_styles() {
    add_editor_style( 'tinymce_custom_editor.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '
<ul style="display: none !important;" itemscope itemtype="https://schema.org/BreadcrumbList" id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home" itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem"><a itemscope itemtype="https://schema.org/Thing"
       itemprop="item" class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '"> <span itemprop="name">' . $home_title . '</span> </a> <meta itemprop="position" content="1" /> </li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-archive"><strong class="bread-current bread-archive"> <span itemprop="name">' . post_type_archive_title($prefix, false) . ' </span> </strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-cat item-custom-post-type-' . $post_type . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '"><span itemprop="name">' . $post_type_object->labels->name . '</span></a></li>';
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-archive"><strong class="bread-current bread-archive"><span itemprop="name">' . $custom_tax_name . '</span></strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-cat item-custom-post-type-' . $post_type . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '"><span itemprop="name">' . $post_type_object->labels->name . '</span></a></li>';
                echo '<li> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-cat"><span itemprop="name">'.$parents.'</span></li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '"><span itemprop="name">' . $cat_name . '</span></a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></strong></li>';
              
            } else {
                  
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-cat"><strong class="bread-current bread-cat"><span itemprop="name">' . single_cat_title('', false) . '</span></strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-parent item-parent-' . $ancestor . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"><span itemprop="name">' . get_the_title($ancestor) . '</span></a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> <span itemprop="name"> ' . get_the_title() . '</span></strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> <span itemprop="name"> ' . get_the_title() . ' </span> </strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '"><span itemprop="name">' . $get_term_name . '</span></strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-year item-year-' . get_the_time('Y') . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"><span itemprop="name">' . get_the_time('Y') . ' Archives</span></a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-month item-month-' . get_the_time('m') . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '"><span itemprop="name">' . get_the_time('M') . ' Archives</span></a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"><span itemprop="name"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-year item-year-' . get_the_time('Y') . '"><a itemscope itemtype="http://schema.org/Thing"
       itemprop="item" class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"><span itemprop="name">' . get_the_time('Y') . ' Archives</span></a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '"><span itemprop="name">' . get_the_time('M') . ' Archives</span></strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '"><span itemprop="name">' . get_the_time('Y') . ' Archives</span></strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '"><span itemprop="name">' . 'Author: ' . $userdata->display_name . '</span></strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '"><span itemprop="name">'.__('Page') . ' ' . get_query_var('paged') . '</span></strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '"><span itemprop="name">Search results for: ' . get_search_query() . '</span></strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem">' . '<span itemprop="name">Error 404</span>' . '</li>';
        }
       
        echo '</ul>
        ';
           
    }
       
}




add_action('save_post', 'change_content');
    global $post;
    global $wpdb;
    function change_content($post_id) {
	$datefield = get_post_meta($post_id,'pbd-event-date',true);
	$post_date = date("m-d-Y H:i:s", strtotime($datefield));
	$my_post = array();
	$my_post['ID'] = $post_id;
	$my_post['post_date'] = $post_date;
	
	remove_action('save_post', 'change_content');
        wp_update_post( $my_post );
	add_action('save_post', 'change_content');
}

function setup_future_hook() {
// Replace native future_post function with replacement
    remove_action('future_event','_future_post_hook');
    add_action('future_event','publish_future_post_now');
}

function publish_future_post_now($id) {
// Set new post's post_status to "publish" rather than "future."
    wp_publish_post($id);
}

add_action('init', 'setup_future_hook');



/**
 * Register meta box
 *
 * Adds a metabox to Event post types, allowing users to easily enter the date of an event.
 */
function pbd_events_meta_box() {
	add_meta_box('pbd-events-meta-box', 'Event Details', 'pbd_events_create_meta_box', 'eventv1', 'normal', 'high');
}
add_action('add_meta_boxes', 'pbd_events_meta_box');

/**
 * Creates the HTML for the meta box.
 */
function pbd_events_create_meta_box($post) {
	// Get already-entered date.
	$date = get_post_meta($post->ID, 'Date', true);
 
	// Nonce for verification.
	wp_nonce_field( plugin_basename(__FILE__), 'pbd_events_nonce');
	?>
	
<p><strong>Date</strong></p>
 
(mm/dd/yy)
<input id="pbd-event-date" name="pbd-event-date" type="text" value="<?php echo $date; ?>" />
 
<?php }

/**
 * Saves the meta box value when the post is saved.
 */
function pbd_events_save_meta_box($post_id) {
 
	// Verification check.
	if ( !wp_verify_nonce( $_POST['pbd_events_nonce'], plugin_basename(__FILE__) ) )
	      return;
 
	// And they're of the right level?
	if(!current_user_can('edit_posts') )
		return;
 
	// Has the field been used?
	$date = trim( $_POST['pbd-event-date'] );
	if( empty($date) )
		return;
 
	// Validate that what was entered is of the form: 00/00/00
	if(preg_match('(^\d{1,2}\/\d{1,2}\/\d{2}$)', $date) ) {
		update_post_meta($post_id, 'Date', $date);
	}
}
add_action('save_post', 'pbd_events_save_meta_box');


/**
 * Adds a jQuery datepicker script to Event pages.
 * http://jqueryui.com/demos/datepicker/
 */
function pbd_events_jquery_datepicker() {
	wp_enqueue_script(
		'jquery-ui-datepicker',
		get_bloginfo('template_directory') . '/jquery-ui-datepicker/jquery-ui-1.8.11.custom.min.js',
		array('jquery')
	);
 
	wp_enqueue_script(
		'pbd-datepicker',
		get_bloginfo('template_directory') . '/jquery-ui-datepicker/pbd-datepicker.js',
		array('jquery', 'jquery-ui-datepicker')
	);
}
add_action('admin_print_scripts-post-new.php', 'pbd_events_jquery_datepicker');
add_action('admin_print_scripts-post.php', 'pbd_events_jquery_datepicker');

/**
 * Adds CSS for the jQuery datepicker script to Event pages.
 * http://jqueryui.com/demos/datepicker/
 */
function pbd_events_jquery_datepicker_css() {
	wp_enqueue_style(
		'jquery-ui-datepicker',
		get_bloginfo('template_directory') . '/jquery-ui-datepicker/css/smoothness/jquery-ui-1.8.11.custom.css'
	);
}
add_action('admin_print_styles-post-new.php', 'pbd_events_jquery_datepicker_css');
add_action('admin_print_styles-post.php', 'pbd_events_jquery_datepicker_css');



// Register Custom Post Type
function property_post_type() {

	$labels = array(
		'name'                  => _x( 'Club Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Club Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as event image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into page', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this event', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'A list of club events', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'map_meta_cap'        => true,
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'property_post_type', 0 );

wp_enqueue_style( 'style-name', get_stylesheet_uri() );

if ( ! is_admin() ) {
wp_register_style( 'requiredstyles', get_template_directory_uri() . '/required.css', false, '1.0.0' );
wp_enqueue_style( 'requiredstyles' );
}
else {

}

     
      wp_enqueue_script( 'stickyheader', get_template_directory_uri() . '/js/stickyheader.js', array('jquery'), '2.0.8', true );
    
    wp_enqueue_style( 'kalon-meanmenu-style', get_template_directory_uri(). '/css/meanmenu.css' );


function my_theme_add_editor_styles_admin() {
    add_editor_style( 'admin-style.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles_admin' );



function load_custom_wp_admin_stylea() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_stylea' );

add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo' );

function custom_customize_enqueue() {
  wp_enqueue_script( 'custom-customize', get_template_directory_uri() . '/js/addtocustomizer.php', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'custom_customize_enqueue' );

add_image_size( 'delicious-recent-thumbnails', 55, 55, true ); // Sets Recent Posts Thumbnails

add_image_size( 'custom-size', 70, 70, true );


/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 * 
 */
 
function wpse97413_register_custom_widgets() {
    register_widget( 'wpse97411_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'wpse97413_register_custom_widgets' ); 
 
class wpse97411_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent news on your site") );
        parent::__construct('recent-posts', __('Club News'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Club News' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
        
            <a href="<?php the_permalink() ?>" class="ln-title" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
            
            <li>
                
                 <?php
                 
                 if ( has_post_thumbnail() ) {
                 
                 the_post_thumbnail('delicious-recent-thumbnails'); 
                 
                 }
                 
                 else {
                     
                     echo '<img src="http://teamwebsites.co.uk/clubs/bermondseytownfc/wp-content/plugins/wp-club-manager/assets/images/crest-placeholder.png" width="55" height="55" id="latestnewsplaceholder">';
                     
                 }
                 
                 ?>
                
                <div class="ln-title">
                
               <div style="display: block !important;">
                  
                   <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
            <?php if ( $show_date ) : ?>
                <span class="post-date"><?php echo get_the_date(); ?></span>
            <?php endif; ?> 
                   
               </div>    
                    
                </div>
            </li>
            
            </a>
            
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of articles to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display article date?' ); ?></label></p>
<?php
    }
}



/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 * 
 */
 
function register_clubsponsors_widget() {
    register_widget( 'clubsponsorswidget' );
}
add_action( 'widgets_init', 'register_clubsponsors_widget' ); 
 
class clubsponsorswidget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_clubsponsors', 'description' => __( "Displays your club's sponsors (as uploaded under: Appearance > Template Configuration > Footer)") );
        parent::__construct('club-sponsors', __('Club Sponsors'), $widget_ops);
        $this->alt_option_name = 'widget_clubsponsors';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_club_sponsors', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Club Sponsors' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
?>
        <?php echo $before_widget; ?>
        <?php $before_title = "<h2 class='widget-title'>"; $after_title = "</h2>"; if ( $title ) echo $before_title . $title . $after_title; ?>
        
        <?php if ( get_theme_mod( 'animals_clubsponsor' ) ) : ?>   <a href="<?php echo esc_url( get_theme_mod( 'primaryclubsponsor_url' ) ); ?>"> 

			  <div class="sidebar_clubsponsor"> <img src="<?php echo esc_url( get_theme_mod( 'animals_clubsponsor' ) ); ?>" alt="Club Sponsor - <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">  </div> </a>  <?php else : ?>  <span>Advertise Here</span>   <?php endif; ?>
      
		 <?php if ( get_theme_mod( 'animals_secondaryclubsponsor' ) ) : ?>	  <a href="<?php echo esc_url( get_theme_mod( 'secondaryclubsponsor_url' ) ); ?>">   

			  <div class="sidebar_clubsponsor"> <img src="<?php echo esc_url( get_theme_mod( 'animals_secondaryclubsponsor' ) ); ?>" alt="Club Sponsor - <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">  </div> </a>  <?php else : ?>  <span>Advertise Here</span>   <?php endif; ?>

             <?php if ( get_theme_mod( 'animals_tertiaryclubsponsor' ) ) : ?>   <a href="<?php echo esc_url( get_theme_mod( 'tertiaryclubsponsor_url' ) ); ?>"> 

			  <div class="sidebar_clubsponsor"> <img src="<?php echo esc_url( get_theme_mod( 'animals_tertiaryclubsponsor' ) ); ?>" alt="Club Sponsor - <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">  </div> </a>  <?php else : ?>  <span>Advertise Here</span>   <?php endif; ?>


			  <?php if ( get_theme_mod( 'animals_additionalclubsponsor' ) ) : ?> <a href="<?php echo esc_url( get_theme_mod( 'additionalclubsponsor_url' ) ); ?>">   

			  <div class="sidebar_clubsponsor"> <img src="<?php echo esc_url( get_theme_mod( 'animals_additionalclubsponsor' ) ); ?>" alt="Club Sponsor - <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">  </div> </a>  <?php else : ?>  <span>Advertise Here</span>   <?php endif; ?>
        
        <?php echo $after_widget; ?>
<?php
        

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_club_sponsors', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_clubsponsors']) )
            delete_option('widget_clubsponsors');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_club_sponsors', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
      
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p>Displays your club's sponsors. To edit your list of sponsors, go to: <a href="<?php echo admin_url(); ?>customize.php">Appearance > Template Configuration > Footer</a>, within the admin panel.</p>
        
<?php
    }
}



add_action( 'add_meta_boxes', 'so_custom_meta_box' );

function so_custom_meta_box($post){
    add_meta_box('so_meta_box', 'Formation (Lineup)', 'lineup_formation_selector_metabox', 'wpcm_match', 'normal' , 'low');
}

add_action('save_post', 'so_save_metabox');

function so_save_metabox(){ 
    global $post;
    if(isset($_POST["lineup_formation_select"])){
         //UPDATE: 
        $meta_element_class = $_POST['lineup_formation_select'];
        //END OF UPDATE

        update_post_meta($post->ID, 'lineup_formation_selector_metabox', $meta_element_class);
        //print_r($_POST);
    }
}

function lineup_formation_selector_metabox($post){
    $meta_element_class = get_post_meta($post->ID, 'lineup_formation_selector_metabox', true); //true ensures you get just one value instead of an array
    ?>   
    <label>Choose your team's formation:  </label>

    <select name="lineup_formation_select" id="lineup_formation_select">
      <option value="normal" <?php selected( $meta_element_class, 'normal' ); ?> selected>4–4–2</option>
      <option value="433" <?php selected( $meta_element_class, '433' ); ?>>4–3–3</option>
      <option value="4411" <?php selected( $meta_element_class, '4411' ); ?>>4–4–1–1</option>
      <option value="4321" <?php selected( $meta_element_class, '4321' ); ?>>4–3–2–1</option>
      <option value="532" <?php selected( $meta_element_class, '532' ); ?>>5–3–2</option>
      <option value="343" <?php selected( $meta_element_class, '343' ); ?>>3–4–3</option>
      <option value="3412" <?php selected( $meta_element_class, '3412' ); ?>>3–4–1–2</option>
      <option value="352" <?php selected( $meta_element_class, '352' ); ?>>3–5–2</option>
      <option value="361" <?php selected( $meta_element_class, '361' ); ?>>3–6–1</option>
      <option value="451" <?php selected( $meta_element_class, '451' ); ?>>4–5–1</option>
      <option value="4231" <?php selected( $meta_element_class, '4231' ); ?>>4–2–3–1</option>
      <option value="541" <?php selected( $meta_element_class, '541' ); ?>>5–4–1</option>
    </select>
    
    <pre>Please note this excludes the standard goalkeeper.</pre>
    <?php
}





function my_customizer_styles() { ?>
  <style>
  
  
    #customize-theme-controls .accordion-section-title {
      background: rgba(255,255,255,0.7);
    }
    
    #customize-controls{font-family: arial !important;}
    
    
    .customize-panel-back, .customize-section-back, .customize-section-back {color: grey !important;}
    
    #customize-controls .customize-info .customize-help-toggle {color: grey; font-family: Dashicons !important;}
    
    .open .customize-section-title h3 {height: 54px !important; display: flex !important; justify-content: left; align-items: center;}
    
    #customize-info {display: none !important;}
    
    .customize-section-title h3 .customize-action {display: none !important;}
  </style>
  <?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );



function customize_register_init( $wp_customize1 ){
 $wp_customize1->get_section('title_tagline')->title = __( 'Website Settings' ); 
 $wp_customize1->remove_section( 'headermatchessec');
 $wp_customize1->remove_section( 'nav_menusbb');
 $wp_customize1->remove_section( 'headermatchessec3');
 $wp_customize1->remove_section( 'headermatchessec2');
 $wp_customize1->remove_section( 'headermatchessecsettings' );
 $wp_customize1->remove_section( 'headermatchessec4');
$wp_customize1->get_control( 'blogname' )->priority = 0;
$wp_customize1->get_control( 'blogdescription' )->priority = 1;
$wp_customize1->get_control( 'site_icon' )->priority = 3;
$wp_customize1->remove_panel( 'menus');
$wp_customize1->remove_section( 'menus');
// Any Customizer-changing code goes here
}

add_action( 'customize_register', 'customize_register_init' );




