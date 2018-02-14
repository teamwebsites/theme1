<?php if ( ! is_admin() ) { ?>

<style>
.newadminlinks .aplink:hover, .newadminlinks .aplink:focus {text-decoration: none;}
.newadminlinks .aplink{text-decoration: none; font-size: 14px; clear: both; height: 37px; background: grey; color: #eee; display: flex; clear: both; opacity: 0.7; width: 100%; float: none; align-items: center; justify-content: center;}
.newadminlinks {margin-bottom: 5px; width: 100%; float: none; clear: both; position: relative;}
.newadminlinks:after {clear: both; display: block; position: relative; height: 0px; content: "";}

.addnewfixture:hover, .addnewfixture:focus {background: rgba(255, 165, 0, 0.6901960784313725) !important;}
.managesitesettings:hover, .managesitesettings:focus {background: rgba(60, 60, 60, 0.6901960784313725) !important;}
.addpitchvenue:hover, .addpitchvenue:focus {background: rgba(228, 0, 255, 0.6901960784313725) !important;}
.addnewseason:hover, .addnewseason:focus {background: rgba(133, 0, 255, 0.6901960784313725) !important;}
.addnewcomp:hover, .addnewcomp:focus {background: rgba(39, 0, 255, 0.6901960784313725) !important;}
.addnewsarticle:hover, .addnewsarticle:focus {background: rgba(0, 173, 255, 0.6901960784313725) !important;}
.addnewevent:hover, .addnewevent:focus {background: rgba(0, 255, 102, 0.6901960784313725) !important;}
.addnewresult:hover, .addnewresult:focus {background: rgba(255, 35, 0, 0.6901960784313725) !important;}

.admin-col:hover, .admin-col:focus {
text-decoration: none;
-moz-transition: all 1s ease-in;
/* WebKit */
-webkit-transition: all 1s ease-in;
/* Opera */
-o-transition: all 1s ease-in;
/* Standard */
transition: all 1s ease-in;}

@media screen and (max-width: 950px) { .newadminlinks {width: 100%;} .admin-col {width: calc(50% - 32px) !important;} }

.admin-col p {clear: both; margin-bottom: 0px !important; display: block; font-family: inherit !important; font-weight: 400; font-size: 15px;}
.admin-col, .admin-col p {display: flex; align-items: flex-end;}
.admin-col i {height: 110px; width: 100px; text-align: right; clear: both; display: block; position: absolute; right: -20px; top: -10px; font-size: 110px; color: rgba(255,255,255,0.7);}
.admin-col {cursor: pointer; border-right: 2px solid rgba(255,255,255,0.4); border-bottom: 3px solid rgba(255,255,255,0.4); overflow: hidden; color: #fff; padding: 12px 15px; min-height: 150px; background: rgba(0, 126, 255, 0.6901960784313725); position: relative; width: calc(25% - 32px); float: left;}</style>

<div class="newadminlinks">
    
<a href="<?php echo admin_url(); ?>post-new.php" target="_blank">
<div class="admin-col addnewsarticle">
    
<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 125px;"></i>    

<p>Add News</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>post-new.php?post_type=event" target="_blank">
<div class="admin-col addnewevent">
    
<i class="fa fa-calendar-o" aria-hidden="true"></i>  

<p>Add Club Event</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>post-new.php?post_type=wpcm_match" target="_blank">
<div class="admin-col addnewfixture">
    
<i class="fa fa-calendar-plus-o" aria-hidden="true"></i>    

<p>Add Fixture</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>edit.php?post_type=wpcm_match" target="_blank">
<div class="admin-col addnewresult">
    
<i class="fa fa-calendar-check-o" aria-hidden="true"></i> 

<p>Add Result</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=wpcm_comp&post_type=wpcm_club" target="_blank">
<div class="admin-col addnewcomp">
    
<i class="fa fa-trophy" aria-hidden="true" style="font-size: 120px;"></i>

<p>Add Competition</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=wpcm_season&post_type=wpcm_club" target="_blank">
<div class="admin-col addnewseason">
    
<i class="fa fa-folder" aria-hidden="true" style="font-size: 120px;"></i>

<p>Add Season</p>    
    
</div> 
</a>

<a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=wpcm_venue&post_type=wpcm_club" target="_blank">
<div class="admin-col addpitchvenue">
    
<i class="fa fa-map" aria-hidden="true"></i>

<p>Add Pitch/Ground</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>options-general.php" target="_blank">
<div class="admin-col managesitesettings">
    
<i class="fa fa-cog" aria-hidden="true"></i>

<p>Settings</p>    
    
</div>
</a>

<a href="<?php echo admin_url(); ?>" target="_blank"><div class="aplink">Go to admin panel &#x2192;</div></a>
    
</div>


<div class="admin admin-links" id="admin-links" style="display: none !important;">
    
<div class="admin-links-inner-container">
    
<div class="admin-links-col">

<h2>Team Administration</h2>    
    
<ul>

<li><a href="<?php echo admin_url(); ?>post-new.php?post_type=wpcm_match" target="_blank">Add new fixture</a></li> 
<li><a href="<?php echo admin_url(); ?>edit.php?post_type=wpcm_match" target="_blank">Add result</a></li> 
<li><a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=wpcm_venue&post_type=wpcm_club" target="_blank">Add new pitch/ground</a></li> 
<li><a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=wpcm_comp&post_type=wpcm_club" target="_blank">Add new competition</a></li>
<li><a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=wpcm_season&post_type=wpcm_club" target="_blank">Add new season</a></li>
    
</ul>   

</div>
    
<div class="admin-links-col">
    
<h2>Club Administration</h2>    
    
<ul>

<li><a href="<?php echo admin_url(); ?>" target="_blank">Admin Panel</a></li> 
<li><a href="<?php echo admin_url(); ?>post-new.php" target="_blank">Add news article</a></li> 
<li><a title="Feature Coming Soon" target="_blank">Add club event</a></li> 
    
</ul>     
    
</div>

<div style="clear: both; display: block; margin-top: 7px;"><i class="fa fa-question-circle" aria-hidden="true"></i> <span>This message only displays to logged-in users with the relevant privileges.</span></div>
    
</div>
    
</div>


<?php } ?>