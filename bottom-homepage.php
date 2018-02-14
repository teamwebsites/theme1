<div style="clear: both; display: block; height: 20px;"></div>

<?php if ( get_theme_mod( 'youtubeurl' ) ) : ?>

<div style="clear: both; display: block; height: 10px;"></div>

<div class="youtube-homepage-block">
    
<h2>YouTube</h2>

<div id="youtube-lefthalf">
    
<div id="youtube-clubdetails">
    
<?php $custom_logo_id = get_theme_mod( 'custom_logo' );

$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

if ( has_custom_logo() ) {

        echo '<img id="logo" src="'. esc_url( $logo[0] ) .'">';

} else {

        echo '<img id="logo" src="http://teamwebsites.co.uk/clubs/demo1/wp-content/uploads/sites/21/2017/06/club-badge-fc.png">';

} ?>    
    
<h3><?php bloginfo('name'); ?></h3>   

<a href="https://www.youtube.com/channel/<?php echo get_theme_mod('youtubeurl'); ?>" target="_blank"><p>YouTube</p></a>
    
</div>    
    
</div>

<div id="youtube-righthalf">
    
<?php

function curl_get_contents($url) {
    // Initiate the curl session
    $ch = curl_init();
    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $url);
    // Removes the headers from the output
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Return the output instead of displaying it directly
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //set timeout
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    // Execute the curl session
    $output = curl_exec($ch);
    // Close the curl session
    curl_close($ch);
    // Return the output as a variable
    return $output;
}


$url1 = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . get_theme_mod('youtubeurl');
  
$feed = curl_get_contents( $url1 );
$xml = new SimpleXmlElement($feed);

$count = count($xml->entry);
for ($i=0; $i < 3; $i++) { 
    $url = $xml->entry[$i]->link->attributes();
    $videourl = explode("&",$url['href']);
    $video = str_replace("https://www.youtube.com/watch?v=","",$videourl[0]);
    
   echo '<div id="ytvideo">';
    echo '<p><iframe width="100%" src="https://www.youtube.com/embed/'.$video.'" frameborder="0" style="height: auto;" allowfullscreen></iframe></p>';
    echo '<a href="https://www.youtube.com/watch?v=' . $video . '" title="Watch Video">';
    echo '<h4>'.$xml->entry[$i]->title.'</h4>';
    echo '</a>';
   echo '</div>';
   
}
?>
    
 
    
</div>    
    
</div>                      


<div style="clear: both; display: block; height: 15px;"></div>

<?php else: ?>

<?php endif; ?>


<div class="importantannouncement"><i class="fa fa-exclamation-triangle" id="infoboxicon" aria-hidden="true"></i> <span><?php echo esc_html(get_theme_mod('homepageinfobox','POSTPONED: Test Match V Opposition')); ?></span></div>



<div style="clear: both; display: block; height: 20px;"></div>



<div id="teams-title-sec">



<div class="getsmllr" style="float:left;"> <i class="icon ion-tshirt" id="iconlt"> </i> </div> 

  

  

<div class="getsmllr" style="float:left;">   <h2 class="teamsectitle">Teams</h2> </div>    

    

</div>

 

 <div class="teams-clearboth"></div>

  

  <div class="teamlistcolumn" id="1teamlistcolumn">

      

     <div class="teamlist-container"> 

      

  

   <div class="team-secheading"><?php echo esc_html(get_theme_mod('leftteamssectitle','Senior')); ?></div>

   

   <div style="clear:both;height:1px;"></div>

   

 <?php

wp_nav_menu( array( 

    'theme_location' => 'my-custom-menu', 

    'container_class' => 'custom-menu-class' ) ); 

?>



<div style="clear:both;height:1px;"></div>

  

</div>



</div>

  

  <?php if ( has_nav_menu( 'secondage' ) ) : ?>

  

  <div class="teamlistcolumn" id="teambinglist">

  

   <div class="teamlist-container">

  

  <div class="team-secheading"><?php echo esc_html(get_theme_mod('rightteamssectitle','Junior')); ?></div>

 <?php

wp_nav_menu( array( 

    'theme_location' => 'secondage', 

    'container_class' => 'custom-menu-class' ) ); 

?>

  

  </div>

  

  </div>

  

   

   <?php else: ?>     <?php endif; ?>



<?php if(true === get_theme_mod('isyouthclub')) : ?>

