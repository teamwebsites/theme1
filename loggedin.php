<style>.lih-left img, .lih-left span {display: inline-block; float: left;}

.lih-right {text-align: right;}

.lih-left img {margin-top: 2px;}

#easyloginedit .lih-left a {text-decoration: none;}

#easyloginedit a {color: #838383;}

@media screen and (max-width: 950px) { .lih-left span {display: none !important;} }

#twhi {background: #00aced; margin-right: 9px;}

#fbhi, #twhi {margin-top: -3px;}

#twhi .fa:before {content: "\f099"; margin-top: -15px; margin-left: 1px; display: inline-block !important;}

#fbhi {background: #3B5998; margin-right: 0px;}

.twheader-si:hover {opacity: 0.6; cursor: pointer;}

#raiseby1 {margin-top: -3px;}

#lih-right {padding-bottom: 2px;}

.twheader-si {text-align: center !important; color: #fff; display: inline-block; border-radius: 50%; height: 25px; width: 25px;}

#line-sep {display: inline-block; margin-right: 6px; background: rgba(128, 128, 128, 0.34); margin-top: 2px; width: 2px; margin-bottom: -6px; margin-left: 9px; height: 25px;}

#linesepa {display: inline-block; float: left; margin-right: 10px; background: rgba(128, 128, 128, 0.34); width: 2px; height: 25px;}

#easyloginedit a:hover, #easyloginedit a:focus {text-decoration: underline;}

.lih-right a:hover span{text-decoration: uppercase !important;}

.lih-left {text-align: left;}

.lih-right a:hover span {
    text-decoration: underline !important;
}

.lih-right a {text-decoration: none;}

.lih-right a:hover {
    text-decoration: none !important;
}

#easyloginedit {background: #e3e3e3; color: grey; display: block; clear: both; padding-top: 3.5px; padding-bottom: 4.5px;}

.lih-left img {margin-right: 7.6px; margin-top: 1.25px;}

</style>

<div id="easyloginedit">

<div class="container">
    
<div class="lih-left">

<a href="https://www.teamwebsites.co.uk/" target="_blank"><img src="https://www.teamwebsites.co.uk/wp-content/uploads/2017/08/blue-logo.png" width="60" height="25"></a>

<div id="linesepa"></div>

<?php
if ( is_user_logged_in() ) {
  echo '<span><a href="https://help.teamwebsites.co.uk/" target="_blank">Get Help</a></span>';
} else {
    echo '<span>Powered by <a href="https://www.teamwebsites.co.uk/" target="_blank">Team Websites</a></span>';
}
?> 
    
</div>    

<div class="lih-right">
    
<a href="https://www.facebook.com/teamwebsites/" target="_blank"> <div class="twheader-si" id="fbhi"><i class="fa fa-facebook" aria-hidden="true"></i> </div> </a>

<a href="https://www.twitter.com/myteamwebsite/" target="_blank"> <div class="twheader-si" id="twhi"><i class="fa fa-twitter" aria-hidden="true"></i> </div> </a>

<?php
if ( is_user_logged_in() ) {
  echo '<a href="';
  echo wp_logout_url( get_permalink() );
  echo '"><i class="fa fa-sign-in" aria-hidden="true"></i> <span>Log Out</span></a>';
} else {
    echo '<a href="';
    echo wp_login_url( get_permalink() );
    echo '"><i class="fa fa-sign-in" aria-hidden="true"></i> <span>Log In</span>';
}
?>   



<?php if ( is_home() ) : ?>

<?php
if ( is_user_logged_in() ) {
    
    
  echo '<span id="raiseby1"><span id="line-sep"></span></span> ';
  echo '<a href="';
  echo admin_url( 'customize.php' );
  echo '" target="_blank" title="Edit">';
  echo '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Edit</span>';
  echo '</a>';
} 
?>   

<?php else : ?>

<?php
if ( is_user_logged_in() ) {
    
    
  echo '<span id="raiseby1"><span id="line-sep"></span></span> ';
  echo '<a href="';
  echo get_edit_post_link();
  echo '" target="_blank" title="Edit">';
  echo '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Edit</span>';
  echo '</a>';
} 
?>   

<?php endif;  ?>
    
</div>   
    
</div>
    
</div>