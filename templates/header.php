<?php get_template_part( 'loggedin' ); ?>

<?php custom_breadcrumbs(); ?>

<header class="banner top-header" role="banner">
    
<div style="height: 100%; width: 100%;" class="top-header-st"></div>    


  <div class="container">

      

    <div style="width: 100%; clear: both;"> 

      

    <div class="col-lg-8">

        

    <div class="logo-header">

    

    <a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?> - Official Club Website">

        <?php $custom_logo_id = get_theme_mod( 'custom_logo' );

$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

if ( has_custom_logo() ) {

        echo '<img id="logo" src="'. esc_url( $logo[0] ) .'">';

} else {

        echo '';

} ?>

        </a>

    

    </div>   

    

    <div class="site-identity">

        

    <h1><a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> <?php get_template_part( 'siteverification' ); ?></h1>    

    

    <?php if ( get_theme_mod( 'club_nickname' ) ) : ?>

        

    <h2><?php echo get_theme_mod( 'club_nickname' ); ?></h2>

    

    <?php else : ?>



    <?php endif; ?>

        

    </div>

        

    </div>

    

    <div class="col-lg-4 header-social" style="position: relative;">

        

    <div style="display: block; float: right; margin-left: auto; position: relative; height: 100%;">  

    

    <?php if ( get_theme_mod( 'fb_pg_url' ) ) : ?>

        

    <a href="<?php echo esc_url( get_theme_mod( 'fb_pg_url' ) ); ?>" title="Like us on Facebook" target="_blank"> <button class="facebook">Facebook</button> </a>

    

    <?php else : ?>



    <?php endif; ?>

    

    <?php if ( get_theme_mod( 'twitter_user_name' ) ) : ?>

    

    <a href="https://twitter.com/<?php echo get_theme_mod( 'twitter_user_name' ); ?>" title="Follow us on Twitter" target="_blank"> <button class="twitter">Twitter</button> </a>

    

    <?php else : ?>



    <?php endif; ?>

        

     </div> 

        

    </div>

    

    </div>

    

    <div class="removeonsmallscreens" style="clear: both; display: block;     margin-bottom: -20px; height: 0px;">

    

  </div>

  

  </div>

  

  

  <nav id="site-navigation" class="nav-primary fullwidthnav main-navigation" role="navigation">

      <div class="container">

          

  <nav id="site-navigation" class="main-navigation mobilemenu-1" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">

   <div class="dropdown3 mobile-menu">

       

     <button onclick="myFunction('Demo1')" class="w3-btn w3-block w3-black w3-left-align">Menu <i class="fa fa-bars" aria-hidden="true"></i></button>

<div id="Demo1" class="w3-container w3-hide">

  <?php

									wp_nav_menu( array(

										'theme_location' => 'primary',

										'menu_class'     => 'primary-menu',

									 ) );

								?>

</div>

       

  </div>

</nav><!-- .main-navigation -->            

             

             

             <script>

/* When the user clicks on the button, 

toggle between hiding and showing the dropdown content */

function myFunction3() {

    document.getElementById("myDropdown3").classList.toggle("with4");

}



// Close the dropdown if the user clicks outside of it

window.onclick = function(event) {

  if (!event.target.matches('.dropbtn3')) {



    var dropdowns = document.getElementsByClassName("dropdown-content3");

    var i;

    for (i = 0; i < dropdowns.length; i++) {

      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('with4')) {

        openDropdown.classList.remove('with4');

      }

    }

  }

}

</script>

          

      <div id="desktop-menu">

          

        <?php

      if (has_nav_menu('primary')) :

        wp_nav_menu(['theme_location' => 'primary', 'menu_class' => 'nav']);

      endif;

      ?>  

          

      </div>

  

      </div>

    </nav>

  

</header>



<div>
  
    
</div>

<div class="wrap" style="margin-top: 0px !important; margin-bottom: 0px !important; padding-bottom: 0px !important; padding-top: 0px !important; background: transparent !important;">
<div class="container">
<?php get_template_part('adverts/below', 'header'); ?>    
</div>    
</div>