<div style="clear: both; display: block; height: 30px;"></div>

<div class="clubwelfare-contact youthclubhpwidget social-hp-widget">

<h3>Club Safeguarding Officer</h3> 

<p class="clubwelfare-introline">In the immediate instance, please contact the Club's Safeguarding Officer using the details found below.</p>

<h4>
<?php if ( get_theme_mod( 'safeguardingofficer-name' ) ) : ?>
<?php echo get_theme_mod( 'safeguardingofficer-name' ); ?>
<?php else: ?>
Not Stated
<?php endif; ?>
</h4>

<ul>

<li>
<?php if ( get_theme_mod( 'safeguardingofficer-email' ) ) : ?>
<a href="mailto:<?php echo get_theme_mod( 'safeguardingofficer-email' ); ?>"><?php echo get_theme_mod( 'safeguardingofficer-email' ); ?></a>
<?php else: ?>
Not Stated
<?php endif; ?></li>    
    
</ul>
    
</div>

<style>@media screen and (max-width: 950px) {.youthclubhpwidget {margin-bottom: 16px;}.youthclubhpwidget:last-child {margin-bottom: 6px !important;}} @media screen and (min-width: 951px) { .youthclubhpwidget {width: calc(33.3% - 8px); margin-right: 8px;} } .clubwelfare-contact .clubwelfare-introline, .countywelfare-contact .countywelfare-introline {margin-bottom: 9px; font-family: inherit; font-size: 14px; font-weight: 400; line-height: 160%;} .countywelfare-contact h4, .clubwelfare-contact h4 {text-decoration: none; clear: both; padding-bottom: 2px; padding-right: 4px; border-bottom: 1px solid grey; display: inline-block; margin-bottom: 5px; font-family: inherit; font-size: 17px; font-weight: 500;} .countywelfare-contact ul, .clubwelfare-contact ul {margin-bottom: 0px; margin-top: 0px; list-style: none; padding-left: 0px;}</style>

<div class="countywelfare-contact youthclubhpwidget social-hp-widget">

<h3>County FA - Safeguarding</h3> 

<p class="countywelfare-introline">Your County FA can provide independent advice, guidance and take action where necessary, if you have a safeguarding enquiry.</p>

