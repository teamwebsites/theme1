<?php
/**
 * Single Match - Lineup
 *
 * @author 		ClubPress
 * @package 	WPClubManager/Templates
 * @version     1.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

$played = get_post_meta( $post->ID, 'wpcm_played', true );
$players = unserialize( get_post_meta( $post->ID, 'wpcm_players', true ) );
$wpcm_player_stats_labels = wpcm_get_preset_labels();
$subs_not_used = get_post_meta( $post->ID, '_wpcm_match_subs_not_used', true );

if ( $played && $players ) {

	if ( array_key_exists( 'lineup', $players ) && is_array( $players['lineup'] ) ) { ?>
					
		<div class="wpcm-match-stats-start">

			<h3><?php echo _e( 'Lineup', 'wp-club-manager' ); ?></h3>
			
<style>

#btn-Preview-Image {float: left; display: block;} #btn-Convert-Html2Image {margin-top: 0px; margin-left: 7px; display: block; float: left;}

#matchlineup td {border: none;}

.goalkeeper #gk, .stri #gk, #st {height: auto; max-height: 20px !important;}

#matchlineup tr div:first-child {    height: auto !important;}

.goalkeeper td, .stri td {    flex-wrap: wrap;
    flex-flow: column;
    justify-content: center;
    align-items: center;}
    
#matchlineup {background-size: 100%; background-position: center; background-repeat: no-repeat;}    

@media screen and (max-width: 950px) { #hideifmo1 {display: none !important;} #matchlineup {background-size: cover !important;} #matchlineup a{    width: 80px;
    height: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word;} }

#matchlineup p, #matchlineup span, #matchlineup, #matchlineup a {    font-size: 14.5px;    word-wrap: break-word; color: #f5f5f5 !important; text-shadow: 1px 1px 1px #595959;}
    
#matchlineup {padding-top: 40px; padding-bottom: 40px;}

#matchlineup tr td div{flex-wrap: inherit;
    flex: initial !important;
    justify-content: center;
    display: flex;
    white-space: nowrap;
    height: 50px;
    word-wrap: break-word;
    flex-wrap: wrap;}

#lineupbuilder {color: #e1e1e1; background-color: grey;}

#lineupbuilder:after {position: relative; clear: both; height: 0px; display: block; content: "";}

#twpowlogo {background-image: url(//www.teamwebsites.co.uk/images/twlogowhite.svg); background-size: 100%; background-clip: unset; background-position: center; background-repeat: no-repeat; width: 100%; height: 100%;}

#matchlineup {background: url('//teamwebsites.co.uk/clubs/wp-content/themes/theme1/fieldbackground.svg'); background-size: 100%; background-clip: unset; background-position: center; background-repeat: no-repeat; width: 100%; height: 100%;}


.poweredby-line {padding-left: 0px !important; padding: 5px 13px; float: left; display: block; font-size: 14.5px;}
    
.teamwebsites-square {padding-right: 2px !important; padding: 1px 9px; float: left; margin-right: 7px; height: 31.82px; display: block; width: 30px;}

#matchlineup tr {float: right; width: 25%;}

#matchlineup tbody {width: 100%; flex: 100%;;}

.position1 {order: 4;}

.position2 {order: 3;}

.position3 {order: 2;}

.position4 {order: 1;}

#matchlineup, #matchlineup tr td, #matchlineup tbody, #matchlineup tr {display: -webkit-box; display: -moz-box; display: -ms-flexbox; display: -moz-flex; display: -webkit-flex; display: flex;}

#matchlineup tr td div {    justify-content: center;
    width: 100%;
    flex: 100%; height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;}
    
#st {margin-right: -36px;}

@media screen and (min-width: 951px) { #st a {max-width: 110px; text-overflow: ellipsis; overflow: hidden;} }

#matchlineup, #matchlineup tr {flex-wrap: wrap; display: flex; justify-content: flex-end; align-items: stretch; height: 100%;}

#matchlineup tr td {text-align: center; flex: 100%; clear: both; float: right;}

</style>			

		
<div id="lineupbuilder">
    
<a href="https://www.teamwebsites.co.uk/" title="Club Website powered by Team Websites">
    
<div class="teamwebsites-square">

<div id="twpowlogo"></div>    
    
</div>			
			
<div class="poweredby-line">Powered by Team Websites</div>	    

</a>
   
</div>    
    



<table id="matchlineup" class="html-content-holder" style="position: relative;">
    

<div style="z-index: 11111111; position: relative;">
    
<?php

$played = get_post_meta( $post->ID, 'wpcm_played', true );
$players = unserialize( get_post_meta( $post->ID, 'wpcm_players', true ) );
$wpcm_player_stats_labels = wpcm_get_preset_labels();
$subs_not_used = get_post_meta( $post->ID, '_wpcm_match_subs_not_used', true );

if ( $played && $players ) {

	if ( array_key_exists( 'lineup', $players ) && is_array( $players['lineup'] ) ) { ?>
	

<?php
    $example_position5 = get_post_meta( get_the_ID(), 'lineup_formation_selector_metabox', true );
    if( $example_position5 != '' ) {
        switch ( $example_position5 ) {
            
            
            case 'normal':
                
            echo get_template_part( 'lineups/4-4-2' );                
                
                break;    
                
            case '433':
                
            echo get_template_part( 'lineups/4-3-3' );                
                
                break;  
                
            case '4411':
                
            echo get_template_part( 'lineups/4-4-1-1' );                
                
                break;
                
            case '4321':
                
            echo get_template_part( 'lineups/4-3-2-1' );                
                
                break;
                
            case '532':
                
            echo get_template_part( 'lineups/5-3-2' );                
                
                break;
                
            case '343':
                
            echo get_template_part( 'lineups/3-4-3' );                
                
                break;
                
            case '352':
                
            echo get_template_part( 'lineups/3-5-2' );                
                
                break;
                
            case '361':
                
            echo get_template_part( 'lineups/3-6-1' );                
                
                break;
                
            case '451':
                
            echo get_template_part( 'lineups/4-5-1' );                
                
                break;
                
            case '4231':
                
            echo get_template_part( 'lineups/4-2-3-1' );                
                
                break; 
                
            case '541':
                
            echo get_template_part( 'lineups/5-4-1' );                
                
                break;     
                
            
           
        }
    }
?> 



<?php }
} ?>

</div>
    
</table>

</div>

<div id="hideifmo1">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>

<?php 

$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false; 
$firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true : false;
$safari = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? true : false;
$chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;

if ($msie == true) {
echo 'This section is hidden on Internet explorer';
}


if ($safari == true) {
echo '<div style="margin-top: -9px; margin-bottom: 26px;">
    
<input id="btn-Preview-Image" type="button" value="Generate" title="Generate this as an image" />
    <a id="btn-Convert-Html2Image" href="#">Save as Picture</a>
    
    <div style="clear: both; display: block; height: 6px;"></div>
    
    <h3 style="background: lightgrey; font-weight: 400 !important; color: grey; padding: 5px 10px; font-size: 15px; margin-top: 6px; display: block; float: none; clear: both;">Image Preview:</h3>
    <div id="previewImage">
    </div>    
    
    <p style="color: grey;"><i class="fa fa-question-circle" aria-hidden="true" style="margin-right: 2.5px;"></i> Now you can save this match line-up to your computer, then upload & share on social media. This feature works in some browsers.</p>
    
</div>';
}

if ($firefox == true) {
echo '<div style="margin-top: -9px; margin-bottom: 26px;">
    
<input id="btn-Preview-Image" type="button" value="Generate" />
    <a id="btn-Convert-Html2Image" href="#">Save as Picture</a>
    
    <div style="clear: both; display: block; height: 6px;"></div>
    
    <h3 style="background: lightgrey; font-weight: 400 !important; color: grey; padding: 5px 10px; font-size: 15px; margin-top: 6px; display: block; float: none; clear: both;">Image Preview:</h3>
    <div id="previewImage">
    </div>    
    
    <p style="color: grey;"><i class="fa fa-question-circle" aria-hidden="true" style="margin-right: 2.5px;"></i> Now you can save this match line-up to your computer, then upload & share on social media. This feature works in some browsers.</p>
    
</div>';
}



?>
    
    

<script>

$("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "lineup.png").attr("href", newData);
});
var element = $(".html-content-holder"); // global variable
var getCanvas; // global variable

    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
    });

</script>

</div>


			<table class="wpcm-lineup-table">
				<thead>
					<tr>

						<?php if( get_option( 'wpcm_lineup_show_shirt_numbers' ) == 'yes' ) { ?>

							<th class="shirt-number"></th>

						<?php } ?>

						<th class="name"><?php _e('Name', 'wp-club-manager') ?></th>

						<?php foreach( $wpcm_player_stats_labels as $key => $val ) {
							if( ! in_array( $key, wpcm_exclude_keys() ) && get_option( 'wpcm_show_stats_' . $key ) == 'yes' && get_option( 'wpcm_match_show_stats_' . $key ) == 'yes' ) { ?>

								<th class="<?php echo $key; ?>"><?php echo $val; ?></th>
							
							<?php }
						}
						if( get_option( 'wpcm_show_stats_greencards' ) == 'yes' && get_option( 'wpcm_match_show_stats_greencards' ) == 'yes' || get_option( 'wpcm_show_stats_yellowcards' ) == 'yes' && get_option( 'wpcm_match_show_stats_yellowcards' ) == 'yes' || get_option( 'wpcm_show_stats_blackcards' ) == 'yes' && get_option( 'wpcm_match_show_stats_blackcards' ) == 'yes' || get_option( 'wpcm_show_stats_redcards' ) == 'yes' && get_option( 'wpcm_match_show_stats_redcards' ) == 'yes' ) { ?>

								<th class="notes"><?php _e('Cards', 'wp-club-manager') ?></th>
							
						<?php } ?>

					</tr>
				</thead>
				<tbody>
										
					<?php $count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;

						wpclubmanager_get_template( 'single-match/lineup-row.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
					} ?>
								
				</tbody>
			</table>
		</div>

	<?php }
	if ( array_key_exists( 'subs', $players ) && is_array( $players['subs'] ) || is_array( $subs_not_used ) ) { ?>
					
		<div class="wpcm-match-stats-subs">

			<h3><?php echo _e( 'Subs', 'wp-club-manager' ); ?></h3>

			<table class="wpcm-subs-table">
				<thead>
					<tr>

						<?php if( get_option( 'wpcm_lineup_show_shirt_numbers' ) == 'yes' ) { ?>

							<th class="shirt-number"></th>

						<?php } ?>

						<th class="name"><?php _e('Name', 'wp-club-manager') ?></th>

						<?php foreach( $wpcm_player_stats_labels as $key => $val ) {
							if( ! in_array( $key, wpcm_exclude_keys() ) && get_option( 'wpcm_show_stats_' . $key ) == 'yes' && get_option( 'wpcm_match_show_stats_' . $key ) == 'yes' ) { ?>

								<th class="<?php echo $key; ?>"><?php echo $val; ?></th>
								
							<?php }
						}
						if( get_option( 'wpcm_show_stats_greencards' ) == 'yes' && get_option( 'wpcm_match_show_stats_greencards' ) == 'yes' || get_option( 'wpcm_show_stats_yellowcards' ) == 'yes' && get_option( 'wpcm_match_show_stats_yellowcards' ) == 'yes' || get_option( 'wpcm_show_stats_blackcards' ) == 'yes' && get_option( 'wpcm_match_show_stats_blackcards' ) == 'yes' || get_option( 'wpcm_show_stats_redcards' ) == 'yes' && get_option( 'wpcm_match_show_stats_redcards' ) == 'yes' ) { ?>

								<th class="notes"><?php _e('Cards', 'wp-club-manager') ?></th>
							
						<?php } ?>

					</tr>
				</thead>
				<tbody>
										
					<?php foreach( $players['subs'] as $key => $value) {		
						$count ++;

						wpclubmanager_get_template( 'single-match/lineup-row.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );				
					}

					if( is_array( $subs_not_used ) ) {

						foreach( $subs_not_used as $key => $value ) {		
							$count ++;

							wpclubmanager_get_template( 'single-match/lineup-row.php', array( 
								'key' => $key, 
								'value' => array(), 
								'count' => $count
							) );				
						}
					} ?>
							
				</tbody>	
			</table>
		</div>
					
	<?php }
}