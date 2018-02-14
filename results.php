<?php



global $post;

$args = array( 'order' => 'ASC', 'post_type' => 'wpcm_match', 'post_status' => 'publish', 'posts_per_page' => 1, 'offset'=> 0 );



$myposts = get_posts( $args );

foreach ( $myposts as $post ) : setup_postdata( $post ); ?>



<div id="teams-title-sec">



<div class="getsmllr" style="float:left;"> <i class="icon ion-trophy" id="iconlt"> </i> </div> 


  

<div class="getsmllr" style="float:left;">   <h2 class="teamsectitle">Match Centre</h2> </div>    

    

</div>

 

 <div class="teams-clearboth"></div>

  

  <div>

      

     <div> 

     

     

<div id="match-col">

    

<?php



global $post;

$args = array( 'order' => 'ASC', 'post_type' => 'wpcm_match', 'post_status' => 'publish', 'posts_per_page' => 4, 'offset'=> 0 );



$myposts = get_posts( $args );

foreach ( $myposts as $post ) : setup_postdata( $post ); ?>



<div class="next-match-list">



<div class="match-box-header">



<div class="date">

    

    <?php 

$date = date_i18n( get_option( 'date_format' ), strtotime( $post->post_date ) );

$time = date_i18n( get_option( 'time_format' ), strtotime( $post->post_date ) ); ?>

<?php echo $date; ?>, <?php echo $time; ?>



</div>





<div class="competition">

    

<?php $comp = wpcm_get_match_comp( $post->ID ); ?>



<?php echo $comp[0] . '&nbsp;' . $comp[2]; ?>    

    

</div>





<div style="clear: both; height: 0px; width: 100%; display: block;"></div>

    

</div>



<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

    

<div class="match-box-middle pastgames">

    

<div class="home-club">

        



<?php $badges = wpcm_get_match_badges( $post->ID, '', array( 'class' => 'home-logo' ) );

$format = get_match_title_format();

if( $format == '%home% vs %away%') {

	$badge1 = $badges[0];

} else {

	$badge1 = $badges[1];

} ?>



<?php echo $badge1; ?>



<span style="display: block; clear: both;">

    

<?php $side = wpcm_get_match_clubs( $post->ID ); ?>



<?php echo $side[0]; ?>    

    

</span>



</div>



<div class="verses">
    
<?php $played = get_post_meta( $post->ID, 'wpcm_played', true );
$score = wpcm_get_match_result( $post->ID ); ?>

<div class="wpcm-match-score">

	<?php echo $score[1]; ?>

	<span class="wpcm-match-score-delimiter"><?php echo ( $played ? $score[3] : get_option( 'wpcm_match_clubs_separator' ) ); ?></span>

	<?php echo $score[2]; ?>

</div> 
    
</div>



<div class="away-club">

        



<?php $badges = wpcm_get_match_badges( $post->ID, '', array( 'class' => 'away-logo' ) );

$format = get_match_title_format();

if( $format == '%home% vs %away%') {

	$badge = $badges[1];

} else {

	$badge = $badges[0];

} ?>



<?php echo $badge; ?>



<span style="display: block; clear: both;">

    

<?php $side = wpcm_get_match_clubs( $post->ID ); ?>



	<?php echo $side[1]; ?>    

    

</span>



</div>



<div style="clear: both; display: block; height: 0px; width: 100%;"></div>






</a>








</div>



<?php endforeach; 

wp_reset_postdata();?>    

    </div>
    
   