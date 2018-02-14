<?php
/**
 * The template for displaying product content in the single-player.php template
 *
 * Override this template by copying it to yourtheme/wpclubmanager/content-single-player.php
 *
 * @author 		ClubPress
 * @package 	WPClubManager/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php do_action( 'wpclubmanager_before_single_player' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <style>.warningmsg {background: #e69602 !important;} .safeguarding-message a {color: rgba(255,255,255,0.7) !important;} .safeguarding-message i {margin-right: 3.4px;} .no_sfg_msg {background: #de9103 !important;} .msg_frontend {background: #c23d2a !important;} .safeguarding-message {border-radius: 3.7px; padding: 7px 14px; background: #c23d2a; color: rgba(255, 255, 255, 0.8588235294117647); font-size: 14px; line-height: 170%;}</style>

    <div class="wpcm-player-info wpcm-row">

	    <?php
			/**
			 * wpclubmanager_single_player_image hook
			 *
			 * @hooked wpclubmanager_template_single_player_images - 5
			 */
			do_action( 'wpclubmanager_single_player_image' );
		?>

		<div class="wpcm-profile-meta">
		    
<?php

if ( is_user_logged_in() ) {
		
$key1 = 'my_key';
$edpedt1 = get_post_meta($post->ID, $key1, true);   

if ($edpedt1 == 'value1'){
echo '<p class="safeguarding-message"><strong><i class="fa fa-lock" aria-hidden="true"></i> For non-logged in users, this information will be hidden.</strong></p>'; }

else {echo '<p class="safeguarding-message warningmsg"><strong><i class="fa fa-unlock-alt" aria-hidden="true"></i> This content is visible to users that are not logged in.</strong></p>';}
    /**
				 * wpclubmanager_single_player_info hook
				 *
				 * @hooked wpclubmanager_template_single_player_title - 5
				 * @hooked wpclubmanager_template_single_player_meta - 10
				 */
				do_action( 'wpclubmanager_single_player_info' );
				
				
}

else {

$key = 'my_key';
$edpedt = get_post_meta($post->ID, $key, true);

if ($edpedt == 'value2'){
				/**
				 * wpclubmanager_single_player_info hook
				 *
				 * @hooked wpclubmanager_template_single_player_title - 5
				 * @hooked wpclubmanager_template_single_player_meta - 10
				 */
				do_action( 'wpclubmanager_single_player_info' );
}			

elseif ($edpedt == 'value1'){
echo '<p class="safeguarding-message msg_frontend"><strong><i class="fa fa-lock" aria-hidden="true"></i> This content has been hidden by the webmaster for all users who are not logged in. In order to access content on this page, you may <a href="' . wp_registration_url() .'">register</a> for an account.</strong></p>'; }
else {
/**
				 * wpclubmanager_single_player_info hook
				 *
				 * @hooked wpclubmanager_template_single_player_title - 5
				 * @hooked wpclubmanager_template_single_player_meta - 10
				 */
				do_action( 'wpclubmanager_single_player_info' ); } 

} 
?>

		</div>

	</div>

    
	<div class="wpcm-profile-bio wpcm-row">

		
		<?php

		if ( get_the_content() ) { 
		
		echo '<h3>Player Profile</h3>';

		}
		
		if ( is_user_logged_in() ) {
		
$key1 = 'my_key';
$edpedt1 = get_post_meta($post->ID, $key1, true);   

if ($edpedt1 == 'value1'){
echo '<p class="safeguarding-message"><strong><i class="fa fa-lock" aria-hidden="true"></i> For non-logged in users, this information will be hidden.</strong></p>'; }

else {echo '<p class="safeguarding-message warningmsg"><strong><i class="fa fa-unlock-alt" aria-hidden="true"></i> This content is visible to users that are not logged in.</strong></p>';}
		    
			/**
			 * wpclubmanager_single_player_bio hook
			 *
			 * @hooked wpclubmanager_template_single_player_bio - 5
			 */
			do_action( 'wpclubmanager_single_player_bio' );
			
}
		
else {		
		
$key = 'my_key';
$edpedt = get_post_meta($post->ID, $key, true);

if ($edpedt == 'value2'){
				/**
			 * wpclubmanager_single_player_bio hook
			 *
			 * @hooked wpclubmanager_template_single_player_bio - 5
			 */
			do_action( 'wpclubmanager_single_player_bio' );
}			

elseif ($edpedt == 'value1'){
echo '<p class="safeguarding-message msg_frontend"><strong><i class="fa fa-lock" aria-hidden="true"></i> This content has been hidden by the webmaster for all users who are not logged in. In order to access content on this page, you may <a href="' . wp_registration_url() .'">register</a> for an account.</strong></p>'; }
else {
/**
			 * wpclubmanager_single_player_bio hook
			 *
			 * @hooked wpclubmanager_template_single_player_bio - 5
			 */
			do_action( 'wpclubmanager_single_player_bio' ); } 

}
?>
		

	</div>


	<div class="wpcm-profile-stats wpcm-row" style="margin-top: 13px;">

		<?php
		
		echo '<h3>Statistics</h3>';
		
			/**
			 * wpclubmanager_single_player_stats hook
			 *
			 * @hooked wpclubmanager_template_single_player_stats - 5
			 */
			do_action( 'wpclubmanager_single_player_stats' );
		?>

	</div>

	<?php do_action( 'wpclubmanager_after_single_player' ); ?>

</article>