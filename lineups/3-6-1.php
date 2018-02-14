
<?php

$played = get_post_meta( $post->ID, 'wpcm_played', true );
$players = unserialize( get_post_meta( $post->ID, 'wpcm_players', true ) );
$wpcm_player_stats_labels = wpcm_get_preset_labels();
$subs_not_used = get_post_meta( $post->ID, '_wpcm_match_subs_not_used', true );

if ( $played && $players ) {

	if ( array_key_exists( 'lineup', $players ) && is_array( $players['lineup'] ) ) { ?>

<tr class="position1 goalkeeper">

<td> <div id="gk">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==1) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>

</tr>
					
					
					
<tr class="position2 stri">

<td> <div id="rb">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==2) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>

<td> <div id="cb">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==3) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>


<td> <div id="lb">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==4) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>

</tr>   


<tr class="position3">

<td> <div id="rm">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==5) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>

<td> <div id="cm">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==6) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>


<td> <div id="rcm">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==7) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>

<td> <div id="cm">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==8) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>


<td> <div id="lcm">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==9) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>


<td> <div id="lm">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==10) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>

</tr>   

<tr class="position4 stri">


<td> <div id="st">	
	
<?php 
					$count = 0;
					foreach( $players['lineup'] as $key => $value) {
						$count ++;	
						
if ($count==11) {
    
						wpclubmanager_get_template( 'wpclubmanager/single-match/lineuprow.php', array( 
							'key' => $key, 
							'value' => $value, 
							'count' => $count
						) );
						
						
 }
 
					} ?>
					
</div>

</td>




</tr>   


<?php }
} ?>