<?php
    $selectedcountyfa = get_theme_mod( 'affiliationsfa' );
    if( $selectedcountyfa != '' ) {
        switch ( $selectedcountyfa ) {
            
            
            case 'affiliationfa':
                
            echo get_template_part( 'safeguarding/county', 'basicfa' );                
                
                break;    
                
            case 'amateurfa':
                
            echo get_template_part( 'safeguarding/county', 'amateur' );                
                
                break;
                
                
            case 'armyfa':
               
               echo get_template_part( 'safeguarding/county', 'army' );
               
                break;
                
                
                
            case 'bedfordshirefa':
                
                echo get_template_part( 'safeguarding/county', 'bedfordshire' );
                
                break; 
                
                
            case 'berksandbucksfa':
                
                echo get_template_part( 'safeguarding/county', 'berksandbucks' );
                
                break; 
                
            case 'birminghamfa':
                
                echo get_template_part( 'safeguarding/county', 'birmingham' );
                
                break; 
                
            case 'cambridgeshirefa':
                
                echo get_template_part( 'safeguarding/county', 'cambridgeshire' );
                
                break; 
                
            case 'cheshirefa':
                
                echo get_template_part( 'safeguarding/county', 'cheshire' );
                
                break; 
                
            case 'cornwallfa':
                
                echo get_template_part( 'safeguarding/county', 'cornwall' );
                
                break; 
                
            case 'cumberlandfa':
                
                echo get_template_part( 'safeguarding/county', 'cumberland' );
                
                break; 
                
            case 'derbyshirefa':
                
                echo get_template_part( 'safeguarding/county', 'derbyshire' );
                
                break; 
                
            case 'devonfa':
                
                echo get_template_part( 'safeguarding/county', 'devon' );
                
                break; 
                
            case 'dorsetfa':
                
                echo get_template_part( 'safeguarding/county', 'dorset' );
                
                break; 
                
            case 'durhamfa':
                
                echo get_template_part( 'safeguarding/county', 'durham' );
                
                break; 
                
            case 'eastridingfa':
                
                echo get_template_part( 'safeguarding/county', 'eastriding' );
                
                break;  
                
            case 'essexfa':
                
                echo get_template_part( 'safeguarding/county', 'essex' );
                
                break;
                
            case 'gloucestershirefa':
                
                echo get_template_part( 'safeguarding/county', 'gloucestershire' );
                
                break;
                
            case 'guernseyfa':
                
                echo get_template_part( 'safeguarding/county', 'guernsey' );
                
                break;
            
            case 'hantsfa':
                
                echo get_template_part( 'safeguarding/county', 'hampshire' );
                
                break;
                
            case 'herefordshirefa':
                
                echo get_template_part( 'safeguarding/county', 'herefordshire' );
                
                break;
                
            case 'hertfordshirefa':
                
                echo get_template_part( 'safeguarding/county', 'hertfordshire' );
                
                break;
                
            case 'huntingdownshirefa':
                
                echo get_template_part( 'safeguarding/county', 'huntingdownshire' );
                
                break;
                
            case 'isleofmanfa':
                
                echo get_template_part( 'safeguarding/county', 'isleofman' );
                
                break;
                
            case 'jerseyfa':
                
                echo get_template_part( 'safeguarding/county', 'jersey' );
                
                break;
                
            case 'kentfa':
                
                echo get_template_part( 'safeguarding/county', 'kent' );
                
                break;
                
            case 'lancashirefa':
                
                echo get_template_part( 'safeguarding/county', 'lancashire' );
                
                break;
                
            case 'leicestershirerutlandfa':
                
                echo get_template_part( 'safeguarding/county', 'leicestershire' );
                
                break;
                
            case 'lincolnshirefa':
                
                echo get_template_part( 'safeguarding/county', 'lincolnshire' );
                
                break;
                
            case 'liverpoolfa':
                
                echo get_template_part( 'safeguarding/county', 'liverpool' );
                
                break;
                
            case 'londonfa':
                
                echo get_template_part( 'safeguarding/county', 'london' );
                
                break;
                
            case 'manchesterfa':
                
                echo get_template_part( 'safeguarding/county', 'manchester' );
                
                break;
                
            case 'middlesexfa':
                
                echo get_template_part( 'safeguarding/county', 'middlesex' );
                
                break;
                
            case 'norfolkfa':
                
                echo get_template_part( 'safeguarding/county', 'norfolk' );
                
                break;
                
            case 'northamptonshirefa':
                
                echo get_template_part( 'safeguarding/county', 'northamptonshire' );
                
                break; 
                
            case 'northridingfa':
                
                echo get_template_part( 'safeguarding/county', 'northriding' );
                
                break; 
                
            case 'northumberlandfa':
                
                echo get_template_part( 'safeguarding/county', 'northumberland' );
                
                break; 
                
            case 'nottinghamshirefa':
                
                echo get_template_part( 'safeguarding/county', 'nottinghamshire' );
                
                break; 
                
            case 'oxfordshirefa':
                
               echo get_template_part( 'safeguarding/county', 'oxfordshire' ); 
                
                break; 
                
                
            case 'raffa':
                
                echo get_template_part( 'safeguarding/county', 'raf' );
                
                break; 
                
            case 'royalnavyfa':
                
                echo get_template_part( 'safeguarding/county', 'royalnavy' );
                
                break;
                
                
            case 'sheffieldfa':
                
                echo get_template_part( 'safeguarding/county', 'sheffield' );
                
                break;
                
            case 'shropshirefa':
                
                get_template_part( 'safeguarding/county', 'shropshire' );
                
                break;
                
            case 'somersetfa':
                
                echo get_template_part( 'safeguarding/county', 'somerset' );
                
                break;
                
            case 'staffordshirefa':
                
                echo get_template_part( 'safeguarding/county', 'staffordshire' );
                
                break;
                
            case 'suffolkfa':
                
                echo get_template_part( 'safeguarding/county', 'suffolk' );
                
                break;
                
            case 'surreyfa':
                
                echo get_template_part( 'safeguarding/county', 'surrey' );
                
                break;
                
                
            case 'sussexfa':
                
               echo get_template_part( 'safeguarding/county', 'sussex' ); 
                
                break;
                
            case 'westmorlandfa':
                
                echo get_template_part( 'safeguarding/county', 'westmorland' );
                
                break;  
                
            case 'westridingfa':
                
                echo get_template_part( 'safeguarding/county', 'westriding' );
                
                break; 
                
                
            case 'wiltshirefa':
                
                get_template_part( 'safeguarding/county', 'wiltshire' );
                
                break; 
                
            case 'worcestershirefa':
                
                echo get_template_part( 'safeguarding/county', 'worcestershire' );
                
                break;     
                
            
           
        }
    }
