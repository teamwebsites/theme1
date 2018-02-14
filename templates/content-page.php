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
} else { echo ''; } ?>

<?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	    the_post_thumbnail( 'large', array('class' => 'post-thumbnail'));  
        } 
        ?>

<div style="clear: both; height: 7px; margin-bottom: -10px; display: block;"></div>

<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
