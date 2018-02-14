<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
      <?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	    the_post_thumbnail( 'large', array('class' => 'post-thumbnail'));  
        } 
        ?>
      
      <?php get_template_part('templates/entry-meta'); ?>
      
      <h3 class="event-details-title">Event Details</h3>
      
      <p><strong>Date:</strong> <?php the_time('l jS F Y') ?> </p>
    
    <h3 class="event-details-title">Event Information</h3>
    
    <div class="entry-content">
        
      <?php the_content(); ?>
    </div>
    
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
