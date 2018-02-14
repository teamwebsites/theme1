<?php
/**
 * Single Match - Lineup Row
 *
 * @author 		ClubPress
 * @package 	WPClubManager/Templates
 * @version     1.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post; ?>

    
<div style="display: flex; flex: 100%;"><?php echo wpcm_get_player_thumbnail( $key, 'player_thumbnail', array( 'class' => 'lineup-thumb' ) ); ?></div>    

<div style="clear: both; display: block; height: 7px;"></div>

<a href="<?php echo get_permalink( $key ); ?>"><?php echo get_the_title( $key ); ?></a>