?> 
    
</div>

<div class="social-hp-widget youthclubhpwidget relatedyouthlinks">

<h3>Related Links</h3>  

<ul>

<li><a href="https://www.nspcc.org.uk/" target="_blank">NSPCC - 0808 800 5000</a></li>
<li><a href="https://www.ceop.police.uk/safety-centre/" target="_blank" title="The Child Exploitation and Online Protection Command">CEOP - 999</a></li> 
<li><a href="https://www.childline.org.uk/" target="_blank" title="Free, private and confidential - for Under 19's">Childline - 0800 1111</a></li>
<li><a href="http://www.thefa.com/football-rules-governance/safeguarding" target="_blank">FA Safeguarding</a></li>
<li><a href="https://www.police.uk/forces/" target="_blank">Police - 999</a></li>
    
</ul>
    
</div>

<?php else: ?>

<div style="clear: both; display: block; height: 20px;"></div>

<?php endif; ?>



<?php if(true === get_theme_mod('hidehomepagefixturessec')): ?>     
<div>
<?php else: ?>
<?php get_template_part('fixtureshomepagesec'); ?>
<?php endif; ?>


<div style="clear: both; display: block; height: 20px;"></div>


<?php if(true === get_theme_mod('hidehomepageresultssec')): ?>     
<div>
<?php else: ?>
<?php get_template_part('resultshomepagesec'); ?>

<?php endif; ?>






<div style="clear: both; display: block; height: 20px;"></div>




<?php if ( get_theme_mod( 'twitter_user_name' ) ) : ?>



<div class="social-hp-widget">

    

<div>

    

<h3><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</h3>



 <a class="twitter-timeline" data-chrome="noborders noheader nofooter"

  data-link-color="#820bbb" data-

  data-border-color="#a80000" href="https://twitter.com/<?php echo get_theme_mod( 'twitter_user_name' ); ?>" height="213" style="width: 200px;">Powered by TeamWebsites.co.uk</a>    

    

</div>

    

</div>



</div>



</div>



<?php else : ?>



<?php endif; ?>

  

  

  <script async src="//platform.twitter.com/widgets.js" charset="utf-8" style="font-size: 11px !important;"></script>  



<?php if ( get_theme_mod( 'fb_pg_url' ) ) : ?>



<div class="social-hp-widget">

    

<div>

    

<h3><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</h3>



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>





<iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo get_theme_mod( 'fb_pg_url' ); ?>%2F&tabs&width=500&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="213" style="border:none;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>    

    

</div>



</div>



<?php else : ?>



<?php endif; ?>





<?php if ( get_theme_mod( 'instagram_user_name' ) ) : ?>



<div class="social-hp-widget">

    

<div>

    

<h3><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</h3>



<div class="social-item">



<div class="item-cont" style="height: 213px; width: 100%;">

    

<section>



<?php $custom_logo_id = get_theme_mod( 'custom_logo' );

$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

if ( has_custom_logo() ) {

        echo '<img id="logo" src="'. esc_url( $logo[0] ) .'">';

} else {

        echo '';

} ?>

    

</section>  

    

<section>



<a href="https://www.instagram.com/<?php echo get_theme_mod( 'instagram_user_name' ); ?>" target="_blank">Click here for <?php bloginfo('name'); ?>'s Instagram profile</a>     

    

</section>   

    

</div>

    

</div>

    

</div>



</div>



<?php else : ?>



<?php endif; ?>



<div style="clear: both; display: block; height: 20px;"></div>





<?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) ){?>



<?php if( is_active_sidebar( 'footer-one' ) ){ ?>



<div class="homepagecolu">

<?php dynamic_sidebar( 'footer-one' ); ?>	

</div>



<?php } ?>

                    

                    

                    

                    

<?php if( is_active_sidebar( 'footer-two' ) ){ ?>



<div class="homepagecolu">

<?php dynamic_sidebar( 'footer-two' ); ?>	

</div>



<?php } ?>

                    

                    

<?php } ?>  





<div style="clear: both; display: block; height: 20px;"></div>