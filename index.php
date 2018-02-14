
<?php
if ( is_user_logged_in() ) {
  get_template_part('easieradminlinks');
} else {
    
}
?> 

<div style="display: block; clear: both; height: 10px;"></div>

<?php if(true === get_theme_mod('homepage_slider')): ?> 

<?php get_template_part('homepageimageslider'); ?>


<?php else: ?>


<div class="news-slider">
    
<div id="featured" style="padding-left:0px;float:left;width:65%;overflow:hidden;padding-right:0px;padding-bottom:0px;">
    
<ul class="ui-tabs-nav">


  <?php
 $postslist = get_posts('numberposts=1&offset=0&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  

 <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1">  <div class="containing-image" style="width:80px;background:url('http://www.tracoathleticfc.co.uk/wp-content/uploads/2016/09/DSC_0626-Copy.jpg');height:45px;float:left;margin-top:5px;overflow:hidden;background-size:cover;margin-right:9px;">   </div> <span  class="individual-nav-post-title" style="margin-top:15px;text-overflow:ellipsis;overflow:ellipsis;">  
    <?php echo mb_strimwidth(get_the_title(), 0, 33, ' [...]'); ?>     
     </span></a></li> 
     
     
     <?php endforeach; ?>

<?php
 $postslist = get_posts('numberposts=1&offset=1&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  
        
    
 <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2">  <div class="containing-image" style="width:80px;background:url('http://www.tracoathleticfc.co.uk/wp-content/uploads/2017/07/football.jpg');height:45px;float:left;margin-top:5px;overflow:hidden;background-size:cover;margin-right:9px;">   </div> <span  class="individual-nav-post-title" style="margin-top:15px;text-overflow:ellipsis;overflow:ellipsis;">  
    <?php echo mb_strimwidth(get_the_title(), 0, 33, ' [...]'); ?>     
     </span></a></li> 
     
     <?php endforeach; ?>


<?php
 $postslist = get_posts('numberposts=1&offset=2&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>      
    
<li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3">  <div class="containing-image" style="width:80px;background:url('http://www.tracoathleticfc.co.uk/wp-content/uploads/2016/09/TRACO-FC-Copy.jpg');height:45px;float:left;margin-top:5px;overflow:hidden;background-size:cover;margin-right:9px;">   </div> <span  class="individual-nav-post-title" style="margin-top:15px;text-overflow:ellipsis;overflow:ellipsis;">  
    <?php echo mb_strimwidth(get_the_title(), 0, 33, ' [...]'); ?>     
     
     </span></a></li> 
     
     <?php endforeach; ?>


    <?php
 $postslist = get_posts('numberposts=1&offset=3&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  
    
 <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"> <div class="containing-image" style="width:80px;background:url('http://teamwebsites.co.uk/defaultnewspic.JPG');height:45px;float:left;margin-top:5px;overflow:hidden;background-size:cover;margin-right:9px;"> </div> <span  class="individual-nav-post-title" style="margin-top:15px;text-overflow:ellipsis;overflow:ellipsis;">  
    <?php echo mb_strimwidth(get_the_title(), 0, 33, ' [...]'); ?>     
     
     </span></a></li> 
     
     <?php endforeach; ?>

</ul>


<!-- First Content -->



    <?php
 $postslist = get_posts('numberposts=1&offset=0&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  


<div id="fragment-1" class="ui-tabs-panel ui-tabs-hide" style="">
<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : ?>  <img alt="featured 2" src="<?php the_post_thumbnail_url(); ?>"/>  <?php else: ?> <img alt="featured 2" src="http://teamwebsites.co.uk/defaultnewspic.JPG"/> <?php endif; ?></a>
<a href="<?php the_permalink(); ?>"><div class="info">
<h2>  <?php the_title(); ?>   </h2>
<p style="text-transform:uppercase;"><?php
$category = get_the_category();
echo $category[0]->cat_name;
?></p>
</div></a>
</div>    

<?php endforeach; ?>


    <?php
 $postslist = get_posts('numberposts=1&offset=1&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  


<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : ?>  <img alt="featured 2" src="<?php the_post_thumbnail_url(); ?>"/>  <?php else: ?> <img alt="featured 2" src="http://teamwebsites.co.uk/defaultnewspic.JPG"/> <?php endif; ?></a>
<a href="<?php the_permalink(); ?>"><div class="info">
<h2>  <?php the_title(); ?>   </h2>
<p style="text-transform:uppercase;"><?php
$category = get_the_category();
echo $category[0]->cat_name;
?></p>
</div></a>
</div>    

<?php endforeach; ?>

<script type="text/javascript">
$(document).ready(function(){$("#featured > ul").tabs({fx:{opacity:"toggle"}}).tabs("rotate",5000,true);});
</script><script type="text/javascript">
$(document).ready(function(){$("#featured > ul").tabs({fx:{opacity:"toggle"}}).tabs("rotate",5000,true);});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){$("#featured > ul").tabs({fx:{opacity:"toggle"}}).tabs("rotate",5000,true);});
</script>

    
<?php
 $postslist = get_posts('numberposts=1&offset=2&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  

<div id="fragment-3" class="ui-tabs-panel" style="">
<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : ?>  <img alt="featured 2" src="<?php the_post_thumbnail_url(); ?>"/>  <?php else: ?> <img alt="featured 2" src="http://teamwebsites.co.uk/defaultnewspic.JPG"/> <?php endif; ?></a>
<a href="<?php the_permalink(); ?>"><div class="info">
<h2>  <?php the_title(); ?>   </h2>
<p style="text-transform:uppercase;"><?php
$category = get_the_category();
echo $category[0]->cat_name;
?></p>
</div></a>
</div>    

<?php endforeach; ?>

    <?php
 $postslist = get_posts('numberposts=1&offset=3&order=DESC&orderby=date');
 foreach ($postslist as $post) :
    setup_postdata($post);
 ?>  


<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : ?>  <img alt="featured 2" src="<?php the_post_thumbnail_url(); ?>"/>  <?php else: ?> <img alt="featured 2" src="http://teamwebsites.co.uk/defaultnewspic.JPG"/> <?php endif; ?></a>
<a href="<?php the_permalink(); ?>"><div class="info">
<h2>  <?php the_title(); ?>   </h2>
<p style="text-transform:uppercase;"><?php
$category = get_the_category();
echo $category[0]->cat_name;
?></p>
</div></a>
</div>    
<?php endforeach; ?>

</div>

</div>

<?php endif; ?>

<div class="homepage-welcome">
    
<div class="welcome-text">
    
<div>
    
<h1>Welcome <?php if ( get_theme_mod( 'club_initials' ) ) : ?> to   <?php echo esc_html(get_theme_mod('club_initials','')); ?>   <?php endif; ?></h1> 

<p><?php if ( get_theme_mod( 'club_welcome' ) ) : ?>     <?php echo esc_html(get_theme_mod('club_welcome','')); ?>  <?php else: ?> Welcome to the official club website of <?php bloginfo( 'name' ); ?>.    <?php endif; ?></p>    
    
</div>
    
</div>

</div>


<?php get_template_part( 'bottom', 'homepage' ); ?>