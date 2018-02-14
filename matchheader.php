<?php $played = get_post_meta( $post->ID, 'wpcm_played', true );
$score = wpcm_get_match_result( $post->ID );
$side = wpcm_get_match_clubs( $post->ID );

?>

<div class="match-intro-section" id="matchintrosection">

<div class="scoreboard-title">
		<div class="scoreboard-title-inside">
		    
		    <?php $comp = wpcm_get_match_comp( $post->ID ); ?>

<div class="wpcm-match-comp">
	<span>
		<?php echo $comp[0] . '&nbsp;' . $comp[2]; ?>
	</span>
</div>
		    
			<div class="scoreboard-club">
			    
			    <?php $badges = wpcm_get_match_badges( $post->ID, 'crest-medium', array( 'class' => 'home-logo' ) );
$format = get_match_title_format();
if( $format == '%home% vs %away%') {
	$badge1 = $badges[0];
} else {
	$badge1 = $badges[1];
} ?>
			    
				<span class="scoreboard-badge"><?php echo $badge1; ?></span>
				
				
				
				<h2>
					<?php echo $side[0]; ?>				</h2>
				<span class="scoreboard-score"><?php $played = get_post_meta( $post->ID, 'wpcm_played', true ); if ( $played ) { echo $score[1]; } else {echo "v";} ?></span>    
				    
				
			</div>
			<div class="scoreboard-club">
				<span class="scoreboard-badge">
				
				<?php $badges = wpcm_get_match_badges( $post->ID, 'crest-medium', array( 'class' => 'away-logo' ) );
$format = get_match_title_format();
if( $format == '%home% vs %away%') {
	$badge2 = $badges[1];
} else {
	$badge2 = $badges[0];
} ?>
			    
				<span class="scoreboard-badge"><?php echo $badge2; ?></span>
				
				</span>
				<h2>
					<?php echo $side[1]; ?>				</h2>
				<span class="scoreboard-score"><?php $played = get_post_meta( $post->ID, 'wpcm_played', true ); if ( $played ) { echo $score[2]; } else {echo "v";} ?></span>
			</div>
		</div>
	</div>
	
<?php

$attendance = get_post_meta( $post->ID, 'wpcm_attendance', true );
$show_attendance = get_option( 'wpcm_results_show_attendance' );
$played = get_post_meta( $post->ID, 'wpcm_played', true );

if ( $played ) {
					
	if ( $attendance && $show_attendance == 'yes' ) { ?>

		<div class="wpcm-match-attendance">

			<?php echo _e( 'Attendance', 'wp-club-manager' ); ?>: <?php echo $attendance; ?>

		</div>

	<?php }

}

?>

<?php $date = date_i18n( get_option( 'date_format' ), strtotime( $post->post_date ) );
$time = date_i18n( get_option( 'time_format' ), strtotime( $post->post_date ) ); ?>

<div class="wpcm-match-date">
	<?php echo $date; ?>, <?php echo $time; ?>
</div>    
    
</div>

<div style="display: block; height: 20px; clear: both;"></div>
