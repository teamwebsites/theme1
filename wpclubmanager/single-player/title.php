<?php
/**
 * Single Player - Title
 *
 * @author 		ClubPress
 * @package 	WPClubManager/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;
global $post;
// Exit if accessed directly ?>

<h1 class="entry-title"> 

<?php

$my_post_meta = get_post_meta($post->ID, 'wpcm_number', true);
if ( ! empty ( $my_post_meta ) ) {
echo '<div id="shirtnumber"> <span>';
	echo $my_post_meta;
	echo ' </span> </div>';
}	

 ?>
 	

 <div><?php the_title(); ?></div> </h1>