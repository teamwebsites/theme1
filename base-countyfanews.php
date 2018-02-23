<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container articlecontent" role="document">
      <div class="content row">
          
          <h1 class="title-post"><?php the_title(); ?></h1>
          
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
              
              <?php get_template_part('adverts/in', 'sidebar'); ?> 
              <?php $images = get_post_meta($post->ID, 'vdw_gallery_id', true); ?>

<?php 
$author_id = get_the_author_meta('ID');

    /* get file ID */
    $id = get_post_meta($post->ID, 'vdw_gallery_id', true);

    if($id) {
        /* Array Loop! */
        foreach($id as $attachments) {
            /* get file URL */
            $url10 = wp_get_attachment_image( $attachments, 'custom-size' );
            $url = wp_get_attachment_url( $attachments ); ?>
            
            <div class="match-image">
            <a rel="lightbox[matchimages]" href="<?php echo $url; ?>" data-lightbox="image-1" data-title=""><?php echo wp_get_attachment_image($attachments, 'custom-size'); ?></a>
            </div>
            
            
            
        <?php
        
    }
    echo '<div style="clear: both; height: 7px; display: block;"></div>';
} else { echo ''; } ?>
              
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
