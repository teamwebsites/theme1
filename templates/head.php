<head> 


<style>
			html { color: #fff; background: #333 url(/wp-content/themes/wp/img/bg0.jpg); }
			body { width: 90%; margin: 40px auto; font-family: Overpass, sans-serif; }
			
			h1 { font-family: Raleway, sans-serif; }
			p a { color: #ccc; text-decoration: none; }
			p a:hover { text-decoration: underline; }
			
			.custom-login { box-sizing: border-box; max-width: 450px; overflow: hidden; margin: 50px auto; padding: 20px; color: #333; }
			.custom-login h3, .custom-login p { margin: 0; padding: 5px; }
			.custom-login form { padding: 10px 0 0 0; }
			
			ul.tabs_login { position: relative; z-index: 2; width: 100%; overflow: hidden; margin: 0; padding: 0; list-style: none; }
			ul.tabs_login li { float: left; margin: 0 5px 0 0; padding: 0; background-color: #fff; }
			ul.tabs_login li a { display: block; padding: 10px 20px; color: #777; background-color: #ccc; text-decoration: none; text-shadow: 1px 1px 1px rgba(255,255,255,0.5); }
			ul.tabs_login li a:hover { color: #555; background-color: #efefef; }
			ul.tabs_login li.active_login a { font-weight: bold; color: #333; background-color: #fff; }
			
			.tab_container_login { background-color: #fff; }
			.tab_content_login { padding: 20px; box-shadow: 0 1px 5px 0 rgba(0,0,0,0.7); }
			
			.username, .password, .login_fields { box-sizing: border-box; width: 100%; overflow: hidden; padding: 5px; }
			.username label, .password label { display: inline-block; width: 85px; margin: 0; padding: 0; }
			.username input, .password input { 
				box-sizing: border-box; display: inline-block; width: 270px; margin: 0; padding: 5px; color: #777; 
				border: 1px solid #ccc; font-size: 14px; font-family: Overpass, sans-serif; 
				}
			.username input:active, .password input:active, .username input:focus, .password input:focus { color: #333; border-color: #777; }
			.username-reset label { display: none; }
			.username-reset input { width: 90%; }
			
			.rememberme { padding: 5px 0; font-size: 80%; }
			.user-submit { 
				box-sizing: border-box; display: block; margin: 10px 0 0 0; padding: 15px 30px; cursor: pointer;
				border: 0; color: #fff; font-size: 16px; background-color: #21759b; 
				}
			.user-submit:hover { background-color: rgba(33,117,155,0.8); }
			
			.user-logged-in { box-sizing: border-box; width: 100%; overflow: hidden; padding: 25px; background-color: #fff; box-shadow: 0 1px 5px 0 rgba(0,0,0,0.7); }
			.user-icon { box-sizing: border-box; float: left; width: 125px; padding: 15px 0 0 5px; }
			.user-icon img { width: 100px; height: 100px; box-shadow: 0 1px 5px 0 rgba(0,0,0,0.7); }
			.user-info { box-sizing: border-box; float: left; width: 230px; }
			.user-info p { margin: 20px 0 10px 0; }
			.user-info p:last-child { margin: 0; }
			.user-info a { color: #21759b; text-decoration: none; }
			.user-info a:hover { color: rgba(33,117,155,0.8); text-decoration: underline; }
			
			@media only screen and (max-width: 960px) {
				.custom-login { padding: 0; }	
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			jQuery(document).ready(function($) {
				$(".tab_content_login").hide();
				$("ul.tabs_login li:first").addClass("active_login").show();
				$(".tab_content_login:first").show();
				$("ul.tabs_login li").click(function() {
					$("ul.tabs_login li").removeClass("active_login");
					$(this).addClass("active_login");
					$(".tab_content_login").hide();
					var activeTab = $(this).find("a").attr("href");
					$(activeTab).show();
					return false;
				});
			});
		</script>

    
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1324108671625841",
    enable_page_level_ads: false
  });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101754275-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-101754275-2');
</script>

<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

if ( is_front_page() && is_home() ) : ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "url": "<?php echo site_url(); ?>",
  "logo": "<?php echo esc_url( $logo[0] ); ?>",
  "contactPoint": [
    { "@type": "ContactPoint",
      "telephone": "+44<?php echo get_theme_mod( 'clubtelephonenumber' ); ?>",
      "contactType": "customer service"
    }
  ]
}
</script>

<?php else: ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "url": "<?php echo site_url(); ?>",
  "logo": "https://teamwebsites.co.uk/images/teamwebsites%20logo%20minimized.png",
  "contactPoint": [
    { "@type": "ContactPoint",
      "telephone": "+1-401-555-1212",
      "contactType": "customer service"
    }
  ]
}
</script>

<?php endif; ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "<?php echo get_bloginfo( 'name' ); ?>",
  "url": "<?php echo site_url(); ?>",
  "sameAs": [
    "<?php echo get_theme_mod( 'fb_pg_url' ); ?>",
    "https://www.instagram.com/<?php echo get_theme_mod( 'instagram_user_name' ); ?>",
    "https://www.twitter.com/<?php echo get_theme_mod( 'twitter_user_name' ); ?>"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "<?php echo site_url(); ?>",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "<?php echo site_url(); ?>/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a21be6b1b118100135876ca&product=inline-share-buttons"></script>


<link href="//teamwebsites.co.uk/hpsliderstyles.css" rel="stylesheet">
<script src="https://teamwebsites.co.uk/flickity.pkgd.js"></script>
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a21be6b1b118100135876ca&product=custom-share-buttons"></script>


<?php if(true === get_theme_mod('countycolourlogos')): ?> 
<style>header #logo, .defospons {filter: none !important; -webkit-filter: none !important; filter: none !important;}</style>
<?php else: ?>
<?php endif; ?>

<style> 

.social_media_link {color: #fff !important;}

.mobilemenu-1 li a {color: <?php echo get_theme_mod('blognametxtcolor', true ); ?> !important;}

header, .top-header a, header a, .menu-item-has-children:after, #verifiedclub i {color: <?php echo get_theme_mod( 'headertextcolour', '#ffffff'); ?> !important;}

#shirtnumber {background: <?php echo get_theme_mod( 'primary_color_scheme' ); ?>; color: <?php echo get_theme_mod( 'secondary_color_scheme', '#123456' ); ?> !important; text-shadow: -1px 2px 2px rgb(156, 156, 156);}

.top-header-st {display: none;}
.top-header {background: <?php echo get_theme_mod( 'primary_color_scheme', '#f30000' ); ?>;}

.custom-background .top-header {background: transparent !important;}
.custom-background .top-header-st {display: block !important; z-index: -11; position: absolute; opacity: 0.8; top: 0px; bottom: 0px; left: 0px; right: 0px; background: <?php echo get_theme_mod( 'primary_color_scheme', '#f30000' ); ?>;}

.wrap a{color: <?php echo get_theme_mod( 'primary_color_scheme' ); ?>;}  .title-post, #featured ul.ui-tabs-nav, .open-menu-link15, .w3-show, button, input[type="button"], input[type="reset"], input[type="submit"], .dropbtn, .welcome-text h1:after, #featured li.ui-tabs-nav-item a{background: <?php echo get_theme_mod( 'primary_color_scheme', '#f30000' ); ?>;}</style>
<meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
<meta charset="utf-8">
<link href="https://teamwebsites.co.uk/ionicons-master/css/ionicons.css" rel="stylesheet" type="text/css">
<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?php echo get_bloginfo( 'name' ); ?>">
<meta property="og:url" content="<?php echo get_permalink(); ?>" />
<meta name="keywords" content="<?php echo get_bloginfo( 'name' ); ?>, Football Club, Football Team, Videos, Match Reports, Fixtures, Results, Profiles, Directions">
<meta property="og:locale" content="en_GB" />
<meta property="og:site_name" content="Team Websites" />
<meta property="fb:app_id" content="480966635589146" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@myteamwebsite" />
<meta name="twitter:creator" content="@myteamwebsite" />

<?php if ( is_front_page() && is_home() ) {  
    $url = site_url( '/' );
echo '<link rel="canonical" href="'.$url.'" />'; 
echo "\n";   
}
else {
echo "\n";} ?>

<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

if ( is_front_page() && is_home() ) {
    
    if ( has_custom_logo() ) {
        echo '<meta property="og:image" content="'.esc_url( $logo[0] ).'"/>';
        echo "\n";
        echo '<meta property="twitter:image" content="'.esc_url( $logo[0] ).'"/>';
        echo "\n";
    }
    
    else {
        echo '<meta property="og:image" content="https://www.teamwebsites.co.uk/wp-content/uploads/2017/07/cropped-cropped-161l98Gq_400x400.jpg"/>';
        echo "\n";
        echo '<meta property="twitter:image" content="https://www.teamwebsites.co.uk/wp-content/uploads/2017/07/cropped-cropped-161l98Gq_400x400.jpg"/>';
        echo "\n";
    }
}

else {
    if ( has_post_thumbnail() ) : ?>
	<meta property="og:image" content="<?php the_post_thumbnail_url('large'); ?>" />
	<meta property="twitter:image" content="<?php the_post_thumbnail_url('large'); ?>" />
	
    <?php else: ?>
   <meta property="og:image" content="https://www.teamwebsites.co.uk/wp-content/uploads/2017/07/cropped-cropped-161l98Gq_400x400.jpg"/>
   <meta property="twitter:image" content="https://www.teamwebsites.co.uk/wp-content/uploads/2017/07/cropped-cropped-161l98Gq_400x400.jpg"/>
    <?php endif;
    
}

if ( is_front_page() && is_home() ) {  
echo '<title>' . get_bloginfo( 'name' ) . ' - Official Club Website</title>';
echo "\n";
echo '<meta name="twitter:title" content="' . get_bloginfo( 'name' ) . ' - Official Club Website" />';
echo "\n";
echo '<meta name="twitter:description" content="The official site for ' . get_bloginfo( 'name' ) . ', with the latest news, photos and videos, fixtures and results." />';
echo "\n";
echo "\n";
echo '<meta property="og:description" content="Official website of ' . get_bloginfo( 'name' ) . '" />';
echo "\n";
echo '<meta name="description" content="The official site for ' . get_bloginfo( 'name' ) . ', with the latest news, photos and videos, fixtures and results.">';
echo "\n";
echo '<meta property="og:title" content="' . get_bloginfo( 'name' ) . ' - Official Club Website" />';
echo "\n";
}

elseif ('page' == get_post_type() ) { 
echo '<title>' . get_the_title() . ' - ' . get_bloginfo( 'name' ) . '</title>';
echo "\n";
echo '<meta name="description" content="' . substr(strip_tags($post->post_content), 0, 157) . '..." />';
echo "\n";
echo '<meta name="author" content="' . get_bloginfo( 'name' ) . '">';
echo "\n";
echo '<meta property="og:description" content="' . substr(strip_tags($post->post_content), 0, 157) . '..." />';
echo "\n";
echo '<meta property="og:title" content="' . get_the_title() . ' - ' . get_bloginfo( 'name' ) . '" />';  
echo "\n";

}

elseif ('wpcm_match' == get_post_type() ) {

echo '<meta name="description" content="' . substr(strip_tags($post->post_content), 0, 157) . '..." />';
echo "\n";    
    
}

elseif ('post' == get_post_type() ) {
    echo '<meta property="og:title" content="' . get_the_title() . ' - ' . get_bloginfo( 'name' ) . '" />';  
    echo "\n";
    echo '<meta name="description" content="' . substr(strip_tags($post->post_content), 0, 142) . '..." />';
    echo "\n";
    echo '<meta name="og:description" content="' . substr(strip_tags($post->post_content), 0, 142) . '..." />';
    echo "\n";
    

}

else {
    echo '<meta name="twitter:title" content="'. get_the_title() . ' - '. get_bloginfo( 'name' ) . '" />';
    echo "\n";
    echo '<meta name="twitter:description" content="The official site for ' . get_bloginfo( 'name' ) . ', with the latest news, photos and videos, fixtures and results." />'; echo "\n";
    
    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	echo '<meta property="og:image" content="';
	echo the_post_thumbnail_url('large');
	echo '" />';
	
    } 
    // If doesn't have post thumnail set, display following default TW meta image 
    else {echo '<meta property="og:image" content="https://www.teamwebsites.co.uk/wp-content/uploads/2017/07/cropped-cropped-161l98Gq_400x400.jpg"/>';
    }
}
?>

<?php if ('post' == get_post_type() ) {  ?> 

<?php if ( has_post_thumbnail() ) : ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://google.com/article"
  },
  "headline": "<?php the_title(); ?>",
  "image": [
    "<?php the_post_thumbnail_url( 'large' ); ?>"
   ],
  "datePublished": "<?php the_time('Y-m-d') ?>T<?php the_time('g:i:s'); ?>+0000",
  "dateModified": "<?php the_time('Y-m-d') ?>T<?php the_time('g:i:s'); ?>+0000",
  "author": {
    "@type": "Person",
    "name": "<?php bloginfo( 'name' ); ?>"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Team Websites",
    "logo": {
      "@type": "ImageObject",
      "url": "https://teamwebsites.co.uk/images/optimized/logo.png"
    }
  },
  "description": "<?php echo substr(strip_tags($post->post_content), 0, 157); ?>"
}
</script>

<?php else: ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://google.com/article"
  },
  "headline": "<?php the_title(); ?>",
  "image": [
    "https://teamwebsites.co.uk/clubs/wfc2011/wp-content/uploads/sites/31/2017/06/goal-2042584_1280.jpg"
   ],
  "datePublished": "<?php the_time('Y-m-d') ?>T<?php the_time('g:i:s'); ?>+0000",
  "dateModified": "<?php the_time('Y-m-d') ?>T<?php the_time('g:i:s'); ?>+0000",
  "author": {
    "@type": "Person",
    "name": "<?php bloginfo( 'name' ); ?>"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Team Websites",
    "logo": {
      "@type": "ImageObject",
      "url": "https://teamwebsites.co.uk/images/optimized/logo.png"
    }
  },
  "description": "<?php echo substr(strip_tags($post->post_content), 0, 157); ?>"
}
</script>

<?php endif; ?>

<meta name="author" content="<?php the_author(); ?>">

<meta property="og:title" content="<?php the_title(); ?> - <?php echo get_bloginfo( 'name' ); ?>" />

<?php } ?>


<?php if ('wpcm_player' == get_post_type() ) {  ?> 

<title><?php the_title(); ?> - <?php echo get_bloginfo( 'name' ); ?></title>

<meta name="description" content="Player profile of <?php the_title(); ?>.">

<meta name="author" content="<?php the_author(); ?>">

<meta property="og:title" content="<?php the_title(); ?> - <?php echo get_bloginfo( 'name' ); ?>" />
<meta property="og:description" content="Player profile of <?php the_title(); ?>." />

<?php } ?>

<?php if ('wpcm_match' == get_post_type() ) { ?>

<div itemscope="" itemtype="https://schema.org/SportsEvent">
<meta itemprop="url" content="<?php the_permalink(); ?>">
        
<?php $played = get_post_meta( $post->ID, 'wpcm_played', true );
$score = wpcm_get_match_result( $post->ID );
$side = wpcm_get_match_clubs( $post->ID ); ?>

<?php

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) {
        echo '<img style="display: none;" itemprop="image" src="'. esc_url( $logo[0] ) .'">';
} else {
   
}

?>

<span itemprop="name" style="display: none;">Game: <?php the_title(); ?></span>
<span itemprop="description" style="display: none;">Match</span>

<span itemprop="homeTeam" itemscope="" itemtype="https://schema.org/SportsTeam">
<meta itemprop="name" content="<?php echo $side[0]; ?>">
</span>

<span itemprop="location" itemscope="" itemtype="https://schema.org/Place">
<meta itemprop="name" content="<?php echo $side[0]; ?>">
<meta itemprop="address" content="<?php echo $side[0]; ?>">
<span itemprop="geo" itemscope="" itemtype="https://schema.org/GeoCoordinates">
<meta itemprop="latitude" content="">
<meta itemprop="longitude" content="">
</span>
</span>

<span itemprop="awayTeam" itemscope="" itemtype="https://schema.org/SportsTeam">
<meta itemprop="name" content="<?php echo $side[1]; ?>">
</span>
                       
<span itemprop="startDate" content="<?php the_time('Y-m-d') ?>T<?php the_time('g:i:s'); ?>+0000"></span>
 
</div>

<?php } ?>

<?php if ('wpcm_staff' == get_post_type() ) {  ?> 

<title><?php the_title(); ?> - <?php echo get_bloginfo( 'name' ); ?></title>
<meta name="description" content="Staff Profile. <?php echo substr(strip_tags($post->post_content), 0, 142);?>...">
<meta name="author" content="<?php the_author(); ?>">
<meta property="og:title" content="<?php the_title(); ?> - <?php echo get_bloginfo( 'name' ); ?>" />
<meta property="og:description" content="Staff profile of <?php the_title(); ?>." />
<?php } ?>

<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta name="google-site-verification" content="FMlQzmF4lRTncWQAq5Xz7ENtaiXScjKAHq0LSJ6nGFk">

  <?php
    $example_position = get_theme_mod( 'charterstandarding' );
    if( $example_position != '' ) {
        switch ( $example_position ) {
            case 'charter-standard':

                

                echo '<style type="text/css">';

                echo '#charterdevclub,#chartercommunityclub { display: none !important; }';

                echo '</style>';

                

                break;

                

                

            case 'charterdevclub':

                echo '<style type="text/css">';

                echo '#charterstandard,#chartercommunityclub { display: none !important; }';

                echo '</style>';

                break;

                

            case 'chartercommunityclub':

                echo '<style type="text/css">';

                echo '#charterstandard { display: none !important; }';

                echo '</style>';

                break;    

                

                

            case 'neither':

                echo '<style type="text/css">';

                echo '#charterstandard, #charterdevclub,#chartercommunityclub { display: none; }';

                echo '</style>';

                break;

                

                

              

        }

    }

?>

  

<?php

    $example_position = get_theme_mod( 'kalon_select_setting_id' );

    if( $example_position != '' ) {

        switch ( $example_position ) {

            case 'postponedgme':

                

                echo '<style type="text/css">';

                echo '.importantannouncement .fa:before{content: "\f071" !important;} .importantannouncement{background: #f65757; border: 1px solid #e43737; }';

                echo '</style>';

                

                break;

                

                

            case 'importaninfo':

                echo '<style type="text/css">';

                echo '.importantannouncement .fa:before{content: "\f2b6" !important;} .importantannouncement{color: #f5f5f5 !important; background: #8e8e8e !important; border:1px solid #7b7b7b !important; }';

                echo '</style>';

                break;

                

                

            case 'clubevent':

                echo '<style type="text/css">';

                echo '.importantannouncement .fa:before{content: "\f133" !important;} .importantannouncement{background:#f1f1f1 !important; border:1px solid #bfbfbf !important; color: #6b6464 !important; }';

                echo '</style>';

                break;

                

                

                

            case 'hideinfobox':

                echo '<style type="text/css">';

                echo '.importantannouncement { display:none !important; }';

                echo '</style>';

                break;   

                

            

           

        }

    }

?> 
  <?php wp_head(); ?>

</head>

