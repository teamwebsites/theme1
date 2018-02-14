<style>* {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.gallery {
  background: #EEE;
}

.gallery-cell {
  width: 100%;
  height: 276px;
  margin-right: 10px;
  background: #f4f4f4;
}

/* cell number */
.gallery-cell:before {
  display: block;
  text-align: center;
  line-height: 200px;
  font-size: 80px;
  color: white;
}


/* big buttons, no circle */
.flickity-prev-next-button {
  width: 45px;
  height: 45px;
  background: transparent;
}
/* arrow color */
.flickity-prev-next-button .arrow {
  fill: white;
}
.flickity-prev-next-button.no-svg {
  color: white;
}
.flickity-prev-next-button:hover {
  background: transparent;
}
/* hide disabled button */
.flickity-prev-next-button:disabled {
  display: none;
}

/* position dots in gallery */
.flickity-page-dots {
  bottom: 13px;
}
.flickity-prev-next-button:focus {box-shadow: 0 0 0 5px #eee !important;}

/* white circles */
.flickity-page-dots .dot {
  width: 9px;
  height: 9px;
  opacity: 1;
  background: transparent;
  border: 1.38px solid white;
}
/* fill-in selected dot */
.flickity-page-dots .dot.is-selected {
  background: white;
}

.flickity-page-dots .dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 0 8px;
    background: #333;
    border-radius: 50%;
    filter: alpha(opacity=25);
    opacity: 0.25;
    cursor: pointer;
}

.flickity-prev-next-button {
    position: absolute;
    top: calc(50% - 3px);
    width: 44px;
    height: 44px;
    border: none;
    border-radius: 50%;
    background: white;
    background: hsla(0, 0%, 100%, 0.75);
    cursor: pointer;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.next {right: 0px !important;}

.previous {left: 0px !important;}

.js-flickity {height: 276px !important;}

.flickity-prev-next-button {background: hsla(0, 0%, 43%, 0.61); box-shadow: 0.5px 0.5px 0.5px #eee;}

.flickity-page-dots {
    position: absolute;
    width: 100%;
    bottom: 20px;
    padding: 0;
    margin: 0;
    list-style: none;
    text-align: center;
    line-height: 1;
}

.js-flickity {position: relative; overflow: hidden;}

@media screen and (min-width: 951px) { .homepage-welcome {height: 276px !important;} }

.gallery-cell img, .gallery-cell {display: flex; -webkit-align-items: flex-start; -webkit-justify-content: center; justify-content: center; align-items: center; display: -wekit-flex;}

.gallery-cell {
    width: 100%;
    height: 276px;
    margin-right: 10px;
}

#gallerycaption {display: block; position: absolute; left: 0px; right: auto; bottom: 0px; color: #fff; z-index: 11111; padding: 7px 21px 1px 13px; background: rgba(108, 108, 108, 0.87); line-height: 165%;}

</style>

<!-- Flickity HTML init -->
<div class="news-slider gallery js-flickity">
  
  <div class="gallery-cell">
      
    <?php if ( get_theme_mod( 'homepageimg1' ) ) : ?>  
      
    <img src="<?php echo esc_url( get_theme_mod( 'homepageimg1' ) ); ?>" width="100%" alt="blog name fc">
    
    <?php else : ?>
    
    <img src="https://teamwebsites.co.uk/images/football-field-stock.jpg" width="100%" alt="blog name fc">
    
    <?php endif; ?>
    
    
    <?php if ( get_theme_mod( 'homepageimg1caption' ) ) : ?>
    
    <div id="gallerycaption">
    
    <h2><?php echo get_theme_mod( 'homepageimg1caption' ); ?></h2>    
        
    </div>
    
    <?php endif; ?>
  
  </div>
  
  
   <?php if ( get_theme_mod( 'homepageimg2' ) ) : ?>
  
  <div class="gallery-cell">
      
    <?php if ( get_theme_mod( 'homepageimg2' ) ) : ?>  
      
    <img src="<?php echo esc_url( get_theme_mod( 'homepageimg2' ) ); ?>" width="100%" alt="blog name fc">
    
    <?php else : ?>
    
    <img src="https://teamwebsites.co.uk/images/football-field-stock.jpg" width="100%" alt="blog name fc">
    
    <?php endif; ?>
    
    
    <?php if ( get_theme_mod( 'homepageimg2caption' ) ) : ?>
    
    <div id="gallerycaption">
    
    <h2><?php echo get_theme_mod( 'homepageimg2caption' ); ?></h2>    
        
    </div>
    
    <?php endif; ?>
  
  </div>
  
  <?php endif; ?>
  
  
  
   <?php if ( get_theme_mod( 'homepageimg3' ) ) : ?>
  
  <div class="gallery-cell">
      
    <?php if ( get_theme_mod( 'homepageimg3' ) ) : ?>  
      
    <img src="<?php echo esc_url( get_theme_mod( 'homepageimg3' ) ); ?>" width="100%" alt="blog name fc">
    
    <?php else : ?>
    
    <img src="https://teamwebsites.co.uk/images/football-field-stock.jpg" width="100%" alt="blog name fc">
    
    <?php endif; ?>
    
    
    <?php if ( get_theme_mod( 'homepageimg3caption' ) ) : ?>
    
    <div id="gallerycaption">
    
    <h2><?php echo get_theme_mod( 'homepageimg3caption' ); ?></h2>    
        
    </div>
    
    <?php endif; ?>
  
  </div>
  
  <?php endif; ?>
  
  
  
  
  
   <?php if ( get_theme_mod( 'homepageimg4' ) ) : ?>
  
  <div class="gallery-cell">
      
    <?php if ( get_theme_mod( 'homepageimg4' ) ) : ?>  
      
    <img src="<?php echo esc_url( get_theme_mod( 'homepageimg4' ) ); ?>" width="100%" alt="blog name fc">
    
    <?php else : ?>
    
    <img src="https://teamwebsites.co.uk/images/football-field-stock.jpg" width="100%" alt="blog name fc">
    
    <?php endif; ?>
    
    
    <?php if ( get_theme_mod( 'homepageimg4caption' ) ) : ?>
    
    <div id="gallerycaption">
    
    <h2><?php echo get_theme_mod( 'homepageimg4caption' ); ?></h2>    
        
    </div>
    
    <?php endif; ?>
  
  </div>
  
  <?php endif; ?>
  
  
   <?php if ( get_theme_mod( 'homepageimg5' ) ) : ?>
  
  <div class="gallery-cell">
      
    <?php if ( get_theme_mod( 'homepageimg5' ) ) : ?>  
      
    <img src="<?php echo esc_url( get_theme_mod( 'homepageimg5' ) ); ?>" width="100%" alt="blog name fc">
    
    <?php else : ?>
    
    <img src="https://teamwebsites.co.uk/images/football-field-stock.jpg" width="100%" alt="blog name fc">
    
    <?php endif; ?>
    
    
    <?php if ( get_theme_mod( 'homepageimg5caption' ) ) : ?>
    
    <div id="gallerycaption">
    
    <h2><?php echo get_theme_mod( 'homepageimg5caption' ); ?></h2>    
        
    </div>
    
    <?php endif; ?>
  
  </div>
  <?php endif; ?>
</div>